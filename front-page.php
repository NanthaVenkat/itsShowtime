<?php get_header(); ?>

<main class="w-full relative">
    <!-- Hero Slider Section -->
    <section class="relative h-screen w-full overflow-hidden">
        <div class="swiper mySwiper w-full h-full">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide relative hero-slide">
                    <!-- Background Image -->
                    <div class="bg-cover bg-center h-full relative flex items-end justify-start hero-slide__bg"
                        style="background-image: url('http://localhost/showtime/wp-content/uploads/2026/02/banner2-scaled.webp');">

                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-linear-to-t from-black via-black/50 to-transparent hero-slide__overlay"></div>

                        <!-- Content -->
                        <div class="relative max-w-3xl z-10 container px-6 py-8 hero-slide__content">
                            <h1
                                class="text-3xl md:text-5xl font-bold text-white leading-tight mb-6 max-w-4xl" data-hero-el>
                                Immersive Display Experiences That Transform Brands Into Moments
                            </h1>
                            <p class="text-gray-300 text-lg md:text-xl max-w-2xl mb-8" data-hero-el>
                                Using advanced display technology, we help brands create immersive moments that capture
                                attention, spark emotion, and stay memorable.
                            </p>
                            <div data-hero-el>
                                <a href="#"
                                    class="inline-block rounded-lg bg-white border border-primary text-primary hover:text-white hover:bg-primary p-3 mr-4 font-medium transition-all">Explore
                                    Services</a>
                                <a href="#"
                                    class="inline-block rounded-lg bg-primary text-white border-primary hover:bg-white hover:text-primary p-3 font-medium transition-all">Contact
                                    Us</a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide relative hero-slide">
                    <!-- Background Image -->
                    <div class="bg-cover bg-center h-full relative flex items-end justify-start hero-slide__bg"
                        style="background-image: url('http://localhost/showtime/wp-content/uploads/2026/02/banner1.webp');">

                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-linear-to-t from-black via-black/50 to-transparent hero-slide__overlay"></div>

                        <!-- Content -->
                        <div class="relative max-w-3xl z-10 container px-6 py-8 hero-slide__content">
                            <h1
                                class="text-3xl md:text-5xl font-bold text-white leading-tight mb-6 max-w-4xl" data-hero-el>
                                Immersive Display Experiences That Transform Brands Into Moments
                            </h1>
                            <p class="text-gray-300 text-lg md:text-xl max-w-2xl mb-8" data-hero-el>
                                Using advanced display technology, we help brands create immersive moments that capture
                                attention, spark emotion, and stay memorable.
                            </p>
                            <div data-hero-el>
                                <a href="#"
                                    class="inline-block rounded-lg bg-white border border-primary text-primary hover:text-white hover:bg-primary p-3 mr-4 font-medium transition-all">Explore
                                    Services</a>
                                <a href="#"
                                    class="inline-block rounded-lg bg-primary text-white border-primary hover:bg-white hover:text-primary p-3 font-medium transition-all">Contact
                                    Us</a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide relative hero-slide">
                    <div class="bg-cover bg-center h-full relative flex items-end justify-start hero-slide__bg"
                        style="background-image: url('http://localhost/showtime/wp-content/uploads/2026/02/banner3.webp');">

                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-linear-to-t from-black via-black/50 to-transparent hero-slide__overlay"></div>

                        <!-- Content -->
                        <div class="relative max-w-3xl z-10 container px-6 py-8 hero-slide__content">
                            <span
                                class="inline-block bg-primary text-white text-md px-3.5 py-1 rounded-lg mb-2.5" data-hero-el>Trending</span>
                            <h1
                                class="text-3xl md:text-5xl font-bold text-white leading-tight mb-6 max-w-4xl" data-hero-el>
                                Precision Branding, Built for Real-World Use Experience
                            </h1>
                            <p class="text-gray-300 text-lg md:text-xl max-w-2xl mb-8" data-hero-el>
                                Naked eye advertising refers to outdoor 3D LED displays that create the illusion of
                                three-dimensional Naked eye advertising refers to outdoor 3D LED displays that create
                                the
                                illusion of three-dimensional
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

</main>

<?php get_footer(); ?>
