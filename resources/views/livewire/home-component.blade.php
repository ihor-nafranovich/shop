<div>
    @section('metatags')
        <title>{{ config('app.name') . ' :: ' . ($title ?? 'Page Title') }}</title>
        <meta name="description" content="{{ $desc ?? 'default...' }}">
    @endsection

    <!-- Featured Products Section -->
    @if($hits_products->isNotEmpty())
        <section class="py-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold">Рекомендуемые товары</h2>
                    <a href="#" class="btn btn-outline-primary">Все товары</a>
                </div>

                <div class="owl-carousel owl-theme products-carousel">
                    @foreach($hits_products as $product)
                        <div class="item">
                            @include('incs.product-card')
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- New Products Section -->
    @if($new_products->isNotEmpty())
        <section class="py-5 bg-light">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold">Новинки</h2>
                    <a href="#" class="btn btn-outline-primary">Все товары</a>
                </div>

                <div class="owl-carousel owl-theme products-carousel">
                    @foreach($new_products as $product)
                        <div class="item">
                            @include('incs.product-card')
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- About Section -->
    <section class="py-5" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="fw-bold mb-4">О магазине I-Shop</h2>
                    <p class="text-muted mb-4">
                        Вселенная Apple у вас под рукой
                    </p>
                    <p class="text-muted mb-4">
                        Добро пожаловать в i-shop, ваш надежный интернет-магазин техники Apple в городе Минске! Мы – команда энтузиастов Apple, разделяющих вашу страсть к инновациям, качеству и элегантному дизайну.
                    </p>
                    <p class="text-muted mb-4">
                        Наша миссия – сделать мир Apple доступным каждому. Мы предлагаем широкий ассортимент оригинальной техники Apple: от новейших iPhone и iPad до мощных MacBook и iMac. У нас вы найдете все, что нужно для работы, творчества и развлечений.
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
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=800" alt="Store" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-5">
        <div class="container">
            <iframe id="map"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2350.623366362203!2d27.5955966760153!3d53.902897932936355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dbcfb346bb42fd%3A0x5393b63b3c1ff20a!2z0JHQk9Cj0JjQoCwg0LrQvtGA0L_Rg9GBIOKEliA3!5e0!3m2!1sru!2sby!4v1753542654054!5m2!1sru!2sby"
                    width="100%" height="450" style="border:0; display: block;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
</div>

@if(session('success'))
    @script
    <script>
        toastr.success('{{ session('success') }}')
    </script>
    @endscript
@endif

<!-- Initialize Owl Carousel -->
@script
<script>
$(document).ready(function() {
    $('.products-carousel').owlCarousel({
        loop: false,
        margin: 20,
        nav: true,
        dots: true,
        autoplay: false,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    });

    // Add to Cart functionality
    $('.add-to-cart').click(function() {
        const productId = $(this).data('product');
        const productPrice = $(this).data('price');

        // Emit Livewire event to add to cart
        Livewire.emit('addToCart', productId);

        // Visual feedback
        const originalText = $(this).html();
        $(this).html('<i class="fas fa-check me-2"></i>Добавлено!');
        $(this).addClass('btn-success').removeClass('btn-primary');

        setTimeout(() => {
            $(this).html(originalText);
            $(this).addClass('btn-primary').removeClass('btn-success');
        }, 1500);
    });
});
</script>
@endscript
