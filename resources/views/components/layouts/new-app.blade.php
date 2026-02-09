<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @section('metatags')
        <title>{{ config('app.name') . ' :: ' . ($title ?? 'Page Title') }}</title>
        <meta name="description" content="Default metadesc">
    @show

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/new-styles.css') }}">

    <!-- Livewire Styles -->
    @livewireStyles

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <div class="wrapper">

    <!-- Top Bar -->
    <div class="top-bar bg-dark text-white py-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <small><i class="fas fa-phone me-2"></i>+375 (29) 123-45-67</small>
                    <small class="ms-3"><i class="fas fa-envelope me-2"></i>info@i-shop.by</small>
                </div>
                <div class="col-md-6 text-end">
                    <small>Доставка по Беларуси и России</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <i class="fab fa-apple fs-3 me-2"></i>I-Shop
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">Главная</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Каталог
                        </a>
                        <ul class="dropdown-menu">
                            {!! \App\Helpers\Category\Category::getMenu('incs.menu-tpl', 'categories_html') !!}
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#promotions">Акции</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Контакты</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <livewire:search.search-form-component />
                    <livewire:user.nav-component />
                    <livewire:cart.cart-icon-component />
                </div>
            </div>
        </div>
    </nav>

    <!-- Search Bar (Hidden by default) -->
    <div class="search-container bg-light py-3" id="searchContainer" style="display: none;">
        <div class="container">
            <div class="input-group">
                <input type="text" class="form-control form-control-lg" placeholder="Поиск товаров...">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Hero Carousel -->
    <section id="home" class="hero-section">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="hero-slide" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <div class="container">
                            <div class="row align-items-center min-vh-50">
                                <div class="col-lg-6 text-white">
                                    <h1 class="display-3 fw-bold mb-4">iPhone 15 Pro</h1>
                                    <p class="lead mb-4">Титан. Прочный. Лёгкий. Про.</p>
                                    <button class="btn btn-light btn-lg me-2">Купить</button>
                                    <button class="btn btn-outline-light btn-lg">Подробнее</button>
                                </div>
                                <div class="col-lg-6">
                                    <img src="https://images.unsplash.com/photo-1603732133854-4eb5f41d1fa2?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=800" alt="iPhone 15 Pro" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="hero-slide" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);">
                        <div class="container">
                            <div class="row align-items-center min-vh-50">
                                <div class="col-lg-6 text-white">
                                    <h1 class="display-3 fw-bold mb-4">MacBook Pro</h1>
                                    <p class="lead mb-4">Невероятная мощность. Впечатляющий дизайн.</p>
                                    <button class="btn btn-light btn-lg me-2">Купить</button>
                                    <button class="btn btn-outline-light btn-lg">Подробнее</button>
                                </div>
                                <div class="col-lg-6">
                                    <img src="https://images.unsplash.com/photo-1651614422674-1f51818f27b1?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=800" alt="MacBook Pro" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="hero-slide" style="background: linear-gradient(135deg, #134e5e 0%, #71b280 100%);">
                        <div class="container">
                            <div class="row align-items-center min-vh-50">
                                <div class="col-lg-6 text-white">
                                    <h1 class="display-3 fw-bold mb-4">Apple Watch</h1>
                                    <p class="lead mb-4">Ваше здоровье под контролем.</p>
                                    <button class="btn btn-light btn-lg me-2">Купить</button>
                                    <button class="btn btn-outline-light btn-lg">Подробнее</button>
                                </div>
                                <div class="col-lg-6">
                                    <img src="https://images.unsplash.com/photo-1624096104992-9b4fa3a279dd?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=800" alt="Apple Watch" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>

    <!-- Categories -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Категории товаров</h2>
            <div class="row g-4">
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="category-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <i class="fas fa-mobile-alt fs-1 text-primary mb-3"></i>
                        <h6>iPhone</h6>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="category-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <i class="fas fa-laptop fs-1 text-primary mb-3"></i>
                        <h6>MacBook</h6>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="category-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <i class="fas fa-tablet-alt fs-1 text-primary mb-3"></i>
                        <h6>iPad</h6>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="category-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <i class="fas fa-clock fs-1 text-primary mb-3"></i>
                        <h6>Apple Watch</h6>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="category-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <i class="fas fa-headphones fs-1 text-primary mb-3"></i>
                        <h6>AirPods</h6>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="category-card text-center p-4 bg-white rounded shadow-sm h-100">
                        <i class="fas fa-plug fs-1 text-primary mb-3"></i>
                        <h6>Аксессуары</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content - Updated to match old design -->
    <main class="main">
        <div class="container">
            {{ $slot }}
        </div>
    </main>

    <!-- Promotions Banner -->
    <section class="py-5 bg-primary text-white" id="promotions">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="display-5 fw-bold mb-3">Акции и специальные предложения</h2>
                    <p class="lead mb-4">Получите скидку до 25% на избранные товары Apple</p>
                    <button class="btn btn-light btn-lg">Смотреть акции</button>
                </div>
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="promo-card bg-white text-dark p-4 rounded">
                                <i class="fas fa-truck fs-1 text-primary mb-3"></i>
                                <h5>Бесплатная доставка</h5>
                                <p class="small mb-0">При заказе от 500 BYN</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="promo-card bg-white text-dark p-4 rounded">
                                <i class="fas fa-shield-alt fs-1 text-primary mb-3"></i>
                                <h5>Гарантия качества</h5>
                                <p class="small mb-0">Официальная гарантия Apple</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="promo-card bg-white text-dark p-4 rounded">
                                <i class="fas fa-credit-card fs-1 text-primary mb-3"></i>
                                <h5>Рассрочка 0%</h5>
                                <p class="small mb-0">До 12 месяцев</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="promo-card bg-white text-dark p-4 rounded">
                                <i class="fas fa-headset fs-1 text-primary mb-3"></i>
                                <h5>Поддержка 24/7</h5>
                                <p class="small mb-0">Всегда на связи</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-5" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="fw-bold mb-4">О магазине I-Shop</h2>
                    <p class="text-muted mb-4">
                        I-Shop — ведущий магазин техники Apple в Беларуси и России. Мы предлагаем только оригинальную продукцию
                        с официальной гарантией производителя.
                    </p>
                    <div class="row g-3 mb-4">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0">5+ лет</h5>
                                    <small class="text-muted">на рынке</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary text-white rounded-circle p-3 me-3">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0">50000+</h5>
                                    <small class="text-muted">клиентов</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-lg">Узнать больше</button>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=800" alt="Store" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <i class="fas fa-envelope fs-1 text-primary mb-3"></i>
                    <h2 class="fw-bold mb-3">Подпишитесь на рассылку</h2>
                    <p class="text-muted mb-4">Получайте информацию о новинках и специальных предложениях</p>
                    <form class="row g-2">
                        <div class="col-md-8">
                            <input type="email" class="form-control form-control-lg" placeholder="Ваш email">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Подписаться</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-5 pb-3">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h5 class="mb-4"><i class="fab fa-apple me-2"></i>I-Shop</h5>
                    <p class="text-muted">Официальный магазин техники Apple в Беларуси и России</p>
                    <div class="social-links mt-3">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-vk fa-lg"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-telegram fa-lg"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h6 class="mb-3">Каталог</h6>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#" class="text-muted">iPhone</a></li>
                        <li><a href="#" class="text-muted">MacBook</a></li>
                        <li><a href="#" class="text-muted">iPad</a></li>
                        <li><a href="#" class="text-muted">Apple Watch</a></li>
                        <li><a href="#" class="text-muted">AirPods</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h6 class="mb-3">Информация</h6>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#" class="text-muted">О нас</a></li>
                        <li><a href="#" class="text-muted">Доставка</a></li>
                        <li><a href="#" class="text-muted">Оплата</a></li>
                        <li><a href="#" class="text-muted">Гарантия</a></li>
                        <li><a href="#" class="text-muted">Контакты</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h6 class="mb-3">Контакты</h6>
                    <ul class="list-unstyled text-muted">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i>г. Минск, ул. Примерная, 123</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i>+375 (29) 123-45-67</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i>info@i-shop.by</li>
                        <li><i class="fas fa-clock me-2"></i>Пн-Вс: 10:00 - 21:00</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-secondary">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <small class="text-muted">© 2026 I-Shop. Все права защищены.</small>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <small class="text-muted">
                        <a href="#" class="text-muted me-3">Политика конфиденциальности</a>
                        <a href="#" class="text-muted">Условия использования</a>
                    </small>
                </div>
            </div>
        </div>
    </footer>

    <!-- Shopping Cart Offcanvas -->
    <livewire:cart.cart-modal-component />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- Livewire Scripts -->
    @livewireScripts

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/new-script.js') }}"></script>

    <!-- Toastr for notifications -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @if(session('success'))
        <script>
            toastr.success('{{ session('success') }}')
        </script>
    @endif

    </div> <!-- Close wrapper -->
</body>

</html>
<task_progress>
- [x] Analyze new frontend structure
- [x] Check current frontend integration points
- [x] Plan migration strategy
- [x] Create new layout file
- [ ] Copy assets to proper location
- [ ] Update Livewire components
- [ ] Test new frontend integration
</task_progress>
</write_to_file>
