<?php
/*
Template Name: About Us
Template Post Type: page
*/

get_header();

$hero_image = home_url('/wp-content/uploads/2026/02/banner2-scaled.webp');
$direction_image = home_url('/wp-content/uploads/2026/02/banner3.webp');
$avatar_image = home_url('/wp-content/uploads/2026/02/about-banner-1.jpg');
?>

<main class="about-page bg-white text-[#151515]">
    <section class="pt-40 pb-16">
        <div class="container mx-auto px-4 lg:px-10 grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            <div>
                <p class="text-sm font-medium mb-6"><span class="text-[#F59E0B] tracking-wide">★★★★★</span> <span
                        class="ml-2 text-[#3f3f3f]">4.9/5 Reviews</span></p>
                <h1 class="text-3xl sm:text-4xl md:text-5xl leading-tight font-semibold mb-5">
                    Built to Be Seen.
                    <span class="text-primary">Designed to Be Remembered</span>
                </h1>
                <p class="text-[#4a4a4a] text-lg max-w-xl mb-8">
                    Built To Be Seen. Designed To Be Remembered reflects our focus on creating immersive, visually
                    impactful experiences that leave a lasting impression.
                </p>
                <a href="#"
                    class="inline-flex items-center  justify-between gap-2 rounded-lg bg-primary text-white px-2 py-2 font-medium hover:bg-red-700 transition-colors">
                    Contact Us <span
                        class="inline-flex justify-center items-center p-1 bg-white rounded text-primary text-xs"><i
                            class="fas fa-arrow-right"></i></span>
                </a>
            </div>

            <div>
                <img src="<?php echo esc_url($hero_image); ?>" alt="Immersive showroom"
                    class="w-full h-[340px] md:h-[520px] object-cover">
            </div>
        </div>
    </section>

    <section class="bg-primary text-white py-14">
        <div class="container mx-auto px-4 lg:px-10 text-center">
            <h2 class="text-4xl md:text-5xl font-semibold mb-6">It's Show Time</h2>
            <p class="max-w-4xl mx-auto text-lg leading-relaxed">
                We are a young and passionate experiential advertising team focused on creating immersive brand
                experiences. We combine creativity, technology, and execution to help brands connect with audiences in
                meaningful, real-world ways.
            </p>
        </div>
    </section>

    <section class="py-16 overflow-hidden">
        <div class="container mx-auto px-4 lg:px-10">
            <h2 class="text-primary text-5xl font-semibold text-center mb-10">Our Direction</h2>

            <img src="<?php echo esc_url($direction_image); ?>" alt="Our direction"
                class="w-full h-[260px] md:h-[420px] object-cover mb-10">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <article>
                    <h3 class="text-primary text-3xl font-semibold mb-4">MISSION</h3>
                    <p class="text-[#434343] text-lg leading-relaxed">
                        Our mission is to transform advertising into real-world experiences that people can see, feel,
                        and remember. Through immersive design and thoughtful execution, we help brands create
                        meaningful connections that leave a lasting impact.
                    </p>
                </article>
                <article>
                    <h3 class="text-primary text-3xl font-semibold mb-4">VISION</h3>
                    <p class="text-[#434343] text-lg leading-relaxed">
                        Our vision is to create a world where advertising becomes an experience rather than just
                        something people watch. We believe in meaningful, immersive interactions that connect brands
                        with audiences in real, memorable ways.
                    </p>
                </article>
            </div>
        </div>
    </section>

    <section class="py-16 journey-section">
        <div class="container mx-auto px-4 lg:px-10">
            <h2 class="text-primary text-5xl font-semibold text-center mb-5">Journey of It's Show Time</h2>
            <p class="text-center max-w-3xl mx-auto mb-16">
                It's Show Time was born from a simple but powerful belief: advertising should not add to the noise in
                a world already crowded with visuals.
            </p>

            <div class="relative timeline-container max-w-6xl mx-auto">
                <!-- Top Row (Content for 1, 3, 5) -->
                <div class="hidden md:grid grid-cols-3 gap-6 mb-8 items-end min-h-[140px]">
                    <article class="px-5">
                        <h3 class="text-xl font-semibold mb-2">The Beginning</h3>
                        <p class="text-sm leading-snug">It started with a simple idea to create
                            meaningful visual experiences.</p>
                    </article>
                    <article class="px-5">
                        <h3 class="text-xl font-semibold mb-2">Expanding Beyond Borders</h3>
                        <p class="text-sm leading-snug">We expanded from local work to larger campaigns
                            across more cities.</p>
                    </article>
                    <article class="px-5">
                        <h3 class="text-xl font-semibold mb-2">Entering the World of Multi-Sensory Experiences</h3>
                        <p class="text-sm leading-snug">We moved beyond visuals and started building full
                            sensory brand moments.</p>
                    </article>
                </div>

                <div class="hidden md:grid grid-cols-5 py-6">
                    <div
                        class="w-50 h-50 xl:w-60 xl:h-60 relative mx-auto border border-[30px] border-[#F5F5F5] border-l-primary border-t-primary rotate-45 rounded-full flex flex-col items-center justify-center">
                        <div class="h-10 w-0.5 -translate-x-[1px] bg-primary left-0 -top-5 absolute inline-block -rotate-45"></div>
                        <div class="-rotate-45">
                            <p class="font-medium text-xl lg:text-2xl text-primary">January</p>
                            <p class="font-semibold text-2xl lg:text-3xl">2024</p>
                        </div>
                    </div>
                    <div
                        class="w-50 h-50 xl:w-60 xl:h-60 relative mx-auto border border-[30px] border-[#F5F5F5] border-l-primary border-t-primary -rotate-[135deg] rounded-full flex flex-col items-center justify-center">
                        <div class="h-10 w-0.5 -translate-x-[1px] bg-primary left-0 -top-5 absolute inline-block rotate-[135deg]"></div>
                        <div class="rotate-[135deg]">
                            <p class="font-medium text-xl lg:text-2xl text-primary">April</p>
                            <p class="font-semibold text-2xl lg:text-3xl">2024</p>
                        </div>
                    </div>
                    <div
                        class="w-50 h-50 xl:w-60 xl:h-60 relative mx-auto border border-[30px] border-[#F5F5F5] border-l-primary border-t-primary rotate-45 rounded-full flex flex-col items-center justify-center">
                        <div class="h-10 w-0.5 -translate-x-[1px] bg-primary left-0 -top-5 absolute inline-block -rotate-45"></div>
                        <div class="-rotate-45">
                            <p class="font-medium text-xl lg:text-2xl text-primary">October</p>
                            <p class="font-semibold text-2xl lg:text-3xl">2024</p>
                        </div>
                    </div>
                    <div
                        class="w-50 h-50 xl:w-60 xl:h-60 relative mx-auto border border-[30px] border-[#F5F5F5] border-l-primary border-t-primary -rotate-[135deg] rounded-full flex flex-col items-center justify-center">
                        <div class="h-10 w-0.5 -translate-x-[1px] bg-primary left-0 -top-5 absolute inline-block rotate-[135deg]"></div>
                        <div class="rotate-[135deg]">
                            <p class="font-medium text-xl lg:text-2xl text-primary">March</p>
                            <p class="font-semibold text-2xl lg:text-3xl">2025</p>
                        </div>
                    </div>
                    <div
                        class="w-50 h-50 xl:w-60 xl:h-60 relative mx-auto border border-[30px] border-[#F5F5F5] border-l-primary border-t-primary rotate-45 rounded-full flex flex-col items-center justify-center">
                        <div class="h-10 w-0.5 -translate-x-[1px] bg-primary left-0 -top-5 absolute inline-block -rotate-45"></div>
                        <div class="-rotate-45">
                            <p class="font-medium text-xl lg:text-2xl text-primary">November</p>
                            <p class="font-semibold text-2xl lg:text-3xl">2025</p>
                        </div>
                    </div>
                </div>

                <!-- Bottom Row (Content for 2, 4) -->
                <div class="hidden md:grid grid-cols-[50px_1fr_50px_1fr_50px] gap-6 mt-8 items-start min-h-[140px]">
                    <div></div> <!-- Empty for top item alignment -->
                    <article class="px-2">
                        <h3 class="text-xl font-semibold mb-2">Our First Brand Collaboration</h3>
                        <p class="text-sm leading-snug">Our first major campaign proved how immersive
                            storytelling drives stronger brand recall.</p>
                    </article>
                    <div></div> <!-- Empty for top item alignment -->
                    <article class="px-2">
                        <h3 class="text-xl font-semibold mb-2">Evolving the Experience</h3>
                        <p class="text-sm leading-snug">We refined our production and interaction systems
                            for more impactful audience engagement.</p>
                    </article>
                    <div></div> <!-- Empty for top item alignment -->
                </div>

                <!-- Mobile Only Content (Linear) -->
                <div class="md:hidden mt-10 space-y-10">
                    <article class="border-l-4 border-primary pl-4">
                        <span class="text-primary font-bold text-sm">January 2024</span>
                        <h3 class="text-2xl font-bold mb-2">The Beginning</h3>
                        <p class="text-[#4d4d4d]">It started with a simple idea to create meaningful visual experiences.
                        </p>
                    </article>
                    <article class="border-r-4 text-right border-primary pr-4">
                        <span class="text-primary font-bold text-sm">April 2024</span>
                        <h3 class="text-2xl font-bold mb-2">Our First Brand Collaboration</h3>
                        <p class="text-[#4d4d4d]">Our first major campaign proved how immersive storytelling drives
                            stronger brand recall.</p>
                    </article>
                    <article class="border-l-4 border-primary pl-4">
                        <span class="text-primary font-bold text-sm">October 2024</span>
                        <h3 class="text-2xl font-bold mb-2">Expanding Beyond Borders</h3>
                        <p class="text-[#4d4d4d]">We expanded from local work to larger campaigns across more cities.
                        </p>
                    </article>
                    <article class="border-r-4 text-right border-primary pr-4">
                        <span class="text-primary font-bold text-sm">March 2025</span>
                        <h3 class="text-2xl font-bold mb-2">Evolving the Experience</h3>
                        <p class="text-[#4d4d4d]">We refined our production and interaction systems for more impactful
                            audience engagement.</p>
                    </article>
                    <article class="border-l-4 border-primary pl-4">
                        <span class="text-primary font-bold text-sm">November 2025</span>
                        <h3 class="text-2xl font-bold mb-2">Entering Multi-Sensory Experiences</h3>
                        <p class="text-[#4d4d4d]">We moved beyond visuals and started building full sensory brand
                            moments.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <?php include 'testimonial.php' ?>
</main>

<?php get_footer(); ?>