document.addEventListener('DOMContentLoaded', function() {
    const runHeroAnimation = (slide) => {
        if (!slide || typeof gsap === 'undefined') {
            return;
        }

        const bg = slide.querySelector('.hero-slide__bg');
        const overlay = slide.querySelector('.hero-slide__overlay');
        const elements = slide.querySelectorAll('[data-hero-el]');

        gsap.killTweensOf([bg, overlay, ...elements]);

        if (bg) {
            gsap.fromTo(
                bg,
                { scale: 1.08 },
                { scale: 1, duration: 1.8, ease: 'power3.out' }
            );
        }

        const tl = gsap.timeline();

        if (overlay) {
            tl.fromTo(
                overlay,
                { opacity: 0.45 },
                { opacity: 1, duration: 0.8, ease: 'power2.out' },
                0
            );
        }

        tl.fromTo(
            elements,
            { autoAlpha: 0, y: 36 },
            {
                autoAlpha: 1,
                y: 0,
                duration: 0.9,
                ease: 'power3.out',
                stagger: 0.14
            },
            0.18
        );
    };

    // Initialize Swiper
    const swiperElement = document.querySelector('.mySwiper');
    if (swiperElement) {
        const swiper = new Swiper('.mySwiper', {
            init: false,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            speed: 900,
            loop: true,
            autoplay: {
                delay: 5500,
                disableOnInteraction: false
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            on: {
                init() {
                    runHeroAnimation(this.slides[this.activeIndex]);
                },
                slideChangeTransitionEnd() {
                    runHeroAnimation(this.slides[this.activeIndex]);
                }
            }
        });

        // Ensure first animation runs when initialized programmatically.
        swiper.init();
    }

    // Mobile Menu Toggle
    const menuToggle = document.getElementById('menu-toggle');
    const menuClose = document.getElementById('menu-close');
    const mobileMenu = document.getElementById('mobile-menu');

    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.remove('translate-x-full');
        });
    }

    if (menuClose && mobileMenu) {
        menuClose.addEventListener('click', () => {
            mobileMenu.classList.add('translate-x-full');
        });
    }

    // Header Scroll Effect
    const header = document.getElementById('site-header');
    window.addEventListener('scroll', () => {
        if (!header) {
            return;
        }

        if (window.scrollY > 50) {
            header.classList.add('bg-black/90', 'backdrop-blur-sm', 'shadow-md');
            header.classList.remove('bg-transparent', 'py-4');
            header.classList.add('py-2');
        } else {
            header.classList.remove('bg-black/90', 'backdrop-blur-sm', 'shadow-md', 'py-2');
            header.classList.add('bg-transparent', 'py-4');
        }
    });
});
