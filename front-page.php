<?php get_header(); ?>

<main class="w-full relative">
    <!-- Hero Slider Section -->
    <section class="relative h-screen w-full overflow-hidden">
        <div class="swiper mySwiper w-full h-full">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide relative">
                    <!-- Background Image -->
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=2070&auto=format&fit=crop');"></div>
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-linear-to-t from-black via-black/50 to-transparent"></div>

                    <!-- Content -->
                    <div class="relative z-10 container mx-auto px-6 h-full flex flex-col justify-center items-start lg:pl-12">
                        <span class="bg-red-600 text-white text-xs font-bold px-3 py-1 rounded uppercase tracking-wider mb-4 animate-fade-in-up">Trending</span>
                        <h1 class="text-5xl md:text-7xl font-bold text-white leading-tight mb-6 max-w-4xl animate-fade-in-up delay-100">
                            Precision Branding, <br /> Built for Real-World <br /> Use Experience
                        </h1>
                        <p class="text-gray-300 text-lg md:text-xl max-w-2xl mb-8 animate-fade-in-up delay-200">
                            Naked Eye Advertising Refers To Outdoor 3D LED Displays That Create The Illusion Of Three-Dimensional Depth without glasses.
                        </p>
                        <div class="flex gap-4 animate-fade-in-up delay-300">
                            <a href="#" class="bg-white text-black px-8 py-3 rounded-full font-bold uppercase tracking-wider hover:bg-gray-200 transition-colors">Explore Services</a>
                            <a href="#" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-bold uppercase tracking-wider hover:bg-white hover:text-black transition-colors">Contact Us</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide relative">
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1514525253440-b393452e8d03?q=80&w=2070&auto=format&fit=crop');"></div>
                    <div class="absolute inset-0 bg-linear-to-t from-black via-black/50 to-transparent"></div>

                    <div class="relative z-10 container mx-auto px-6 h-full flex flex-col justify-center items-start lg:pl-12">
                        <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded uppercase tracking-wider mb-4">Innovation</span>
                        <h1 class="text-5xl md:text-7xl font-bold text-white leading-tight mb-6 max-w-4xl">
                            Immersive Display <br /> Experiences That <br /> Transform Brands
                        </h1>
                        <p class="text-gray-300 text-lg md:text-xl max-w-2xl mb-8">
                            Using Advanced Display Technology, We Help Brands Create Immersive Moments That Capture Attention and Spark Emotion.
                        </p>
                        <div class="flex gap-4">
                            <a href="#" class="bg-blue-600 text-white px-8 py-3 rounded-full font-bold uppercase tracking-wider hover:bg-blue-700 transition-colors">View Gallery</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide relative">
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=2070&auto=format&fit=crop');"></div>
                    <div class="absolute inset-0 bg-linear-to-t from-black via-black/50 to-transparent"></div>

                    <div class="relative z-10 container mx-auto px-6 h-full flex flex-col justify-center items-start lg:pl-12">
                        <span class="bg-purple-600 text-white text-xs font-bold px-3 py-1 rounded uppercase tracking-wider mb-4">Future Tech</span>
                        <h1 class="text-5xl md:text-7xl font-bold text-white leading-tight mb-6 max-w-4xl">
                            Digital Art <br /> Meets Commercial <br /> Excellence
                        </h1>
                        <p class="text-gray-300 text-lg md:text-xl max-w-2xl mb-8">
                            Step into the future of advertising with our cutting-edge 3D solutions.
                        </p>
                        <div class="flex gap-4">
                            <a href="#" class="bg-purple-600 text-white px-8 py-3 rounded-full font-bold uppercase tracking-wider hover:bg-purple-700 transition-colors">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Swiper Pagination -->
            <div class="swiper-pagination"></div>

            <!-- Swiper Navigation -->
            <!-- <div class="swiper-button-next text-white"></div> -->
            <!-- <div class="swiper-button-prev text-white"></div> -->
        </div>
    </section>

    <!-- Content Section (Below Fold) -->
    <section class="bg-black text-white py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold mb-8 text-center">Our Latest Projects</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Placeholders -->
                <div class="bg-gray-900 h-64 rounded-lg"></div>
                <div class="bg-gray-900 h-64 rounded-lg"></div>
                <div class="bg-gray-900 h-64 rounded-lg"></div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>