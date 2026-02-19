document.addEventListener('DOMContentLoaded', function () {
    const resetHeroSlide = (slide) => {
        if (!slide || typeof gsap === 'undefined') {
            return;
        }

        const bg = slide.querySelector('.hero-slide__bg');
        const overlay = slide.querySelector('.hero-slide__overlay');
        const elements = slide.querySelectorAll('[data-hero-el]');

        if (bg) {
            gsap.set(bg, { scale: 1.08 });
        }

        if (overlay) {
            gsap.set(overlay, { opacity: 0.45 });
        }

        if (elements.length) {
            gsap.set(elements, { autoAlpha: 0, y: 36 });
        }
    };

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

    const animateActiveHeroSlide = (swiper) => {
        if (!swiper || !swiper.el) {
            return;
        }

        const activeSlide = swiper.el.querySelector('.swiper-slide-active');
        runHeroAnimation(activeSlide);
    };

    // Initialize Swiper
    const swiperElement = document.querySelector('.mySwiper');
    if (swiperElement) {
        swiperElement.querySelectorAll('.hero-slide').forEach((slide) => {
            resetHeroSlide(slide);
        });

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
                    animateActiveHeroSlide(this);
                },
                slideChangeTransitionStart() {
                    animateActiveHeroSlide(this);
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

    // Mission / Vision Tabs + Slideshow
    const missionVision = document.getElementById('mission-vision');
    if (missionVision) {
        const mainImage = document.getElementById('mission-vision-main-image');
        const tabButtons = missionVision.querySelectorAll('[data-tab-trigger]');
        const tabPanels = missionVision.querySelectorAll('[data-tab-panel]');
        const thumbs = missionVision.querySelectorAll('[data-tab-thumb]');

        const tabImageMap = {};
        thumbs.forEach((thumb) => {
            const tab = thumb.dataset.tabThumb;
            const img = thumb.querySelector('img');

            if (!tab || !img) {
                return;
            }

            if (!tabImageMap[tab]) {
                tabImageMap[tab] = [];
            }

            tabImageMap[tab].push({
                src: img.getAttribute('src'),
                alt: img.getAttribute('alt') || ''
            });
        });

        let activeTab = 'mission';
        let activeImageIndex = 0;
        let slideshowTimer = null;

        const updateMainImage = (tab, index) => {
            if (!mainImage || !tabImageMap[tab] || !tabImageMap[tab][index]) {
                return;
            }

            const nextImage = tabImageMap[tab][index];

            if (typeof gsap !== 'undefined') {
                gsap.to(mainImage, {
                    autoAlpha: 0,
                    duration: 0.2,
                    onComplete: () => {
                        mainImage.src = nextImage.src;
                        mainImage.alt = nextImage.alt;
                        gsap.to(mainImage, { autoAlpha: 1, duration: 0.35, ease: 'power2.out' });
                    }
                });
            } else {
                mainImage.src = nextImage.src;
                mainImage.alt = nextImage.alt;
            }
        };

        const renderActiveTab = () => {
            tabButtons.forEach((button) => {
                const isActive = button.dataset.tabTrigger === activeTab;
                button.classList.toggle('mission-vision__tab-btn--active', isActive);
            });

            tabPanels.forEach((panel) => {
                const isActive = panel.dataset.tabPanel === activeTab;
                panel.classList.toggle('mission-vision__panel--active', isActive);
            });

            thumbs.forEach((thumb) => {
                const thumbTab = thumb.dataset.tabThumb;
                const thumbIndex = Number(thumb.dataset.imageIndex);
                const isCurrentTab = thumbTab === activeTab;
                const isActiveThumb = isCurrentTab && thumbIndex === activeImageIndex;

                thumb.classList.toggle('hidden', !isCurrentTab);
                thumb.classList.toggle('mission-vision__thumb--active', isActiveThumb);
            });
        };

        const restartSlideshow = () => {
            if (slideshowTimer) {
                window.clearInterval(slideshowTimer);
            }

            slideshowTimer = window.setInterval(() => {
                const images = tabImageMap[activeTab] || [];
                if (!images.length) {
                    return;
                }

                activeImageIndex = (activeImageIndex + 1) % images.length;
                updateMainImage(activeTab, activeImageIndex);
                renderActiveTab();
            }, 3500);
        };

        tabButtons.forEach((button) => {
            button.addEventListener('click', () => {
                const nextTab = button.dataset.tabTrigger;
                if (!nextTab || nextTab === activeTab) {
                    return;
                }

                activeTab = nextTab;
                activeImageIndex = 0;
                updateMainImage(activeTab, activeImageIndex);
                renderActiveTab();
                restartSlideshow();
            });
        });

        thumbs.forEach((thumb) => {
            thumb.addEventListener('click', () => {
                const thumbTab = thumb.dataset.tabThumb;
                const thumbIndex = Number(thumb.dataset.imageIndex);
                if (thumbTab !== activeTab || Number.isNaN(thumbIndex)) {
                    return;
                }

                activeImageIndex = thumbIndex;
                updateMainImage(activeTab, activeImageIndex);
                renderActiveTab();
                restartSlideshow();
            });
        });

        updateMainImage(activeTab, activeImageIndex);
        renderActiveTab();
        restartSlideshow();
    }

    // Services Showcase
    const servicesElement = document.querySelector('.servicesSwiper');
    if (servicesElement) {
        new Swiper('.servicesSwiper', {
            slidesPerView: 1,
            loop: true,
            // speed: 1200,
            // effect: 'fade',
            // fadeEffect: {
            //     crossFade: true
            // },
            // autoplay: {
            //     delay: 3200,
            //     disableOnInteraction: false
            // },
            pagination: {
                el: '.services-swiper-pagination',
                clickable: true
            }
        });
    }

    // Testimonial Swiper
    const testimonialElement = document.querySelector('.testimonialSwiper');
    if (testimonialElement) {
        new Swiper('.testimonialSwiper', {
            slidesPerView: 1,
            spaceBetween: 18,
            pagination: {
                el: '.testimonial-pagination',
                clickable: true
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                1200: {
                    slidesPerView: 3
                }
            }
        });
    }

    // FAQ Accordion
    const faqAccordion = document.getElementById('faq-accordion');
    if (faqAccordion) {
        const faqItems = faqAccordion.querySelectorAll('[data-faq-item]');

        faqItems.forEach((item) => {
            const trigger = item.querySelector('[data-faq-trigger]');
            if (!trigger) {
                return;
            }

            trigger.addEventListener('click', () => {
                const content = item.querySelector('[data-faq-content]');
                const icon = item.querySelector('[data-faq-icon]');
                const isOpen = content && !content.classList.contains('hidden');

                faqItems.forEach((node) => {
                    const nodeContent = node.querySelector('[data-faq-content]');
                    const nodeIcon = node.querySelector('[data-faq-icon]');
                    if (nodeContent) {
                        nodeContent.classList.add('hidden');
                    }
                    if (nodeIcon) {
                        nodeIcon.classList.remove('rotate-90');
                    }
                });

                if (!isOpen && content) {
                    content.classList.remove('hidden');
                }

                if (!isOpen && icon) {
                    icon.classList.add('rotate-90');
                }
            });
        });
    }
});
