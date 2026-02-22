document.addEventListener('DOMContentLoaded', function () {
    document.body.classList.add('loading');

    // =========================================================================
    // Shared Helpers / Global Animation Utilities
    // =========================================================================

    const runSimplifiedHeroAnimation = (slide) => {
        if (!slide || typeof gsap === 'undefined') return;

        const elements = slide.querySelectorAll('[data-hero-anim]');
        if (!elements.length) return;

        // Kill existing animations on these elements
        gsap.killTweensOf(elements);

        // Reset state
        gsap.set(elements, {
            autoAlpha: 0,
            y: 40
        });

        // Animate in
        gsap.to(elements, {
            autoAlpha: 1,
            y: 0,
            duration: 1.2,
            stagger: 0.15,
            ease: 'power3.out',
            delay: 0.2
        });

        // Background scale effect
        const bg = slide.querySelector('.hero-slide__bg');
        if (bg) {
            gsap.killTweensOf(bg);
            gsap.fromTo(bg,
                { scale: 1.15 },
                { scale: 1, duration: 8, ease: 'linear' }
            );
        }
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
            if (index === 0 && section.querySelector('.myHeroSwiper')) {
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
                sectionTimeline.fromTo(
                    heading,
                    { y: 30, autoAlpha: 0 },
                    {
                        y: 0,
                        autoAlpha: 1,
                        duration: 1,
                        ease: 'expo.out'
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
    const swiperElement = document.querySelector('.myHeroSwiper');
    if (swiperElement) {
        // Pre-hide elements manually to avoid flash
        swiperElement.querySelectorAll('[data-hero-anim]').forEach(el => {
            gsap.set(el, { autoAlpha: 0, y: 40 });
        });

        const swiper = new Swiper('.myHeroSwiper', {
            init: false,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            speed: 1500,
            loop: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false
            },
            on: {
                init: function () {
                    runSimplifiedHeroAnimation(this.slides[this.activeIndex]);
                },
                slideChangeTransitionStart: function () {
                    runSimplifiedHeroAnimation(this.slides[this.activeIndex]);
                }
            }
        });

        // Initialize preloader
        initPreloader();

        // Initialize swiper as preloader starts its exit
        const initSwiperDelayed = () => {
            if (!swiper.initialized) {
                swiper.init();
            }
        };

        if (document.readyState === 'complete') {
            setTimeout(initSwiperDelayed, 1000);
        } else {
            window.addEventListener('load', () => {
                setTimeout(initSwiperDelayed, 1000);
            });
        }
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
    // Blog Page Scripts
    // =========================================================================
    const loadMoreBtn = document.getElementById('load-more-btn');
    const blogGrid = document.getElementById('blog-grid');
    const trendingGrid = document.getElementById('trending-grid');
    const recentGrid = document.getElementById('recent-grid');

    if (loadMoreBtn && (blogGrid || (trendingGrid && recentGrid))) {
        loadMoreBtn.addEventListener('click', function () {
            const page = parseInt(loadMoreBtn.getAttribute('data-page'));
            const postId = loadMoreBtn.getAttribute('data-post-id') || 0;
            const buttonText = loadMoreBtn.innerText;

            loadMoreBtn.innerText = 'Loading...';
            loadMoreBtn.disabled = true;

            const formData = new FormData();
            formData.append('action', 'load_more_posts');
            formData.append('page', page);
            if (postId) {
                formData.append('current_post_id', postId);
            }

            fetch(nks_ajax.ajax_url, {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    const contentType = response.headers.get("content-type");
                    if (contentType && contentType.indexOf("application/json") !== -1) {
                        return response.json();
                    } else {
                        return response.text();
                    }
                })
                .then(data => {
                    let hasData = false;

                    // Handle JSON response (Single Page Dual Column)
                    if (typeof data === 'object') {
                        if (data.trending && data.trending.trim().length > 0) {
                            trendingGrid.insertAdjacentHTML('beforeend', data.trending);
                            hasData = true;
                        }
                        if (data.recent && data.recent.trim().length > 0) {
                            recentGrid.insertAdjacentHTML('beforeend', data.recent);
                            hasData = true;
                        }
                    }
                    // Handle String response (Blog List Page)
                    else if (typeof data === 'string' && data.trim().length > 0) {
                        blogGrid.insertAdjacentHTML('beforeend', data);
                        hasData = true;
                    }

                    if (hasData) {
                        loadMoreBtn.setAttribute('data-page', page + 1);
                        loadMoreBtn.innerText = buttonText;
                        loadMoreBtn.disabled = false;

                        // Trigger scroll animation for new items
                        if (typeof ScrollTrigger !== 'undefined') {
                            ScrollTrigger.refresh();
                        }
                    } else {
                        loadMoreBtn.innerText = 'No More Posts';
                        loadMoreBtn.classList.add('opacity-50', 'cursor-not-allowed');
                    }
                })
                .catch(error => {
                    console.error('Error loading more posts:', error);
                    loadMoreBtn.innerText = buttonText;
                    loadMoreBtn.disabled = false;
                });
        });
    }

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

        const updateMainImage = (tab, index, options = {}) => {
            if (!mainImage || !tabImageMap[tab] || !tabImageMap[tab][index]) {
                return;
            }

            const animate = typeof options === 'boolean' ? options : (options.animate !== false);
            const isScrubbing = options.scrollScrub === true;
            const nextImage = tabImageMap[tab][index];

            if (animate && typeof gsap !== 'undefined') {
                gsap.killTweensOf(mainImage);

                // Faster durations when scrubbing
                const outDuration = isScrubbing ? 0.15 : 0.24;
                const inDuration = isScrubbing ? 0.3 : 0.42;

                gsap.to(mainImage, {
                    autoAlpha: 0,
                    scale: 0.985,
                    duration: outDuration,
                    ease: isScrubbing ? 'none' : 'power2.inOut',
                    onComplete: () => {
                        mainImage.src = nextImage.src;
                        mainImage.alt = nextImage.alt;
                        gsap.fromTo(
                            mainImage,
                            { autoAlpha: 0, scale: 1.015 },
                            {
                                autoAlpha: 1,
                                scale: 1,
                                duration: inDuration,
                                ease: isScrubbing ? 'none' : 'power2.out'
                            }
                        );
                    }
                });
            } else {
                mainImage.src = nextImage.src;
                mainImage.alt = nextImage.alt;
                gsap.set(mainImage, { autoAlpha: 1, scale: 1 });
            }
        };

        const setActiveTab = (nextTab, nextIndex = 0, options = {}) => {
            const shouldRestart = options.restart !== false;
            const indexLimit = (tabImageMap[nextTab] || []).length;
            const boundedIndex = indexLimit ? Math.max(0, Math.min(nextIndex, indexLimit - 1)) : 0;

            activeTab = nextTab;
            activeImageIndex = boundedIndex;
            updateMainImage(activeTab, activeImageIndex, options);
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
                end: `+=${Math.max(2000, totalFrames * 500)}`,
                pin: true,
                pinSpacing: true,
                scrub: 1.2,
                anticipatePin: 1,
                onUpdate: (self) => {
                    const maxFrame = totalFrames - 1;
                    const frame = Math.min(maxFrame, Math.floor(self.progress * (totalFrames + 0.1)));
                    const isMission = frame < missionImages.length;
                    const nextTab = isMission ? 'mission' : 'vision';
                    const nextIndex = isMission ? frame : frame - missionImages.length;

                    if (nextTab !== activeTab || nextIndex !== activeImageIndex) {
                        // Use a faster transition for scroll-scrubbed updates
                        setActiveTab(nextTab, nextIndex, { restart: false, animate: true, scrollScrub: true });
                    }
                }
            });
        } else {
            restartSlideshow();
        }
    }

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
    // (hero + preloader are auto-initialized above when .myHeroSwiper exists)

    // Gallery
    initGalleryFlipAnimation();

    // Services
    initServicesHeroImageAnimation();

    // =========================================================================
    // India Map Chart (ZingChart)
    // =========================================================================
    function initIndiaMapChart() {
        const chartId = 'india-map-chart';
        const chartElement = document.getElementById(chartId);
        if (!chartElement) return;
        if (typeof zingchart === 'undefined') return;

        const detailBox = document.getElementById('state-detail-box');
        const stateNameEl = document.getElementById('detail-state-name');
        const stateDescEl = document.getElementById('detail-state-desc');
        const stateValueEl = document.getElementById('detail-state-value');

        // State Data Mapping
        const stateData = {
            'TN': { name: 'Tamil Nadu', value: '1200+', desc: 'Book your slot for the next event and let your brand shine in front of millions in Tamil Nadu.' },
            'MH': { name: 'Maharashtra', value: '1500+', desc: 'Driving millions of impressions through immersive experiences in the heart of Maharashtra.' },
            'KA': { name: 'Karnataka', value: '950+', desc: 'Connecting brands with high-intent audiences across Karnataka\'s tech hubs.' },
            'DL': { name: 'Delhi', value: '1800+', desc: 'Unmatched brand visibility in the capital region with our premium 3D LED displays.' },
            'WB': { name: 'West Bengal', value: '800+', desc: 'Captivating audiences in West Bengal with high-impact cinematic advertising.' },
            'GJ': { name: 'Gujarat', value: '1100+', desc: 'Expanding brand reach across industrial and cultural centers of Gujarat.' },
            'TG': { name: 'Telangana', value: '900+', desc: 'Innovating brand storytelling in the vibrant markets of Telangana.' },
            'AP': { name: 'Andhra Pradesh', value: '750+', desc: 'Delivering immersive brand experiences across Andhra Pradesh.' },
            'UP': { name: 'Uttar Pradesh', value: '1400+', desc: 'Reaching millions in India\'s most populous state with scale and precision.' }
        };

        const chartConfig = {
            shapes: [
                {
                    type: 'zingchart.maps',
                    options: {
                        name: 'ind',
                        panning: false,
                        zooming: false,
                        scrolling: false,
                        style: {
                            controls: { visible: false },
                            backgroundColor: 'transparent',
                            borderColor: '#E13C2B',
                            borderWidth: '0.5px',
                            item: {
                                backgroundColor: '#FFF0F0',
                                cursor: 'pointer'
                            },
                            hoverState: {
                                backgroundColor: '#E13C2B',
                                transition: 'all 0.2s ease-in-out'
                            },
                            tooltip: {
                                visible: false // We use our custom detail box
                            }
                        }
                    }
                }
            ]
        };

        zingchart.render({
            id: chartId,
            data: chartConfig,
            height: '100%',
            width: '100%'
        });

        // Event Handling for custom detail box
        zingchart.bind(chartId, 'shape_mouseover', (e) => {
            const stateCode = e.shapeid; // e.g., 'TN'
            const data = stateData[stateCode] || { name: stateCode, value: 'Coming Soon', desc: 'We are expanding our presence here. Stay tuned for more updates!' };

            if (detailBox && typeof gsap !== 'undefined') {
                stateNameEl.textContent = data.name;
                stateDescEl.textContent = data.desc;
                stateValueEl.textContent = data.value;

                // Move detail box near mouse (offset for better visibility)
                const x = e.ev.clientX;
                const y = e.ev.clientY;

                // Keep box visible inside container
                const rect = chartElement.getBoundingClientRect();
                const offsetX = x - rect.left + 20;
                const offsetY = y - rect.top - 100;

                gsap.to(detailBox, {
                    left: offsetX,
                    top: offsetY,
                    autoAlpha: 1,
                    scale: 1,
                    duration: 0.4,
                    ease: 'back.out(1.7)'
                });
            }
        });

        zingchart.bind(chartId, 'shape_mouseout', () => {
            if (detailBox && typeof gsap !== 'undefined') {
                gsap.to(detailBox, {
                    autoAlpha: 0,
                    scale: 0.9,
                    duration: 0.3
                });
            }
        });

        // Keep detail box following mouse while inside a state
        zingchart.bind(chartId, 'shape_mousemove', (e) => {
            if (detailBox && typeof gsap !== 'undefined' && detailBox.style.opacity > 0) {
                const rect = chartElement.getBoundingClientRect();
                gsap.to(detailBox, {
                    left: e.ev.clientX - rect.left + 20,
                    top: e.ev.clientY - rect.top - 100,
                    duration: 0.1,
                    overwrite: 'auto'
                });
            }
        });
    }

    initIndiaMapChart();
});
