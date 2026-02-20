<?php
/*
Template Name: Services
Template Post Type: page
*/

get_header();

$hero_main = home_url('/wp-content/uploads/2026/02/banner2-scaled.webp');
$hero_side_top = home_url('/wp-content/uploads/2026/02/banner1.webp');
$hero_side_bottom = home_url('/wp-content/uploads/2026/02/banner3.webp');

$service_1 = home_url('/wp-content/uploads/2026/02/about-banner-1.jpg');
$service_2 = home_url('/wp-content/uploads/2026/02/banner2-scaled.webp');
$service_3 = home_url('/wp-content/uploads/2026/02/about-banner-3.jpg');
?>

<main class="services-page bg-[#f3f3f3] text-[#151515]">
    <section class="pt-40 pb-16">
        <div class="container mx-auto px-4 lg:px-10 grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            <div>
                <h1 class="text-primary text-5xl md:text-6xl font-semibold mb-5">Our Services</h1>
                <p class="text-[#4a4a4a] text-lg max-w-xl mb-7 leading-relaxed">
                    Our services help brands move beyond static advertising to create immersive, attention-grabbing
                    experiences in real-world environments. Using advanced display and sensory technologies, we design
                    and deliver experiences audiences truly engage with.
                </p>
                <a href="#services-list"
                    class="inline-flex items-center rounded-lg bg-primary text-white px-5 py-3 font-medium hover:bg-red-700 transition-colors">
                    View Our Services
                </a>
            </div>

            <div class="grid grid-cols-[2fr_1fr] gap-3">
                <img src="<?php echo esc_url($hero_main); ?>" alt="Service visual"
                    class="w-full h-[360px] md:h-[520px] object-cover">
                <div class="grid grid-rows-2 gap-3">
                    <img src="<?php echo esc_url($hero_side_top); ?>" alt="Service visual"
                        class="w-full h-full min-h-[170px] object-cover">
                    <img src="<?php echo esc_url($hero_side_bottom); ?>" alt="Service visual"
                        class="w-full h-full min-h-[170px] object-cover">
                </div>
            </div>
        </div>
    </section>

    <section id="services-list" class="py-16">
        <div class="container mx-auto px-4 lg:px-10">
            <span class="inline-flex border border-[#c8c8c8] rounded-full px-4 py-2 text-sm mb-6">Our Services</span>
            <h2 class="text-4xl md:text-6xl leading-tight font-semibold mb-12">
                Precision Branding,
                <span class="text-primary">Built for Real-World Use Experience</span>
            </h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center mb-10">
                <img src="<?php echo esc_url($service_1); ?>" alt="Multi sensory advertisements"
                    class="w-full h-[320px] md:h-[420px] object-cover">
                <article>
                    <h3 class="text-primary text-6xl font-semibold mb-4">01</h3>
                    <h4 class="text-3xl font-semibold mb-4">Multi sensory advertisements</h4>
                    <p class="text-[#434343] text-lg leading-relaxed mb-6">
                        Our multi-sensory advertising experiences combine visuals with sound, lighting, motion, and
                        environmental cues to create deeper emotional engagement. By activating more than one sense, we
                        help brands connect with audiences on a level that goes beyond visual impact alone.
                    </p>
                    <a href="#" class="inline-flex rounded-md bg-primary text-white px-4 py-2 text-sm font-medium">Get
                        Quote</a>
                </article>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center mb-10">
                <article class="order-2 lg:order-1">
                    <h3 class="text-primary text-6xl font-semibold mb-4">02</h3>
                    <h4 class="text-3xl font-semibold mb-4">Naked Eye 3D Displays</h4>
                    <p class="text-[#434343] text-lg leading-relaxed mb-6">
                        Our naked-eye 3D displays create striking depth and motion without the need for glasses,
                        producing visuals that appear to break out of the screen. Designed for high-footfall
                        environments, these displays turn brand content into attention-grabbing visual moments people
                        stop for and remember.
                    </p>
                    <a href="#" class="inline-flex rounded-md bg-primary text-white px-4 py-2 text-sm font-medium">Get
                        Quote</a>
                </article>
                <img src="<?php echo esc_url($service_2); ?>" alt="Naked eye 3D display"
                    class="w-full h-[320px] md:h-[420px] object-cover order-1 lg:order-2">
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <img src="<?php echo esc_url($service_3); ?>" alt="Video wall display"
                    class="w-full h-[320px] md:h-[420px] object-cover">
                <article>
                    <h3 class="text-primary text-6xl font-semibold mb-4">03</h3>
                    <h4 class="text-3xl font-semibold mb-4">Video Wall Displays</h4>
                    <p class="text-[#434343] text-lg leading-relaxed mb-6">
                        Our video wall display solutions combine scale, clarity, and motion to build immersive brand
                        storytelling environments. They are ideal for retail spaces, events, and corporate experience
                        zones where consistent visual impact and strong recall matter.
                    </p>
                    <a href="#" class="inline-flex rounded-md bg-primary text-white px-4 py-2 text-sm font-medium">Get
                        Quote</a>
                </article>
            </div>
        </div>
    </section>

    <section class="py-16 overflow-hidden">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="flex items-end justify-between gap-6 mb-6">
                <div>
                    <h2 class="text-4xl md:text-6xl leading-tight font-semibold mb-4">
                        Precision Branding,
                        <span class="text-primary">Built for Real-World Use Experience</span>
                    </h2>
                    <p class="text-[#505050] text-base md:text-lg max-w-4xl">
                        Naked eye advertising refers to outdoor 3D LED displays that create the illusion of
                        three-dimensional visuals for high attention and high recall.
                    </p>
                </div>
                <div class="hidden md:flex items-center gap-2">
                    <button type="button"
                        class="services-gallery-prev w-11 h-11 rounded-lg border border-[#e2b1ab] text-primary text-xl leading-none">
                        &larr;
                    </button>
                    <button type="button"
                        class="services-gallery-next w-11 h-11 rounded-lg border border-[#e2b1ab] text-primary text-xl leading-none">
                        &rarr;
                    </button>
                </div>
            </div>

            <div class="swiper services-gallery-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="services-gallery-card"><img src="<?php echo esc_url($service_1); ?>"
                                alt="Gallery image 1" class="w-full h-full object-cover"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="services-gallery-card"><img src="<?php echo esc_url($service_2); ?>"
                                alt="Gallery image 2" class="w-full h-full object-cover"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="services-gallery-card"><img src="<?php echo esc_url($service_3); ?>"
                                alt="Gallery image 3" class="w-full h-full object-cover"></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="services-gallery-card"><img src="<?php echo esc_url($hero_side_bottom); ?>"
                                alt="Gallery image 4" class="w-full h-full object-cover"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-4 lg:px-10 grid grid-cols-1 lg:grid-cols-[1fr_2fr] gap-10">
            <div>
                <h3 class="text-primary text-5xl font-semibold mb-3">Let's Talk</h3>
                <p class="text-[#4f4f4f] max-w-sm">Drop your details and project brief. We'll help evaluate the right
                    technical direction and execution plan.</p>
            </div>

            <div>
                <h4 class="text-3xl font-semibold mb-5">How can we help you?</h4>
                
                <form class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" placeholder="First Name"
                        class="h-12 rounded border border-[#d8d8d8] px-4 bg-white focus:outline-none focus:border-primary">
                    <input type="text" placeholder="Last Name"
                        class="h-12 rounded border border-[#d8d8d8] px-4 bg-white focus:outline-none focus:border-primary">
                    <input type="email" placeholder="Email"
                        class="h-12 rounded border border-[#d8d8d8] px-4 bg-white focus:outline-none focus:border-primary">
                    <input type="tel" placeholder="Mobile Number"
                        class="h-12 rounded border border-[#d8d8d8] px-4 bg-white focus:outline-none focus:border-primary">
                    <textarea rows="5" placeholder="Message"
                        class="md:col-span-2 rounded border border-[#d8d8d8] p-4 bg-white focus:outline-none focus:border-primary"></textarea>
                    <button type="submit"
                        class="md:col-span-2 h-12 rounded-lg bg-primary text-white font-medium hover:bg-red-700 transition-colors">
                        Contact Us For Experience Branding
                    </button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>