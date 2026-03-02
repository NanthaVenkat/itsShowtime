<?php
/*
Template Name: Solution
Template Post Type: page
*/

get_header();

// Hero Section
$hero_main = get_field('hero_main_image') ?: home_url('/wp-content/uploads/2026/02/banner2-scaled.webp');
$hero_side_top = get_field('hero_side_top_image') ?: home_url('/wp-content/uploads/2026/02/banner1.webp');
$hero_side_bottom = get_field('hero_side_bottom_image') ?: home_url('/wp-content/uploads/2026/02/banner3.webp');

$hero_heading = get_field('hero_heading') ?: 'Our Services';
$hero_description = get_field('hero_description') ?: '';
$hero_btn_text = get_field('hero_button_text') ?: 'View Our Services';
$hero_btn_link = get_field('hero_button_link') ?: '#services-list';

// Services Section
$services_heading = get_field('services_section_heading') ?: 'Precision Branding, <span class="text-primary">Built for Real-World Use Experience</span>';
$services = get_field('services');

// Gallery Section
$gallery_heading = get_field('gallery_heading') ?: 'Precision Branding, <span class="text-primary">Built for Real-World Use Experience</span>';
$gallery_description = get_field('gallery_description') ?: '';
$gallery_images = get_field('gallery_images');
?>

<style>
    @media screen and (min-width: 1024px) {
        header:not(.bg-black\/90) .nks-nav__list li:not(.current-menu-item) a {
            color: #202020;
        }
    }
</style>

<main class="services-page bg-[#f3f3f3] text-[#151515]">

    <!-- Hero Section -->
    <section class="pt-40 pb-16">
        <div class="container mx-auto px-4 lg:px-10 grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            <div>
                <h1 class="text-primary text-5xl md:text-6xl font-semibold mb-5">
                    <?php echo esc_html($hero_heading); ?>
                </h1>
                <?php if ($hero_description): ?>
                    <p class="text-[#565656] text-lg max-w-xl mb-7 leading-relaxed">
                        <?php echo esc_html($hero_description); ?>
                    </p>
                <?php endif; ?>
                <a href="<?php echo esc_url($hero_btn_link); ?>"
                    class="inline-flex items-center rounded-lg bg-primary text-white px-5 py-3 font-medium hover:bg-red-700 transition-colors">
                    <?php echo esc_html($hero_btn_text); ?>
                </a>
            </div>

            <div class="grid grid-cols-[2fr_1fr] gap-3" data-services-hero>
                <img src="<?php echo esc_url($hero_main); ?>" alt="Service visual"
                    class="w-full h-[360px] md:h-[520px] object-cover" data-services-hero-image>
                <div class="grid grid-rows-2 gap-3">
                    <img src="<?php echo esc_url($hero_side_top); ?>" alt="Service visual"
                        class="w-full h-full min-h-[170px] object-cover" data-services-hero-image>
                    <img src="<?php echo esc_url($hero_side_bottom); ?>" alt="Service visual"
                        class="w-full h-full min-h-[170px] object-cover" data-services-hero-image>
                </div>
            </div>
        </div>
    </section>

    <!-- Services List Section -->
    <section id="services-list" class="py-16">
        <div class="container mx-auto px-4 lg:px-10">
            <span class="inline-flex border border-[#c8c8c8] rounded-full px-4 py-2 text-sm mb-6">Our Services</span>
            <h2 class="text-3xl md:text-4xl leading-tight font-semibold mb-12 max-w-5xl">
                <?php echo wp_kses_post($services_heading); ?>
            </h2>

            <?php if ($services): ?>
                <?php foreach ($services as $index => $service):
                    $number = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                    $image = $service['service_image'] ?? '';
                    $title = $service['service_title'] ?? '';
                    $description = $service['service_description'] ?? '';
                    $btn_text = $service['service_button_text'] ?: 'Get Quote';
                    $btn_link = $service['service_button_link'] ?: '#';
                    $is_even = ($index + 1) % 2 === 0;
                    ?>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center mb-10">
                        <?php if ($image): ?>
                            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>"
                                class="w-full h-[320px] md:h-[420px] object-cover <?php echo $is_even ? 'order-1 lg:order-2' : ''; ?>">
                        <?php endif; ?>
                        <article class="<?php echo $is_even ? 'order-2 lg:order-1' : ''; ?>">
                            <h3 class="text-primary text-6xl font-semibold mb-4"><?php echo esc_html($number); ?></h3>
                            <h4 class="text-2xl font-semibold mb-4 text-[#252525]"><?php echo esc_html($title); ?></h4>
                            <?php if ($description): ?>
                                <p class="text-[#565656] text-lg leading-relaxed mb-6">
                                    <?php echo esc_html($description); ?>
                                </p>
                            <?php endif; ?>
                            <a href="<?php echo esc_url($btn_link); ?>"
                                class="inline-flex rounded-md bg-primary text-white px-4 py-2 text-sm font-medium">
                                <?php echo esc_html($btn_text); ?>
                            </a>
                        </article>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-16 overflow-hidden">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="flex items-end justify-between gap-6 mb-6">
                <div class="max-w-3xl">
                    <h2 class="text-3xl md:text-4xl leading-tight font-semibold mb-4">
                        <?php echo wp_kses_post($gallery_heading); ?>
                    </h2>
                    <?php if ($gallery_description): ?>
                        <p class="text-[#505050] text-base md:text-lg max-w-4xl">
                            <?php echo esc_html($gallery_description); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="hidden md:flex items-center gap-2">
                    <button type="button"
                        class="services-gallery-prev w-11 h-11 rounded-lg border border-[#C5C5C5] text-primary text-xl leading-none">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <button type="button"
                        class="services-gallery-next w-11 h-11 rounded-lg border border-[#C5C5C5] text-primary text-xl leading-none">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <?php if ($gallery_images): ?>
                <div class="swiper services-gallery-swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($gallery_images as $i => $item):
                            $img_url = $item['gallery_image'] ?? '';
                            $img_alt = $item['gallery_image_alt'] ?? ('Gallery image ' . ($i + 1));
                            ?>
                            <div class="swiper-slide">
                                <div class="services-gallery-card">
                                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>"
                                        class="w-full h-full object-cover">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>