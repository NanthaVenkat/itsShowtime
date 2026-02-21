document.addEventListener('DOMContentLoaded', function () {
    document.body.classList.add('loading');

    // =========================================================================
    // Shared Helpers / Global Animation Utilities
    // =========================================================================

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

    const splitText = (el) => {
        if (!el) return [];
        const text = el.textContent.trim();
        el.textContent = '';
        return text.split(' ').map(word => {
            const span = document.createElement('span');
            span.style.display = 'inline-block';
            span.style.overflow = 'hidden';
            span.style.verticalAlign = 'top';
            const inner = document.createElement('span');
            inner.textContent = word + ' ';
            inner.style.display = 'inline-block';
            span.appendChild(inner);
            el.appendChild(span);
            return inner;
        });
    };

    const runHeroAnimation = (slide) => {
        if (!slide || typeof gsap === 'undefined') {
            return;
        }

        const bg = slide.querySelector('.hero-slide__bg');
        const overlay = slide.querySelector('.hero-slide__overlay');
        const h1 = slide.querySelector('h1');
        const p = slide.querySelector('p');
        const buttons = slide.querySelector('div[data-hero-el]:last-child');

        gsap.killTweensOf([bg, overlay, h1, p, buttons]);

        if (bg) {
            gsap.fromTo(
                bg,
                { scale: 1.15 },
                { scale: 1, duration: 2.5, ease: 'expo.out' }
            );
        }

        const tl = gsap.timeline();

        if (overlay) {
            tl.fromTo(
                overlay,
                { opacity: 0.3 },
                { opacity: 1, duration: 1.2, ease: 'power2.out' },
                0
            );
        }

        if (h1) {
            const h1Spans = splitText(h1);
            tl.fromTo(
                h1Spans,
                { yPercent: 100, autoAlpha: 0 },
                {
                    yPercent: 0,
                    autoAlpha: 1,
                    duration: 1.2,
                    ease: 'expo.out',
                    stagger: 0.05
                },
                0.2
            );
        }

        if (p) {
            tl.fromTo(
                p,
                { autoAlpha: 0, y: 30 },
                {
                    autoAlpha: 1,
                    y: 0,
                    duration: 1,
                    ease: 'power4.out'
                },
                "-=0.8"
            );
        }

        if (buttons) {
            tl.fromTo(
                buttons,
                { autoAlpha: 0, y: 20 },
                {
                    autoAlpha: 1,
                    y: 0,
                    duration: 0.8,
                    ease: 'power3.out'
                },
                "-=0.6"
            );
        }
    };

    const animateActiveHeroSlide = (swiper) => {
        if (!swiper || !swiper.el) {
            return;
        }

        const activeSlide = swiper.el.querySelector('.swiper-slide-active');
        runHeroAnimation(activeSlide);
    };

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const hasGsap = typeof gsap !== 'undefined';
    const hasScrollTrigger = hasGsap && typeof ScrollTrigger !== 'undefined';

    if (hasScrollTrigger) {
        gsap.registerPlugin(ScrollTrigger);
    }

    const initCustomSmoothScrolling = () => {
        if (!hasScrollTrigger || prefersReducedMotion || typeof Lenis === 'undefined') {
            return;
        }

        const lenis = new Lenis({
            duration: 1.2,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
            direction: 'vertical',
            gestureDirection: 'vertical',
            smoothHover: true,
            mouseMultiplier: 1,
            smoothTouch: false,
            touchMultiplier: 2,
        });

        // Use requestAnimationFrame to update the scroll position
        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }

        requestAnimationFrame(raf);

        // Connect Lenis to ScrollTrigger
        lenis.on('scroll', ScrollTrigger.update);

        gsap.ticker.add((time) => {
            lenis.raf(time * 1000);
        });

        gsap.ticker.lagSmoothing(0);

        ScrollTrigger.config({
            limitCallbacks: true,
            ignoreMobileResize: true,
            autoRefreshEvents: 'DOMContentLoaded,load,visibilitychange'
        });
    };

    const initGlobalScrollAnimations = () => {
        if (!hasScrollTrigger || prefersReducedMotion) {
            return;
        }

        const sections = gsap.utils.toArray('main section');
        sections.forEach((section, index) => {
            if (index === 0 && section.querySelector('.mySwiper')) {
                return;
            }
            if (section.querySelector('#mission-vision')) {
                return;
            }

            const heading = section.querySelector('h1, h2, h3');
            const bodyNodes = section.querySelectorAll('p, .grid, .swiper, article, form');

            const sectionTimeline = gsap.timeline({
                scrollTrigger: {
                    trigger: section,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            });

            if (heading) {
                const spans = splitText(heading);
                sectionTimeline.fromTo(
                    spans,
                    { yPercent: 100, autoAlpha: 0 },
                    {
                        yPercent: 0,
                        autoAlpha: 1,
                        duration: 1,
                        ease: 'expo.out',
                        stagger: 0.02
                    }
                );
            } else {
                sectionTimeline.fromTo(
                    section,
                    { autoAlpha: 0, y: 40 },
                    { autoAlpha: 1, y: 0, duration: 1.2, ease: 'expo.out' }
                );
            }

            if (bodyNodes.length) {
                sectionTimeline.fromTo(
                    bodyNodes,
                    { autoAlpha: 0, y: 20 },
                    {
                        autoAlpha: 1,
                        y: 0,
                        duration: 0.8,
                        ease: 'power3.out',
                        stagger: 0.1
                    },
                    "-=0.6"
                );
            }
        });

        const parallaxImages = gsap.utils.toArray('main section img');
        parallaxImages.forEach((image) => {
            if (
                image.hasAttribute('data-services-hero-image') ||
                image.hasAttribute('data-gallery-flip-image')
            ) {
                return;
            }

            // Entry animation for images
            gsap.fromTo(image,
                { clipPath: 'inset(10% 0% 10% 0%)', scale: 1.1, autoAlpha: 0 },
                {
                    clipPath: 'inset(0% 0% 0% 0%)',
                    scale: 1,
                    autoAlpha: 1,
                    duration: 1.5,
                    ease: 'expo.out',
                    scrollTrigger: {
                        trigger: image,
                        start: 'top 90%',
                    }
                }
            );

            // Parallax effect
            gsap.fromTo(
                image,
                { yPercent: -5 },
                {
                    yPercent: 5,
                    ease: 'none',
                    scrollTrigger: {
                        trigger: image,
                        start: 'top bottom',
                        end: 'bottom top',
                        scrub: true
                    }
                }
            );
        });
    };

    // =========================================================================
    // Page Animation Helper: Services Hero Image Flip
    // =========================================================================
    const initServicesHeroImageAnimation = () => {
        const servicesPage = document.querySelector('.services-page');
        if (!servicesPage || typeof gsap === 'undefined') {
            return;
        }

        const heroImages = Array.from(servicesPage.querySelectorAll('[data-services-hero-image]'));
        if (!heroImages.length) {
            return;
        }

        const imagePool = Array.from(
            new Set(heroImages.map((image) => image.getAttribute('src')).filter(Boolean))
        );
        if (imagePool.length < 2) {
            return;
        }

        const FLIP_HALF_DURATION = 0.5;
        const PAIR_DELAY_MS = 1400;
        const CYCLE_DELAY_MS = 4200;
        const DEDUPE_DELAY_MS = 2700;
        const CORRECTION_STAGGER_MS = 420;
        const ROTATE_DEG = 82;
        const flippingImages = new WeakSet();
        let lastPairedSrc = '';

        const pickRandom = (candidates) => (
            candidates[Math.floor(Math.random() * candidates.length)]
        );

        const preloadImagePool = () => {
            imagePool.forEach((src) => {
                const preloaded = new Image();
                preloaded.src = src;
            });
        };

        const pickNextSrc = (activeSrc, nextSrc, thirdSrc) => {
            const priorityBlocks = [
                [activeSrc, nextSrc, thirdSrc, lastPairedSrc],
                [activeSrc, nextSrc, thirdSrc],
                [activeSrc, thirdSrc, lastPairedSrc],
                [activeSrc, thirdSrc],
                [activeSrc]
            ];

            for (const blockedSources of priorityBlocks) {
                const blockedSet = new Set(blockedSources.filter(Boolean));
                const candidates = imagePool.filter((src) => !blockedSet.has(src));
                if (candidates.length) {
                    return pickRandom(candidates);
                }
            }

            return activeSrc;
        };

        const flipImageToSrc = (image, imageIndex, nextSrc) => {
            if (!image || flippingImages.has(image)) {
                return;
            }

            flippingImages.add(image);
            const rotationProp = imageIndex % 2 === 0 ? 'rotationX' : 'rotationY';
            const flipTimeline = gsap.timeline({
                onComplete: () => {
                    flippingImages.delete(image);
                }
            });

            flipTimeline.to(image, {
                [rotationProp]: ROTATE_DEG,
                duration: FLIP_HALF_DURATION,
                ease: 'power2.in',
                overwrite: 'auto'
            });
            flipTimeline.call(() => {
                image.setAttribute('src', nextSrc);
                gsap.set(image, { [rotationProp]: -ROTATE_DEG });
            });
            flipTimeline.to(image, {
                [rotationProp]: 0,
                duration: FLIP_HALF_DURATION,
                ease: 'power2.out',
                overwrite: 'auto'
            });
        };

        const resolveDuplicateSources = () => {
            const seen = new Set();
            const duplicateIndexes = [];

            heroImages.forEach((image, index) => {
                const src = image.getAttribute('src') || '';
                if (!src) {
                    return;
                }
                if (seen.has(src)) {
                    duplicateIndexes.push(index);
                    return;
                }
                seen.add(src);
            });

            duplicateIndexes.forEach((index, order) => {
                const currentSrc = heroImages[index].getAttribute('src') || '';
                const usedByOthers = new Set(
                    heroImages
                        .map((img, idx) => (idx === index ? '' : (img.getAttribute('src') || '')))
                        .filter(Boolean)
                );

                let candidates = imagePool.filter((src) => src !== currentSrc && !usedByOthers.has(src));
                if (!candidates.length) {
                    candidates = imagePool.filter((src) => src !== currentSrc);
                }
                if (!candidates.length) {
                    return;
                }

                const nextSrc = pickRandom(candidates);
                window.setTimeout(() => {
                    if (flippingImages.has(heroImages[index])) {
                        return;
                    }
                    flipImageToSrc(heroImages[index], index, nextSrc);
                }, CORRECTION_STAGGER_MS * order);
            });
        };

        heroImages.forEach((image) => {
            gsap.set(image, {
                transformPerspective: 1000,
                transformOrigin: 'center center',
                rotationX: 0,
                rotationY: 0,
                force3D: true,
                backfaceVisibility: 'hidden',
                transformStyle: 'preserve-3d',
                willChange: 'transform'
            });
        });

        let activeIndex = 0;

        const runCycle = () => {
            const currentImage = heroImages[activeIndex];
            const nextIndex = (activeIndex + 1) % heroImages.length;
            const thirdIndex = (activeIndex + 2) % heroImages.length;
            const currentSrc = currentImage.getAttribute('src') || '';
            const nextSrcCurrent = heroImages[nextIndex].getAttribute('src') || '';
            const thirdSrc = heroImages[thirdIndex].getAttribute('src') || '';
            const nextSrc = pickNextSrc(currentSrc, nextSrcCurrent, thirdSrc);

            flipImageToSrc(currentImage, activeIndex, nextSrc);
            window.setTimeout(() => {
                flipImageToSrc(heroImages[nextIndex], nextIndex, nextSrc);
            }, PAIR_DELAY_MS);
            window.setTimeout(resolveDuplicateSources, DEDUPE_DELAY_MS);
            lastPairedSrc = nextSrc;

            activeIndex = (activeIndex + 1) % heroImages.length;
            window.setTimeout(runCycle, CYCLE_DELAY_MS);
        };

        preloadImagePool();
        resolveDuplicateSources();
        runCycle();
    };

    // =========================================================================
    // Page Animation Helper: Gallery Image Flip
    // =========================================================================
    const initGalleryFlipAnimation = () => {
        const galleryPage = document.querySelector('.gallery-page');
        if (!galleryPage || typeof gsap === 'undefined') {
            return;
        }

        const galleryImages = Array.from(galleryPage.querySelectorAll('[data-gallery-flip-image]'));
        if (galleryImages.length < 2) {
            return;
        }

        const imagePool = Array.from(
            new Set(galleryImages.map((image) => image.getAttribute('src')).filter(Boolean))
        );

        if (imagePool.length < 2) {
            return;
        }

        const FLIP_HALF_DURATION = 0.52;
        const PAIR_DELAY_MS = 1400;
        const CYCLE_DELAY_MS = 4200;
        const DEDUPE_DELAY_MS = 2700;
        const CORRECTION_STAGGER_MS = 360;
        const ROTATE_DEG = 82;
        const flippingImages = new WeakSet();
        let lastPairedSrc = '';

        const pickRandom = (candidates) => (
            candidates[Math.floor(Math.random() * candidates.length)]
        );

        const preloadImagePool = () => {
            imagePool.forEach((src) => {
                const preloaded = new Image();
                preloaded.src = src;
            });
        };

        const pickNextSrc = (activeSrc, nextSrc, thirdSrc) => {
            const priorityBlocks = [
                [activeSrc, nextSrc, thirdSrc, lastPairedSrc],
                [activeSrc, nextSrc, thirdSrc],
                [activeSrc, thirdSrc, lastPairedSrc],
                [activeSrc, thirdSrc],
                [activeSrc]
            ];

            for (const blockedSources of priorityBlocks) {
                const blockedSet = new Set(blockedSources.filter(Boolean));
                const candidates = imagePool.filter((src) => !blockedSet.has(src));
                if (candidates.length) {
                    return pickRandom(candidates);
                }
            }

            return activeSrc;
        };

        const flipImageToSrc = (image, imageIndex, nextSrc) => {
            if (!image || flippingImages.has(image)) {
                return;
            }

            flippingImages.add(image);
            const rotationProp = imageIndex % 2 === 0 ? 'rotationX' : 'rotationY';
            const flipTimeline = gsap.timeline({
                onComplete: () => {
                    flippingImages.delete(image);
                }
            });

            flipTimeline.to(image, {
                [rotationProp]: ROTATE_DEG,
                duration: FLIP_HALF_DURATION,
                ease: 'power2.in',
                overwrite: 'auto'
            });
            flipTimeline.call(() => {
                image.setAttribute('src', nextSrc);
                gsap.set(image, { [rotationProp]: -ROTATE_DEG });
            });
            flipTimeline.to(image, {
                [rotationProp]: 0,
                duration: FLIP_HALF_DURATION,
                ease: 'power2.out',
                overwrite: 'auto'
            });
        };

        const resolveDuplicateSources = () => {
            const seen = new Set();
            const duplicateIndexes = [];

            galleryImages.forEach((image, index) => {
                const src = image.getAttribute('src') || '';
                if (!src) {
                    return;
                }
                if (seen.has(src)) {
                    duplicateIndexes.push(index);
                    return;
                }
                seen.add(src);
            });

            duplicateIndexes.forEach((index, order) => {
                const currentSrc = galleryImages[index].getAttribute('src') || '';
                const usedByOthers = new Set(
                    galleryImages
                        .map((img, idx) => (idx === index ? '' : (img.getAttribute('src') || '')))
                        .filter(Boolean)
                );

                let candidates = imagePool.filter((src) => src !== currentSrc && !usedByOthers.has(src));
                if (!candidates.length) {
                    candidates = imagePool.filter((src) => src !== currentSrc);
                }
                if (!candidates.length) {
                    return;
                }

                const nextSrc = pickRandom(candidates);
                window.setTimeout(() => {
                    if (flippingImages.has(galleryImages[index])) {
                        return;
                    }
                    flipImageToSrc(galleryImages[index], index, nextSrc);
                }, CORRECTION_STAGGER_MS * order);
            });
        };

        galleryImages.forEach((image) => {
            gsap.set(image, {
                transformPerspective: 1000,
                transformOrigin: 'center center',
                rotationX: 0,
                rotationY: 0,
                force3D: true,
                backfaceVisibility: 'hidden',
                transformStyle: 'preserve-3d',
                willChange: 'transform'
            });
        });

        let activeIndex = 0;

        const runCycle = () => {
            const currentImage = galleryImages[activeIndex];
            const nextIndex = (activeIndex + 1) % galleryImages.length;
            const thirdIndex = (activeIndex + 2) % galleryImages.length;
            const currentSrc = currentImage.getAttribute('src') || '';
            const nextSrcCurrent = galleryImages[nextIndex].getAttribute('src') || '';
            const thirdSrc = galleryImages[thirdIndex].getAttribute('src') || '';
            const nextSrc = pickNextSrc(currentSrc, nextSrcCurrent, thirdSrc);

            flipImageToSrc(currentImage, activeIndex, nextSrc);
            window.setTimeout(() => {
                flipImageToSrc(galleryImages[nextIndex], nextIndex, nextSrc);
            }, PAIR_DELAY_MS);
            window.setTimeout(resolveDuplicateSources, DEDUPE_DELAY_MS);
            lastPairedSrc = nextSrc;

            activeIndex = (activeIndex + 1) % galleryImages.length;
            window.setTimeout(runCycle, CYCLE_DELAY_MS);
        };

        preloadImagePool();
        resolveDuplicateSources();
        runCycle();
    };

    // =========================================================================
    // Home Page Scripts
    // =========================================================================

    // Preloader Animation
    const initPreloader = () => {
        const preloader = document.getElementById('preloader');
        const progress = preloader?.querySelector('.preloader-progress');
        const content = preloader?.querySelector('.preloader-content');

        if (!preloader || !hasGsap) return;

        const tl = gsap.timeline({
            onComplete: () => {
                document.body.classList.remove('loading');
                preloader.style.display = 'none';
            }
        });

        // Simulate progress
        tl.to(progress, {
            width: '100%',
            duration: 1.5,
            ease: 'power2.inOut'
        });

        // Content fade out
        tl.to(content, {
            opacity: 0,
            y: -20,
            duration: 0.6,
            ease: 'power2.in'
        });

        // Preloader slide up
        tl.to(preloader, {
            yPercent: -100,
            duration: 0.8,
            ease: 'expo.inOut'
        }, "-=0.2");
    };

    // Replace the standard swiper.init() with a delayed one if preloader exists
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
            speed: 1200, // Slightly slower for more cinematic feel
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
            }
        });

        // Wait for preloader to finish (approx 1.5 + 0.6 + 0.8 = 2.9s max)
        // But we want it to start as the preloader slides up
        window.addEventListener('load', () => {
            initPreloader();
            setTimeout(() => {
                swiper.init();
                animateActiveHeroSlide(swiper);
            }, 2200);
        });
    } else {
        window.addEventListener('load', initPreloader);
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

    // =========================================================================
    // About Us Page Scripts
    // =========================================================================

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

        const updateMainImage = (tab, index, animate = true) => {
            if (!mainImage || !tabImageMap[tab] || !tabImageMap[tab][index]) {
                return;
            }

            const nextImage = tabImageMap[tab][index];

            if (animate && typeof gsap !== 'undefined') {
                gsap.killTweensOf(mainImage);
                gsap.to(mainImage, {
                    autoAlpha: 0,
                    scale: 0.985,
                    duration: 0.24,
                    ease: 'power2.inOut',
                    onComplete: () => {
                        mainImage.src = nextImage.src;
                        mainImage.alt = nextImage.alt;
                        gsap.fromTo(
                            mainImage,
                            { autoAlpha: 0, scale: 1.015 },
                            { autoAlpha: 1, scale: 1, duration: 0.42, ease: 'power2.out' }
                        );
                    }
                });
            } else {
                mainImage.src = nextImage.src;
                mainImage.alt = nextImage.alt;
            }
        };

        const setActiveTab = (nextTab, nextIndex = 0, options = {}) => {
            const shouldRestart = options.restart !== false;
            const shouldAnimate = options.animate !== false;
            const indexLimit = (tabImageMap[nextTab] || []).length;
            const boundedIndex = indexLimit ? Math.max(0, Math.min(nextIndex, indexLimit - 1)) : 0;

            activeTab = nextTab;
            activeImageIndex = boundedIndex;
            updateMainImage(activeTab, activeImageIndex, shouldAnimate);
            renderActiveTab();

            if (shouldRestart) {
                restartSlideshow();
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

                setActiveTab(nextTab, 0, { restart: true, animate: true });
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
                updateMainImage(activeTab, activeImageIndex, true);
                renderActiveTab();
                restartSlideshow();
            });
        });

        updateMainImage(activeTab, activeImageIndex, false);
        renderActiveTab();

        const useScrollDrivenMissionVision = hasScrollTrigger && !prefersReducedMotion;
        if (useScrollDrivenMissionVision) {
            if (slideshowTimer) {
                window.clearInterval(slideshowTimer);
            }

            const missionImages = tabImageMap.mission || [];
            const visionImages = tabImageMap.vision || [];
            const totalFrames = missionImages.length + visionImages.length;
            const pinTarget = missionVision.closest('section') || missionVision;

            if (totalFrames < 2) {
                return;
            }

            ScrollTrigger.create({
                trigger: pinTarget,
                start: 'top top',
                end: `+=${Math.max(1800, totalFrames * 420)}`,
                pin: true,
                pinSpacing: true,
                scrub: 0.35,
                anticipatePin: 1,
                onUpdate: (self) => {
                    const maxFrame = totalFrames - 1;
                    const frame = Math.min(maxFrame, Math.floor(self.progress * totalFrames));
                    const isMission = frame < missionImages.length;
                    const nextTab = isMission ? 'mission' : 'vision';
                    const nextIndex = isMission ? frame : frame - missionImages.length;

                    if (nextTab !== activeTab || nextIndex !== activeImageIndex) {
                        setActiveTab(nextTab, nextIndex, { restart: false, animate: false });
                    }
                }
            });
        } else {
            restartSlideshow();
        }
    }

    const initAboutTimeline = () => {
        const journeySection = document.querySelector('.journey-section');
        if (!journeySection) return;

        const timelineItems = journeySection.querySelectorAll('.about-timeline__item');
        const contentArticles = journeySection.querySelectorAll('.timeline-container .md\\:grid article');
        const progressTrack = journeySection.querySelector('.about-timeline__track');

        if (!timelineItems.length) return;

        const updateTimeline = (index) => {
            // Update items
            timelineItems.forEach((item, i) => {
                item.classList.toggle('active', i === index);
            });

            // Update content articles (desktop)
            const visualOrderArticles = [
                contentArticles[0], // Top 0
                contentArticles[3], // Bottom 0
                contentArticles[1], // Top 1
                contentArticles[4], // Bottom 1
                contentArticles[2]  // Top 2
            ];

            visualOrderArticles.forEach((article, i) => {
                if (article) {
                    article.classList.toggle('active-content', i === index);
                }
            });

            // Update progress track width
            if (progressTrack) {
                const step = 100 / (timelineItems.length - 1);
                const width = index * step;

                const styleId = 'timeline-progress-style';
                let styleEl = document.getElementById(styleId);
                if (!styleEl) {
                    styleEl = document.createElement('style');
                    styleEl.id = styleId;
                    document.head.appendChild(styleEl);
                }
                styleEl.textContent = `.about-timeline__track::after { width: ${width}% !important; }`;
            }
        };

        timelineItems.forEach((item, index) => {
            item.addEventListener('click', () => {
                updateTimeline(index);
            });
        });

        // Initialize first point
        updateTimeline(0);
    };

    // =========================================================================
    // Services Page Scripts (Components)
    // =========================================================================

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

    // Services Page Gallery
    const servicesGalleryElement = document.querySelector('.services-gallery-swiper');
    if (servicesGalleryElement) {
        new Swiper('.services-gallery-swiper', {
            slidesPerView: 'auto',
            speed: 650,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: true
            },
            slideToClickedSlide: true,
            navigation: {
                nextEl: '.services-gallery-next',
                prevEl: '.services-gallery-prev'
            },
            breakpoints: {
                0: {
                    spaceBetween: 14
                },
                1024: {
                    spaceBetween: 16
                }
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

    // =========================================================================
    // Global Init Order
    // 1) Home
    // 2) About Us
    // 3) Gallery
    // 4) Services
    // =========================================================================
    initCustomSmoothScrolling();
    initGlobalScrollAnimations();

    // Home
    // (hero + preloader are auto-initialized above when .mySwiper exists)

    // About Us
    initAboutTimeline();

    // Gallery
    initGalleryFlipAnimation();

    // Services
    initServicesHeroImageAnimation();
});
