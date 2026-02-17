(function () {
    var menuToggle = document.getElementById('nks-mobile-toggle');
    var mobileMenu = document.getElementById('nks-mobile-menu');

    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', function () {
            var isOpen = mobileMenu.classList.toggle('is-open');
            menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });
    }

    var heroSliderEl = document.querySelector('.nks-hero-swiper');

    if (heroSliderEl && typeof Swiper !== 'undefined') {
        new Swiper(heroSliderEl, {
            loop: true,
            effect: 'fade',
            fadeEffect: {
                crossFade: true,
            },
            speed: 850,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.nks-hero-swiper__pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.nks-hero-swiper__next',
                prevEl: '.nks-hero-swiper__prev',
            },
        });
    }
})();
