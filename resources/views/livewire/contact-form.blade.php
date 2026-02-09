<div wire:ignore.self>
    <!-- Сообщение об успешной отправке -->
    @if($isSubmitted)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle me-2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                <span>{{ $successMessage }}</span>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" wire:click="$set('isSubmitted', false)"></button>
        </div>

        <div class="text-center mt-4">
            <button class="btn btn-outline-primary" wire:click="$set('isSubmitted', false)">
                Отправить еще одно сообщение
            </button>
        </div>
    @else
        <form wire:submit.prevent="save" id="contactForm">
            <!-- Вывод ошибок валидации -->
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle me-2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                        <div>
                            <p class="mb-1">Пожалуйста, исправьте следующие ошибки:</p>
                            <ul class="mb-0 ps-3">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Поля формы -->
            <div class="row g-3 mb-4">
                <!-- Имя -->
                <div class="col-md-6">
                    <label for="name" class="form-label">
                        Имя <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                           id="name"
                           class="form-control @error('name') is-invalid @enderror"
                           wire:model.blur="name"
                           placeholder="Введите ваше имя"
                           autocomplete="name"
                        @disabled($isSubmitted)>
                    @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <label for="email" class="form-label">
                        Email <span class="text-danger">*</span>
                    </label>
                    <input type="email"
                           id="email"
                           class="form-control @error('email') is-invalid @enderror"
                           wire:model.blur="email"
                           placeholder="example@mail.com"
                           autocomplete="email"
                        @disabled($isSubmitted)>
                    @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Телефон -->
                <div class="col-12">
                    <label for="phone" class="form-label">
                        Телефон
                        <span class="text-muted small">(необязательно)</span>
                    </label>
                    <input type="tel"
                           id="phone"
                           class="form-control @error('phone') is-invalid @enderror"
                           wire:model.blur="phone"
                           placeholder="+7 (999) 999-99-99"
                           autocomplete="tel"
                        @disabled($isSubmitted)>
                    @error('phone')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Тема -->
                <div class="col-12">
                    <label for="subject" class="form-label">
                        Тема обращения <span class="text-danger">*</span>
                    </label>
                    <select id="subject"
                            class="form-select @error('subject') is-invalid @enderror"
                            wire:model.blur="subject"
                        @disabled($isSubmitted)>
                        <option value="" disabled selected>Выберите тему...</option>
                        @foreach($subjectOptions as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('subject')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Сообщение -->
                <div class="col-12">
                    <label for="message" class="form-label">
                        Сообщение <span class="text-danger">*</span>
                    </label>
                    <textarea id="message"
                              class="form-control @error('message') is-invalid @enderror"
                              wire:model.blur="message"
                              rows="5"
                              placeholder="Опишите ваш вопрос подробнее..."
                              @disabled($isSubmitted)></textarea>
                    <div class="form-text d-flex justify-content-between align-items-center mt-1">
                        <span>Минимум 10 символов</span>
                        <span class="{{ strlen($message) > 1000 ? 'text-danger' : 'text-muted' }}">
                            {{ strlen($message) }}/1000
                        </span>
                    </div>
                    @error('message')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Согласие с политикой -->
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input @error('privacyPolicy') is-invalid @enderror"
                               type="checkbox"
                               id="privacyPolicy"
                               wire:model.blur="privacyPolicy"
                            @disabled($isSubmitted)>
                        <label class="form-check-label" for="privacyPolicy">
                            Я соглашаюсь с
                            <a href="{{ route('privacy.policy') }}" target="_blank" class="text-decoration-none">
                                политикой конфиденциальности
                            </a>
                            <span class="text-danger">*</span>
                        </label>
                        @error('privacyPolicy')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Honeypot поле (скрытое) -->
                <div class="d-none" aria-hidden="true">
                    <label for="honeypot">Оставьте это поле пустым</label>
                    <input type="text"
                           id="honeypot"
                           wire:model="honeypot"
                           tabindex="-1"
                           autocomplete="off">
                </div>
            </div>

            <!-- Кнопка отправки -->
            <div class="mt-4">
                <button type="submit"
                        class="btn btn-primary btn-lg w-100"
                        wire:loading.attr="disabled"
                        wire:target="save"
                    @disabled($isSubmitted)>
                    <span wire:loading.remove wire:target="save">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send me-2">
                            <line x1="22" y1="2" x2="11" y2="13"></line>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                        </svg>
                        Отправить сообщение
                    </span>
                    <span wire:loading wire:target="save">
                        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                        Отправка...
                    </span>
                </button>
            </div>
        </form>
    @endif
</div>

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        [wire\:loading] {
            opacity: 0.7;
            pointer-events: none;
        }

        .form-control:disabled, .form-select:disabled {
            background-color: #f8f9fa;
            cursor: not-allowed;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Маска для телефона
        document.addEventListener('livewire:init', () => {
            const phoneInput = document.getElementById('phone');
            if (phoneInput) {
                phoneInput.addEventListener('input', function(e) {
                    let value = this.value.replace(/\D/g, '');
                    if (value.length > 0) {
                        if (value.length <= 3) {
                            value = value.replace(/^(\d{0,3})/, '+7 ($1');
                        } else if (value.length <= 6) {
                            value = value.replace(/^(\d{3})(\d{0,3})/, '+7 ($1) $2');
                        } else if (value.length <= 8) {
                            value = value.replace(/^(\d{3})(\d{3})(\d{0,2})/, '+7 ($1) $2-$3');
                        } else {
                            value = value.replace(/^(\d{3})(\d{3})(\d{2})(\d{0,2})/, '+7 ($1) $2-$3-$4');
                        }
                    }
                    this.value = value;
                    // Обновляем значение в Livewire
                    Livewire.dispatch('phone-updated', { phone: value });
                });
            }
        });
    </script>
@endpush
