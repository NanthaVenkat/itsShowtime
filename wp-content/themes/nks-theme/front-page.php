<?php get_header(); ?>

<!-- Cinematic Preloader -->
<div id="preloader" class="fixed inset-0 z-[9999] flex items-center justify-center bg-black">
    <div class="preloader-content flex flex-col items-center">
        <div class="preloader-line w-48 h-[2px] bg-white/20 relative overflow-hidden">
            <div class="preloader-progress absolute inset-y-0 left-0 bg-primary w-0"></div>
        </div>
        <div class="preloader-text mt-4 text-white text-xs tracking-[0.3em] font-light uppercase opacity-50">Loading...
        </div>
    </div>
</div>

<main class="w-full relative">
    <!-- Hero Slider Section -->
    <section class="relative h-screen w-full overflow-hidden">
        <div class="swiper myHeroSwiper w-full h-full">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide relative hero-slide overflow-hidden">
                    <!-- Background Layer -->
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="hero-slide__bg bg-cover bg-center w-full h-full"
                            style="background-image: url('http://localhost/showtime/wp-content/uploads/2026/02/banner2-scaled.webp');">
                        </div>
                    </div>

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-linear-to-t from-black via-black/50 to-transparent z-10"></div>

                    <!-- Content -->
                    <div class="relative h-full w-full flex items-end justify-start z-20 container mx-auto">
                        <div class="max-w-3xl px-6 py-8 lg:px-16 lg:py-18 mb-6">
                            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white leading-tight mb-6 max-w-4xl"
                                data-hero-anim>
                                Immersive Display Experiences That Transform Brands Into Moments
                            </h1>
                            <p class="text-gray-300 text-md sm:text-xl max-w-2xl mb-8" data-hero-anim>
                                Using advanced display technology, we help brands create immersive moments that capture
                                attention, spark emotion, and stay memorable.
                            </p>
                            <div class="flex flex-wrap gap-4" data-hero-anim>
                                <a href="#"
                                    class="inline-block rounded-lg bg-white border border-primary text-primary hover:text-white hover:bg-primary p-2 font-medium transition-all text-sm sm:text-md">Explore
                                    Services</a>
                                <a href="#"
                                    class="inline-block rounded-lg bg-primary text-white border-primary hover:bg-white hover:text-primary p-2 font-medium transition-all text-sm sm:text-md">Contact
                                    Us</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide relative hero-slide overflow-hidden">
                    <!-- Background Layer -->
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="hero-slide__bg bg-cover bg-center w-full h-full"
                            style="background-image: url('http://localhost/showtime/wp-content/uploads/2026/02/banner1.webp');">
                        </div>
                    </div>

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-linear-to-t from-black via-black/50 to-transparent z-10"></div>

                    <!-- Content -->
                    <div class="relative h-full w-full flex items-end justify-start z-20 container mx-auto">
                        <div class="max-w-3xl px-6 py-8 lg:px-16 lg:py-18 mb-6">
                            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white leading-tight mb-6 max-w-4xl"
                                data-hero-anim>
                                Immersive Display Experiences That Transform Brands Into Moments
                            </h1>
                            <p class="text-gray-300 text-md sm:text-xl max-w-2xl mb-8" data-hero-anim>
                                Using advanced display technology, we help brands create immersive moments that capture
                                attention, spark emotion, and stay memorable.
                            </p>
                            <div class="flex flex-wrap gap-4" data-hero-anim>
                                <a href="#"
                                    class="inline-block rounded-lg bg-white border border-primary text-primary hover:text-white hover:bg-primary p-2 font-medium transition-all text-sm sm:text-md">Explore
                                    Services</a>
                                <a href="#"
                                    class="inline-block rounded-lg bg-primary text-white border-primary hover:bg-white hover:text-primary p-2 font-medium transition-all text-sm sm:text-md">Contact
                                    Us</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide relative hero-slide overflow-hidden">
                    <!-- Background Layer -->
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="hero-slide__bg bg-cover bg-center w-full h-full"
                            style="background-image: url('http://localhost/showtime/wp-content/uploads/2026/02/banner3.webp');">
                        </div>
                    </div>

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-linear-to-t from-black via-black/50 to-transparent z-10"></div>

                    <!-- Content -->
                    <div class="relative h-full w-full flex items-end justify-start z-20 container mx-auto">
                        <div class="max-w-3xl px-6 py-8 lg:px-16 lg:py-18 mb-6">
                            <span class="inline-block bg-primary text-white text-md px-3.5 py-1 rounded-lg mb-2.5"
                                data-hero-anim>Trending</span>
                            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white leading-tight mb-6 max-w-4xl"
                                data-hero-anim>
                                Precision Branding, Built for Real-World Use Experience
                            </h1>
                            <p class="text-gray-300 text-md sm:text-xl max-w-2xl mb-8" data-hero-anim>
                                Naked eye advertising refers to outdoor 3D LED displays that create the illusion of
                                three-dimensional Naked eye advertising refers to outdoor 3D LED displays that create
                                the illusion of three-dimensional
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Swiper Pagination -->
            <!-- <div class="swiper-pagination"></div> -->

            <!-- Swiper Navigation -->
            <!-- <div class="swiper-button-next text-white"></div> -->
            <!-- <div class="swiper-button-prev text-white"></div> -->
        </div>
    </section>

    <!-- map section -->
    <section class="py-16 bg-white overflow-hidden">
        <div class="container mx-auto">
            <h2 class="text-primary text-4xl md:text-6xl font-medium text-center">Driving millions of impressions</h2>
            <h2 class="text-4xl md:text-6xl font-medium text-center">through immersive Experiences </h2>

            <p class="text-center text-lg md:text-2xl mt-7 mx-auto max-w-lg font-medium mb-12">Book your slot for the
                next
                event and let your brand shine in front of millions nationwide.</p>

            <div class="relative max-w-5xl mx-auto">
                <div id="india-map-chart" class="w-full h-[600px] md:h-[800px]"></div>

                <!-- Custom state Detail box (Figma Style) -->
                <div id="state-detail-box"
                    class="absolute pointer-events-none opacity-0 z-50 bg-[#FDF8F8] border border-primary/30 p-6 rounded-2xl shadow-xl transition-all duration-300 min-w-[300px]">
                    <h3 id="detail-state-name" class="text-primary text-3xl font-bold mb-3">State Name</h3>
                    <p id="detail-state-desc" class="text-gray-700 text-sm mb-4 leading-relaxed">Book your slot for the
                        next event and let your brand shine in front of millions nationwide.</p>
                    <p id="detail-state-value" class="text-primary text-4xl font-bold">1000+</p>
                </div>
            </div>
        </div>
    </section>

    <!-- about section -->
    <section class="py-16 bg-primary text-white">
        <div class="container mx-auto">

            <div class="px-3 sm:px-5 lg:px-10">
                <h2 class="border border-white rounded-full inline-block px-3 py-1.5 mb-5">About</h2>

                <div class="grid md:grid-cols-[500px_auto] mb-20">
                    <div class="mb-5 md:mb-0">
                        <h4 class="font-semibold text-2xl md:text-4xl">It's Show Time</h4>
                    </div>

                    <div>
                        <p class="font-medium text-md md:text-xl">We help brands engage audiences through immersive
                            displays
                            and experiential advertising solutions that create meaningful impact in real-world
                            environments.
                            Our approach blends creativity and technology to turn physical spaces into memorable brand
                            experiences.</p>
                    </div>
                </div>
            </div>

            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4 sm:px-5 lg:px-10">
                <img src="http://localhost/showtime/wp-content/uploads/2026/02/about-banner-3.jpg" alt=""
                    class="w-full h-[580px] object-cover object-center">
                <img src="http://localhost/showtime/wp-content/uploads/2026/02/about-banner-2.jpg" alt=""
                    class="w-full h-[580px] object-cover object-center">
                <img src="http://localhost/showtime/wp-content/uploads/2026/02/about-banner-1.jpg" alt=""
                    class="w-full h-[580px] object-cover object-center">
            </div>
        </div>
    </section>

    <!-- Mission Vission -->
    <section class="py-16">
        <div class="container px-3 sm:px-5 lg:px-10 mx-auto mission-vision" id="mission-vision">
            <div class="grid lg:grid-cols-[1fr_1fr_92px] gap-6 lg:gap-8 items-end">
                <div class="mission-vision__media relative overflow-hidden h-[380px] md:h-[560px] lg:h-screen">
                    <img id="mission-vision-main-image" class="w-full h-full object-cover mission-vision__main-image"
                        src="http://localhost/showtime/wp-content/uploads/2026/02/about-banner-3.jpg"
                        alt="Mission and vision visual">
                </div>

                <div class="pb-1">
                    <span
                        class="inline-flex items-center rounded-full border border-gray-300 text-gray-800 px-4 py-2 text-md font-medium mb-6">
                        Our Purpose</span>

                    <div class="flex items-center gap-8 border-b border-gray-300 mb-6">
                        <button type="button" class="mission-vision__tab-btn mission-vision__tab-btn--active"
                            data-tab-trigger="mission">
                            MISSION
                        </button>
                        <button type="button" class="mission-vision__tab-btn" data-tab-trigger="vision">
                            VISION
                        </button>
                    </div>

                    <div class="mission-vision__panel mission-vision__panel--active" data-tab-panel="mission">
                        <h3 class="text-primary text-4xl md:text-6xl font-semibold mb-5">Mission</h3>
                        <p class="text-gray-600 text-lg md:text-xl leading-10">
                            Our vision is to create a world where advertising becomes an experience rather than just
                            something people watch. We believe in meaningful, immersive interactions that connect brands
                            with audiences in real, memorable ways.
                        </p>
                    </div>

                    <div class="mission-vision__panel" data-tab-panel="vision">
                        <h3 class="text-primary text-4xl md:text-6xl font-semibold mb-5">Vision</h3>
                        <p class="text-gray-600 text-lg md:text-xl leading-10">
                            Our vision is to create a world where advertising becomes an experience rather than just
                            something people watch. We believe in meaningful, immersive interactions that connect brands
                            with audiences in real, memorable ways.
                        </p>
                    </div>
                </div>

                <div class="space-y-4 md:space-y-5 mission-vision__thumb-list">
                    <button type="button" class="mission-vision__thumb mission-vision__thumb--active"
                        data-tab-thumb="mission" data-image-index="0" aria-label="Mission image 1">
                        <img class="w-full h-[110px] object-cover"
                            src="http://localhost/showtime/wp-content/uploads/2026/02/about-banner-3.jpg"
                            alt="Mission thumbnail 1">
                    </button>
                    <button type="button" class="mission-vision__thumb" data-tab-thumb="mission" data-image-index="1"
                        aria-label="Mission image 2">
                        <img class="w-full h-[110px] object-cover"
                            src="http://localhost/showtime/wp-content/uploads/2026/02/about-banner-2.jpg"
                            alt="Mission thumbnail 2">
                    </button>
                    <button type="button" class="mission-vision__thumb" data-tab-thumb="mission" data-image-index="2"
                        aria-label="Mission image 3">
                        <img class="w-full h-[110px] object-cover"
                            src="http://localhost/showtime/wp-content/uploads/2026/02/about-banner-1.jpg"
                            alt="Mission thumbnail 3">
                    </button>

                    <button type="button" class="mission-vision__thumb hidden" data-tab-thumb="vision"
                        data-image-index="0" aria-label="Vision image 1">
                        <img class="w-full h-[110px] object-cover"
                            src="http://localhost/showtime/wp-content/uploads/2026/02/banner3.webp"
                            alt="Vision thumbnail 1">
                    </button>
                    <button type="button" class="mission-vision__thumb hidden" data-tab-thumb="vision"
                        data-image-index="1" aria-label="Vision image 2">
                        <img class="w-full h-[110px] object-cover"
                            src="http://localhost/showtime/wp-content/uploads/2026/02/banner2-scaled.webp"
                            alt="Vision thumbnail 2">
                    </button>
                    <button type="button" class="mission-vision__thumb hidden" data-tab-thumb="vision"
                        data-image-index="2" aria-label="Vision image 3">
                        <img class="w-full h-[110px] object-cover"
                            src="http://localhost/showtime/wp-content/uploads/2026/02/banner1.webp"
                            alt="Vision thumbnail 3">
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Services -->
    <section class="py-20 bg-primary text-white">
        <div class="container mx-auto lg:px-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-10 items-stretch">
                <div class="px-3 sm:px-5 lg:px-0">
                    <span class="inline-flex border border-white/80 rounded-full px-4 py-2 text-sm mb-6">Our
                        Services</span>
                    <h2 class="text-4xl md:text-6xl font-bold leading-tight mb-5">Our Experiential Display Solutions
                    </h2>
                    <p class="text-lg leading-relaxed max-w-3xl mb-6">
                        We design and deliver immersive display solutions that transform physical spaces into
                        high-impact
                        brand experiences using advanced visual and sensory technology.
                    </p>
                    <a href="#"
                        class="inline-block bg-white text-primary px-5 py-3 rounded-xl font-semibold mb-8">Contact
                        Us</a>

                    <div class="grid gap-4">
                        <div class="border border-white/90 rounded-[10px] p-6 bg-transparent">
                            <h3 class="text-2xl md:text-4xl font-bold mb-3">Multi-Sensory Experiences</h3>
                            <p class="text-base leading-relaxed">Immersive experiences that combine sight, sound, touch,
                                and environmental cues to create deeper emotional connections between brands and their
                                audiences.</p>
                        </div>
                        <div class="border border-white/90 rounded-[10px] p-6 bg-transparent">
                            <h3 class="text-2xl md:text-4xl font-bold mb-3">Video Wall Displays</h3>
                            <p class="text-base leading-relaxed">High-impact LED video walls that choreograph motion,
                                color, and storytelling into cinematic brand moments built for scale, clarity, and
                                public visibility.</p>
                        </div>
                        <div class="border border-white/90 rounded-[10px] p-6 bg-transparent">
                            <h3 class="text-2xl md:text-4xl font-bold mb-3">Naked-Eye 3D Displays</h3>
                            <p class="text-base leading-relaxed">Displays that break the frame and bend reality,
                                creating striking 3D visuals without glasses in high-traffic urban and event
                                environments.</p>
                        </div>
                    </div>
                </div>

                <div class="relative sm:px-5 lg:px-0">
                    <div class="swiper servicesSwiper h-[460px] md:h-[620px] lg:h-full">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img class="w-full h-full object-cover"
                                    src="http://localhost/showtime/wp-content/uploads/2026/02/banner1.webp"
                                    alt="Experiential display service 1">
                            </div>
                            <div class="swiper-slide">
                                <img class="w-full h-full object-cover"
                                    src="http://localhost/showtime/wp-content/uploads/2026/02/banner2-scaled.webp"
                                    alt="Experiential display service 2">
                            </div>
                            <div class="swiper-slide">
                                <img class="w-full h-full object-cover"
                                    src="http://localhost/showtime/wp-content/uploads/2026/02/banner3.webp"
                                    alt="Experiential display service 3">
                            </div>
                        </div>
                        <div class="swiper-pagination services-swiper-pagination !bottom-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <?php include 'templates/testimonial.php' ?>

    <!-- FAQ Accordion -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-3 sm:px-5 lg:px-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-10 items-start">
                <div>
                    <h2 class="text-4xl font-bold leading-tight text-[#111] mb-8">
                        Everything you need to know about <span class="text-primary">our experiential advertising
                            solutions and process.</span>
                    </h2>
                    <div class="grid grid-cols-3 gap-4">
                        <img class="w-full h-[230px] object-cover"
                            src="http://localhost/showtime/wp-content/uploads/2026/02/about-banner-1.jpg"
                            alt="Experiential display 1">
                        <img class="w-full h-[230px] object-cover"
                            src="http://localhost/showtime/wp-content/uploads/2026/02/about-banner-2.jpg"
                            alt="Experiential display 2">
                        <img class="w-full h-[230px] object-cover"
                            src="http://localhost/showtime/wp-content/uploads/2026/02/about-banner-3.jpg"
                            alt="Experiential display 3">
                    </div>
                </div>

                <div class="grid gap-3" id="faq-accordion">
                    <div class="rounded-lg bg-[#F8F8F8] p-4" data-faq-item>
                        <button type="button"
                            class="w-full flex items-center justify-between gap-3 text-left text-lg font-semibold text-[#121212]"
                            data-faq-trigger>
                            <span>What is experiential advertising?</span>
                            <span
                                class="w-7 h-7 rounded-md text-sm bg-primary text-white inline-flex items-center justify-center transition-transform rotate-90"
                                data-faq-icon aria-hidden="true">
                                <i class="fa-solid fa-chevron-right" data-faq-icon aria-hidden="true"></i>
                            </span>
                        </button>
                        <div class="pt-3" data-faq-content>
                            <p class="m-0 text-[#575757] text-base leading-relaxed">Experiential advertising turns brand
                                messages into immersive experiences people can see, feel, and engage with in real life,
                                not just on a screen.</p>
                        </div>
                    </div>

                    <div class="rounded-lg bg-[#F8F8F8] p-4" data-faq-item>
                        <button type="button"
                            class="w-full flex items-center justify-between gap-3 text-left text-lg font-semibold text-[#121212]"
                            data-faq-trigger>
                            <span>What experiences does It’s Show Time create?</span>
                            <span
                                class="w-7 h-7 rounded-md text-sm bg-primary text-white inline-flex items-center justify-center transition-transform"
                                data-faq-icon aria-hidden="true">
                                <i class="fa-solid fa-chevron-right" data-faq-icon aria-hidden="true"></i>
                            </span>
                        </button>
                        <div class="hidden pt-3" data-faq-content>
                            <p class="m-0 text-[#575757] text-base leading-relaxed">We create high-impact solutions
                                including interactive displays, video walls, 3D visual installations, and event-led
                                branded environments.</p>
                        </div>
                    </div>

                    <div class="rounded-lg bg-[#F8F8F8] p-4" data-faq-item>
                        <button type="button"
                            class="w-full flex items-center justify-between gap-3 text-left text-lg font-semibold text-[#121212]"
                            data-faq-trigger>
                            <span>Who is experiential advertising for?</span>
                            <span
                                class="w-7 h-7 rounded-md text-sm bg-primary text-white inline-flex items-center justify-center transition-transform"
                                data-faq-icon aria-hidden="true">
                                <i class="fa-solid fa-chevron-right" data-faq-icon aria-hidden="true"></i>
                            </span>
                        </button>
                        <div class="hidden pt-3" data-faq-content>
                            <p class="m-0 text-[#575757] text-base leading-relaxed">It is ideal for brands that want
                                stronger audience engagement across retail, events, launches, transport hubs, and
                                high-footfall city spaces.</p>
                        </div>
                    </div>

                    <div class="rounded-lg bg-[#F8F8F8] p-4" data-faq-item>
                        <button type="button"
                            class="w-full flex items-center justify-between gap-3 text-left text-lg font-semibold text-[#121212]"
                            data-faq-trigger>
                            <span>What is the typical project timeline?</span>
                            <span
                                class="w-7 h-7 rounded-md text-sm bg-primary text-white inline-flex items-center justify-center transition-transform"
                                data-faq-icon aria-hidden="true">
                                <i class="fa-solid fa-chevron-right" data-faq-icon aria-hidden="true"></i>
                            </span>
                        </button>
                        <div class="hidden pt-3" data-faq-content>
                            <p class="m-0 text-[#575757] text-base leading-relaxed">Depending on scope, projects
                                typically run between 2 to 8 weeks from concept and design through production,
                                installation, and quality testing.</p>
                        </div>
                    </div>

                    <div class="rounded-lg bg-[#F8F8F8] p-4" data-faq-item>
                        <button type="button"
                            class="w-full flex items-center justify-between gap-3 text-left text-lg font-semibold text-[#121212]"
                            data-faq-trigger>
                            <span>Do you handle both creative and execution?</span>
                            <span
                                class="w-7 h-7 rounded-md text-sm bg-primary text-white inline-flex items-center justify-center transition-transform"
                                data-faq-icon aria-hidden="true">
                                <i class="fa-solid fa-chevron-right" data-faq-icon aria-hidden="true"></i>
                            </span>
                        </button>
                        <div class="hidden pt-3" data-faq-content>
                            <p class="m-0 text-[#575757] text-base leading-relaxed">Yes. We manage end-to-end delivery
                                including strategy, creative, technical planning, production, on-site execution, and
                                post-campaign support.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>