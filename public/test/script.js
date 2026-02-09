// I-Shop E-commerce JavaScript

$(document).ready(function() {
    // Shopping Cart
    let cart = [];
    let wishlist = [];

    // Initialize Owl Carousel
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

    // Search Toggle
    $('#searchBtn').click(function() {
        $('#searchContainer').slideToggle();
    });

    // Add to Cart
    $('.add-to-cart').click(function() {
        const productName = $(this).data('product');
        const productPrice = $(this).data('price');
        
        // Add to cart
        cart.push({
            name: productName,
            price: productPrice,
            quantity: 1
        });
        
        // Update cart count
        updateCartCount();
        
        // Visual feedback
        const originalText = $(this).html();
        $(this).html('<i class="fas fa-check me-2"></i>Добавлено!');
        $(this).addClass('btn-success').removeClass('btn-primary');
        
        setTimeout(() => {
            $(this).html(originalText);
            $(this).addClass('btn-primary').removeClass('btn-success');
        }, 1500);
        
        // Update cart display
        updateCartDisplay();
        
        // Show toast notification
        showToast('Товар добавлен в корзину');
    });

    // Wishlist Toggle
    $('.product-wishlist').click(function(e) {
        e.stopPropagation();
        $(this).toggleClass('active');
        const icon = $(this).find('i');
        
        if ($(this).hasClass('active')) {
            icon.removeClass('far').addClass('fas');
            wishlist.push($(this).closest('.product-card').find('.product-title').text());
        } else {
            icon.removeClass('fas').addClass('far');
            const productName = $(this).closest('.product-card').find('.product-title').text();
            wishlist = wishlist.filter(item => item !== productName);
        }
        
        updateWishlistCount();
    });

    // Update Cart Count
    function updateCartCount() {
        const count = cart.length;
        $('.cart-count').text(count);
        
        if (count > 0) {
            $('.cart-count').show();
        } else {
            $('.cart-count').hide();
        }
    }

    // Update Wishlist Count
    function updateWishlistCount() {
        const count = wishlist.length;
        $('.wishlist-count').text(count);
        
        if (count > 0) {
            $('.wishlist-count').show();
        } else {
            $('.wishlist-count').hide();
        }
    }

    // Update Cart Display
    function updateCartDisplay() {
        const cartItemsContainer = $('#cartItems');
        const cartTotal = $('#cartTotal');
        
        if (cart.length === 0) {
            cartItemsContainer.html(`
                <div class="text-center py-5 text-muted">
                    <i class="fas fa-shopping-cart fs-1 mb-3"></i>
                    <p>Корзина пуста</p>
                </div>
            `);
            cartTotal.text('0 BYN');
            return;
        }
        
        let total = 0;
        let html = '';
        
        cart.forEach((item, index) => {
            total += item.price;
            html += `
                <div class="cart-item">
                    <div class="cart-item-details">
                        <div class="cart-item-title">${item.name}</div>
                        <div class="cart-item-price">${item.price} BYN</div>
                    </div>
                    <button class="cart-item-remove" onclick="removeFromCart(${index})">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
        });
        
        cartItemsContainer.html(html);
        cartTotal.text(total.toFixed(2) + ' BYN');
    }

    // Remove from Cart
    window.removeFromCart = function(index) {
        cart.splice(index, 1);
        updateCartCount();
        updateCartDisplay();
        showToast('Товар удален из корзины');
    }

    // Checkout
    $('#checkoutBtn').click(function() {
        if (cart.length === 0) {
            alert('Корзина пуста!');
            return;
        }
        
        // This would normally redirect to checkout page or open checkout modal
        alert('Переход к оформлению заказа...\n\nТовары в корзине: ' + cart.length);
        console.log('Cart items:', cart);
    });

    // Toast Notification
    function showToast(message) {
        // Create toast element
        const toast = $(`
            <div class="toast-notification">
                <i class="fas fa-check-circle me-2"></i>${message}
            </div>
        `);
        
        // Add styles
        toast.css({
            position: 'fixed',
            top: '20px',
            right: '20px',
            background: '#28a745',
            color: 'white',
            padding: '15px 20px',
            borderRadius: '8px',
            boxShadow: '0 5px 15px rgba(0,0,0,0.2)',
            zIndex: 9999,
            display: 'none'
        });
        
        // Add to body and show
        $('body').append(toast);
        toast.fadeIn(300);
        
        // Remove after 3 seconds
        setTimeout(() => {
            toast.fadeOut(300, function() {
                $(this).remove();
            });
        }, 3000);
    }

    // Navbar Scroll Effect
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('.navbar').addClass('scrolled');
        } else {
            $('.navbar').removeClass('scrolled');
        }
    });

    // Smooth Scroll
    $('a[href^="#"]').click(function(e) {
        const target = $(this.hash);
        if (target.length) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: target.offset().top - 80
            }, 800);
        }
    });

    // Product Card Click (for demo - would normally link to product page)
    $('.product-card').click(function(e) {
        if (!$(e.target).closest('button, a').length) {
            const productName = $(this).find('.product-title').text();
            console.log('Product clicked:', productName);
            // Would normally navigate to product detail page
            // window.location.href = '/product/' + productName;
        }
    });

    // Newsletter Form
    $('footer form').submit(function(e) {
        e.preventDefault();
        const email = $(this).find('input[type="email"]').val();
        
        if (email) {
            showToast('Спасибо за подписку!');
            $(this).find('input[type="email"]').val('');
        }
    });

    // Initialize cart count display
    updateCartCount();
    updateWishlistCount();

    // Auto-play Bootstrap Carousel
    $('.carousel').carousel({
        interval: 5000,
        pause: 'hover'
    });

    // Category Cards Click
    $('.category-card').click(function() {
        const category = $(this).find('h6').text();
        console.log('Category selected:', category);
        // Would normally filter products or navigate to category page
        showToast('Загрузка категории: ' + category);
    });

    // Promo Cards Hover Effect
    $('.promo-card').hover(
        function() {
            $(this).find('i').addClass('animate__animated animate__pulse');
        },
        function() {
            $(this).find('i').removeClass('animate__animated animate__pulse');
        }
    );

    console.log('I-Shop loaded successfully! 🛍️');
    console.log('jQuery version:', $.fn.jquery);
});

// Livewire-like functionality (for future Laravel Livewire integration)
const LivewireStub = {
    emit: function(event, ...params) {
        console.log('Livewire event:', event, params);
        // This would be replaced by actual Livewire when integrated
    },
    
    on: function(event, callback) {
        console.log('Listening for Livewire event:', event);
        // This would be replaced by actual Livewire when integrated
    }
};

// Example usage for future Livewire integration:
// LivewireStub.emit('addToCart', productId);
// LivewireStub.emit('updateQuantity', cartItemId, quantity);
