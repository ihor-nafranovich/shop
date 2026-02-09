<section class="contact-section py-5" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <!-- Заголовок -->
                <div class="text-center mb-5">
                    <h2 class="display-5 fw-bold mb-3">Свяжитесь с нами</h2>
                    <p class="lead text-muted">
                        Есть вопросы? Заполните форму ниже, и мы ответим вам в течение 24 часов
                    </p>
                </div>

                <!-- Livewire компонент -->
                <livewire:contact-form />

                <!-- Дополнительная информация -->
                <div class="row mt-5 pt-4 text-center">
                    <div class="col-md-4 mb-4">
                        <div class="p-3">
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#4361ee" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </div>
                            <h5 class="fw-bold">Email</h5>
                            <p class="text-muted mb-0">{{ config('mail.from.address', 'contact@example.com') }}</p>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="p-3">
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#4361ee" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                            </div>
                            <h5 class="fw-bold">Телефон</h5>
                            <p class="text-muted mb-0">+375 (33) 123-45-67</p>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="p-3">
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#4361ee" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                            </div>
                            <h5 class="fw-bold">Время работы</h5>
                            <p class="text-muted mb-0">Пн-Пт: 9:00-18:00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
