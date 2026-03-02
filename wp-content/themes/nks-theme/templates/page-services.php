<?php
/*
Template Name: services
Template Post Type: page
*/

get_header();

// Hero Section Fields
$hero_title = get_field('hero_title') ?: 'Our Services';
$hero_desc  = get_field('hero_description');
$hero_main  = get_field('hero_main_image') ?: home_url('/wp-content/uploads/2026/02/banner2-scaled.webp');
$hero_side_top = get_field('hero_side_top') ?: home_url('/wp-content/uploads/2026/02/banner1.webp');
$hero_side_bottom = get_field('hero_side_bottom') ?: home_url('/wp-content/uploads/2026/02/banner3.webp');

// Section Titles
$service_sec_title = get_field('service_section_title') ?: 'Precision Branding, <span class="text-primary">Built for Real-World Use Experience</span>';
$slider_sec_title  = get_field('slider_section_title') ?: 'Precision Branding, <span class="text-primary">Built for Real-World Use Experience</span>';
?>

<style>
    header:not(.bg-black\/90) .nks-nav__list li:not(.current-menu-item) a {
        color: #202020;
    }
</style>

<main class="services-page bg-[#f3f3f3] text-[#151515]">
    <section class="pt-40 pb-16">
        <div class="container mx-auto px-4 lg:px-10 grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            <div>
                <h1 class="text-primary text-5xl md:text-6xl font-semibold mb-5"><?php echo esc_html($hero_title); ?></h1>
                <?php if($hero_desc): ?>
                    <p class="text-[#565656] text-lg max-w-xl mb-7 leading-relaxed"><?php echo esc_html($hero_desc); ?></p>
                <?php endif; ?>
                <a href="#services-list" class="inline-flex items-center rounded-lg bg-primary text-white px-5 py-3 font-medium hover:bg-red-700 transition-colors">
                    View Our Services
                </a>
            </div>

            <div class="grid grid-cols-[2fr_1fr] gap-3" data-services-hero>
                <img src="<?php echo esc_url($hero_main); ?>" alt="Main Service Hero" class="w-full h-[360px] md:h-[520px] object-cover" data-services-hero-image>
                <div class="grid grid-rows-2 gap-3">
                    <img src="<?php echo esc_url($hero_side_top); ?>" alt="Service Top" class="w-full h-full min-h-[170px] object-cover" data-services-hero-image>
                    <img src="<?php echo esc_url($hero_side_bottom); ?>" alt="Service Bottom" class="w-full h-full min-h-[170px] object-cover" data-services-hero-image>
                </div>
            </div>
        </div>
    </section>

    <section id="services-list" class="py-16">
        <div class="container mx-auto px-4 lg:px-10">
            <span class="inline-flex border border-[#c8c8c8] rounded-full px-4 py-2 text-sm mb-6">Our Services</span>
            <h2 class="text-4xl md:text-6xl leading-tight font-semibold mb-12 max-w-6xl">
                <?php echo $service_sec_title; ?>
            </h2>

            <?php if( have_rows('services_list') ): $count = 0; ?>
                <?php while( have_rows('services_list') ): the_row(); $count++; 
                    $align = get_sub_field('image_alignment'); // 'left' or 'right'
                    $img_order = ($align === 'right') ? 'lg:order-2' : 'lg:order-1';
                    $txt_order = ($align === 'right') ? 'lg:order-1' : 'lg:order-2';
                ?>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center mb-10">
                        <img src="<?php echo esc_url(get_sub_field('service_image')); ?>" 
                             alt="<?php echo esc_attr(get_sub_field('service_name')); ?>"
                             class="w-full h-[320px] md:h-[420px] object-cover <?php echo $img_order; ?>">
                        <article class="<?php echo $txt_order; ?>">
                            <h3 class="text-primary text-6xl font-semibold mb-4"><?php echo sprintf('%02d', $count); ?></h3>
                            <h4 class="text-2xl font-semibold mb-4 text-[#252525]"><?php the_sub_field('service_name'); ?></h4>
                            <div class="text-[#565656] text-lg leading-relaxed mb-6">
                                <?php the_sub_field('service_description'); ?>
                            </div>
                            <?php if($quote_link = get_sub_field('quote_link')): ?>
                                <a href="<?php echo esc_url($quote_link); ?>" class="inline-flex rounded-md bg-primary text-white px-4 py-2 text-sm font-medium">Get Quote</a>
                            <?php endif; ?>
                        </article>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="py-16 overflow-hidden">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="flex items-end justify-between gap-6 mb-6">
                <div>
                    <h2 class="text-4xl md:text-6xl leading-tight font-semibold mb-4"><?php echo $slider_sec_title; ?></h2>
                    <p class="text-[#505050] text-base md:text-lg max-w-4xl"><?php the_field('slider_description'); ?></p>
                </div>
                <div class="hidden md:flex items-center gap-2">
                    <button type="button" class="services-gallery-prev w-11 h-11 rounded-lg border border-[#C5C5C5] text-primary text-xl leading-none">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <button type="button" class="services-gallery-next w-11 h-11 rounded-lg border border-[#C5C5C5] text-primary text-xl leading-none">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <div class="swiper services-gallery-swiper">
                <div class="swiper-wrapper">
                    <?php 
                    $gallery = get_field('bottom_gallery');
                    if($gallery): foreach($gallery as $img): ?>
                        <div class="swiper-slide">
                            <div class="services-gallery-card">
                                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" class="w-full h-full object-cover">
                            </div>
                        </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>