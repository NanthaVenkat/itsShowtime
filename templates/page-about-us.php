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

<main class="about-page bg-[#f3f3f3] text-[#151515]">
    <section class="pt-40 pb-16">
        <div class="container mx-auto px-4 lg:px-10 grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            <div>
                <p class="text-sm font-medium mb-6"><span class="text-[#F59E0B] tracking-wide">★★★★★</span> <span
                        class="ml-2 text-[#3f3f3f]">4.9/5 Reviews</span></p>
                <h1 class="text-4xl md:text-6xl leading-tight font-semibold mb-5">
                    Built to Be Seen.
                    <span class="text-primary">Designed to Be Remembered</span>
                </h1>
                <p class="text-[#4a4a4a] text-lg max-w-xl mb-8">
                    Built To Be Seen. Designed To Be Remembered reflects our focus on creating immersive, visually
                    impactful experiences that leave a lasting impression.
                </p>
                <a href="#"
                    class="inline-flex items-center rounded-lg bg-primary text-white px-5 py-3 font-medium hover:bg-red-700 transition-colors">
                    Contact Us
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

    <section class="py-16">
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

    <section class="py-16">
        <div class="container mx-auto px-4 lg:px-10">
            <h2 class="text-primary text-5xl font-semibold text-center mb-5">Journey of It's Show Time</h2>
            <p class="text-center text-[#4b4b4b] max-w-3xl mx-auto mb-12">
                It's Show Time was born from a simple but powerful belief: advertising should not add to the noise in
                a world already crowded with visuals.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
                <article>
                    <h3 class="text-3xl font-semibold mb-3">The Beginning</h3>
                    <p class="text-[#4d4d4d]">It started with a simple idea to create meaningful visual experiences.
                    </p>
                </article>
                <article>
                    <h3 class="text-3xl font-semibold mb-3">Expanding Beyond Borders</h3>
                    <p class="text-[#4d4d4d]">We expanded from local work to larger campaigns across more cities.</p>
                </article>
                <article>
                    <h3 class="text-3xl font-semibold mb-3">Entering Multi-Sensory Experiences</h3>
                    <p class="text-[#4d4d4d]">We moved beyond visuals and started building full sensory brand moments.
                    </p>
                </article>
            </div>

            <div class="about-timeline">
                <div class="about-timeline__track">
                    <div class="about-timeline__item">
                        <div class="about-timeline__dot">
                            <span class="about-timeline__month">January</span>
                            <span class="about-timeline__year">2024</span>
                        </div>
                    </div>
                    <div class="about-timeline__item">
                        <div class="about-timeline__dot">
                            <span class="about-timeline__month">April</span>
                            <span class="about-timeline__year">2024</span>
                        </div>
                    </div>
                    <div class="about-timeline__item">
                        <div class="about-timeline__dot">
                            <span class="about-timeline__month">October</span>
                            <span class="about-timeline__year">2024</span>
                        </div>
                    </div>
                    <div class="about-timeline__item">
                        <div class="about-timeline__dot">
                            <span class="about-timeline__month">March</span>
                            <span class="about-timeline__year">2025</span>
                        </div>
                    </div>
                    <div class="about-timeline__item">
                        <div class="about-timeline__dot">
                            <span class="about-timeline__month">November</span>
                            <span class="about-timeline__year">2025</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10 max-w-4xl mx-auto">
                <article>
                    <h3 class="text-4xl font-semibold mb-3">Our First Brand Collaboration</h3>
                    <p class="text-[#4d4d4d]">Our first major campaign proved how immersive storytelling drives stronger
                        brand recall.</p>
                </article>
                <article>
                    <h3 class="text-4xl font-semibold mb-3">Evolving the Experience</h3>
                    <p class="text-[#4d4d4d]">We refined our production and interaction systems for more impactful
                        audience engagement.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="py-16 bg-[#ececec]">
        <div class="container mx-auto px-4 lg:px-10">
            <h2 class="text-5xl md:text-6xl leading-tight font-semibold mb-10">
                Don't take our word for it!
                <span class="block text-primary">Hear it from our clients</span>
            </h2>

            <div class="swiper testimonialSwiper !pb-2.5">
                <div class="swiper-wrapper">
                    <div class="swiper-slide bg-white shadow-sm rounded-2xl border border-[#df5d5d]">
                        <article class="p-5 h-full flex flex-col">
                            <p class="text-base leading-relaxed mb-6">Partnering with It's Show Time helped us amplify
                                our brand presence through high-impact visual storytelling.</p>
                            <div class="flex items-center gap-3 mt-auto pt-4 border-t border-[#ececec]">
                                <img class="w-12 h-12 rounded-full object-cover" src="<?php echo esc_url($avatar_image); ?>"
                                    alt="Client avatar">
                                <div>
                                    <h4 class="text-sm font-bold uppercase">Vijaykumar</h4>
                                    <p class="text-xs text-[#555]">Founder of Abc Technologies</p>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="swiper-slide bg-white shadow-sm rounded-2xl border border-[#ececec]">
                        <article class="p-5 h-full flex flex-col">
                            <p class="text-base leading-relaxed mb-6">As a solutions company, precision matters.
                                It's Show Time delivered immersive displays with clarity and sophistication.</p>
                            <div class="flex items-center gap-3 mt-auto pt-4 border-t border-[#ececec]">
                                <img class="w-12 h-12 rounded-full object-cover" src="<?php echo esc_url($avatar_image); ?>"
                                    alt="Client avatar">
                                <div>
                                    <h4 class="text-sm font-bold uppercase">Vijaykumar</h4>
                                    <p class="text-xs text-[#555]">Founder of Abc Technologies</p>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="swiper-slide bg-white shadow-sm rounded-2xl border border-[#ececec]">
                        <article class="p-5 h-full flex flex-col">
                            <p class="text-base leading-relaxed mb-6">Their team brought our collections to life with
                                dynamic experiences that connected instantly with our audience.</p>
                            <div class="flex items-center gap-3 mt-auto pt-4 border-t border-[#ececec]">
                                <img class="w-12 h-12 rounded-full object-cover" src="<?php echo esc_url($avatar_image); ?>"
                                    alt="Client avatar">
                                <div>
                                    <h4 class="text-sm font-bold uppercase">Vijaykumar</h4>
                                    <p class="text-xs text-[#555]">Founder of Abc Technologies</p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="swiper-pagination testimonial-pagination !static !mt-6"></div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
