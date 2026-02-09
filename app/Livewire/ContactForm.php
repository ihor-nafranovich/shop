<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\RateLimiter;

class ContactForm extends Component
{
    #[Validate('required|string|max:100')]
    public string $name = '';

    #[Validate('required|email|max:100')]
    public string $email = '';

    #[Validate('nullable|string|max:20')]
    public ?string $phone = '';

    #[Validate('required|in:general,support,partnership,other')]
    public string $subject = '';

    #[Validate('required|string|min:10|max:1000')]
    public string $message = '';

    #[Validate('required|accepted')]
    public bool $privacyPolicy = false;

    public ?string $honeypot = null; // Защита от ботов
    public bool $isSubmitted = false;
    public string $successMessage = '';
    public array $errorsArray = [];

    // Начальные значения для выпадающего списка
    public array $subjectOptions = [
        'general' => 'Общий вопрос',
        'support' => 'Техническая поддержка',
        'partnership' => 'Сотрудничество',
        'other' => 'Другое',
    ];

    protected $messages = [
        'name.required' => 'Поле "Имя" обязательно для заполнения.',
        'email.required' => 'Поле "Email" обязательно для заполнения.',
        'email.email' => 'Введите корректный email адрес.',
        'subject.required' => 'Выберите тему обращения.',
        'message.required' => 'Поле "Сообщение" обязательно для заполнения.',
        'message.min' => 'Сообщение должно содержать минимум :min символов.',
        'privacy_policy.accepted' => 'Вы должны согласиться с политикой конфиденциальности.',
    ];

    public function mount()
    {
        // Восстановление данных из сессии (опционально)
        if (session()->has('contact_form_data')) {
            $data = session('contact_form_data');
            foreach ($data as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        }
    }

    public function save()
    {
        // Проверка honeypot
        if (!empty($this->honeypot)) {
            $this->addError('honeypot', 'Обнаружена подозрительная активность');
            return;
        }

        // Rate limiting
        $executed = RateLimiter::attempt(
            'contact-form:' . request()->ip(),
            $perMinute = 5,
            function() {}
        );

        if (!$executed) {
            $this->addError('rate_limit', 'Слишком много попыток отправки. Пожалуйста, попробуйте позже.');
            return;
        }

        // Валидация
        $this->validate();

        try {
            // Подготовка данных
            $data = [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'subject' => $this->subjectOptions[$this->subject] ?? $this->subject,
                'message' => $this->message,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'timestamp' => now()->format('Y-m-d H:i:s'),
            ];

            // Отправка email
            Mail::to(config('mail.contact_to', config('mail.from.address')))
                ->queue(new ContactFormMail($data));

            // Сохранение в базу данных (раскомментировать если нужно)
            // ContactMessage::create($data);

            // Успешная отправка
            $this->isSubmitted = true;
            $this->successMessage = 'Ваше сообщение успешно отправлено! Мы ответим вам в ближайшее время.';

            // Очистка формы
            $this->resetForm();

            // Очистка ошибок
            $this->resetErrorBag();

            // Сохранение в сессию для восстановления при перезагрузке
            session()->flash('contact_success', $this->successMessage);

        } catch (\Exception $e) {
            \Log::error('Contact form error: ' . $e->getMessage());
            $this->addError('submit_error', 'Произошла ошибка при отправке сообщения. Пожалуйста, попробуйте позже.');
        }
    }

    private function resetForm()
    {
        $this->reset(['name', 'email', 'phone', 'subject', 'message']);
        $this->privacyPolicy = false;
        $this->honeypot = null;
    }

    // Автосохранение в сессию при изменении полей
    public function updated($property)
    {
        if (!in_array($property, ['isSubmitted', 'successMessage', 'errorsArray'])) {
            session()->put('contact_form_data', [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'subject' => $this->subject,
                'message' => $this->message,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
