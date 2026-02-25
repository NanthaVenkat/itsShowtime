<?php
/*
Template Name: Gallery
Template Post Type: page
*/

get_header();

// Fetch Hero & Banner Fields
$hero_title    = get_field('gallery_hero_title') ?: 'Moments and visuals from<br class="hidden md:block">our projects.';
$hero_subtitle = get_field('gallery_hero_subtitle');
$banner_text   = get_field('gallery_banner_text');

// Fetch Gallery Images (ACF Gallery Field returns array)
$gallery_images = get_field('gallery_grid');

// Fetch Recent Projects (Repeater)
?>

<main class="gallery-page bg-[#f3f3f3] text-[#151515]">
    <section class="pt-40 pb-16">
        <div class="container mx-auto px-4 lg:px-10 text-center">
            <h1 class="text-primary text-4xl md:text-6xl font-semibold leading-tight mb-5">
                <?php echo $hero_title; ?>
            </h1>
            <?php if($hero_subtitle): ?>
                <p class="text-[#565656] font-medium text-base md:text-lg max-w-2xl mx-auto">
                    <?php echo esc_html($hero_subtitle); ?>
                </p>
            <?php endif; ?>
        </div>
    </section>

    <section>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-0">
            <?php if($gallery_images): foreach ($gallery_images as $image): ?>
                <figure class="overflow-hidden !mb-0">
                    <img
                        src="<?php echo esc_url($image['url']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>"
                        class="w-full h-[300px] md:h-[380px] lg:h-[420px] object-cover"
                        data-gallery-flip-image>
                </figure>
            <?php endforeach; endif; ?>
        </div>
    </section>

    <section class="bg-primary text-white py-16">
        <div class="container mx-auto px-4 lg:px-10 text-center">
            <p class="max-w-5xl mx-auto text-base md:text-xl leading-relaxed">
                <?php echo esc_html($banner_text); ?>
            </p>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="text-center mb-10">
                <h2 class="text-primary text-4xl md:text-6xl font-semibold mb-4"><?php the_field('projects_title'); ?></h2>
                <p class="text-[#565656] font-medium max-w-2xl mx-auto"><?php the_field('projects_subtitle'); ?></p>
            </div>

            <?php if( have_rows('recent_projects') ): ?>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <?php 
                    $count = 0;
                    while( have_rows('recent_projects') ): the_row(); 
                        $count++;
                        // The first two items go in the grid, the third (if exists) goes full width below
                        if($count <= 2):
                    ?>
                        <article>
                            <img src="<?php echo esc_url(get_sub_field('project_image')); ?>" alt="<?php the_sub_field('project_name'); ?>" class="w-full h-[320px] md:h-[420px] object-cover mb-3">
                            <div class="flex flex-wrap items-center justify-between text-[#252525] gap-3 text-sm md:text-base">
                                <p><span class="font-semibold"><?php the_sub_field('project_name'); ?></span> | <?php the_sub_field('project_category'); ?></p>
                                <time datetime="<?php the_sub_field('project_date'); ?>"><?php the_sub_field('project_date'); ?></time>
                            </div>
                        </article>
                    <?php 
                        endif;
                    endwhile; 
                    ?>
                </div>

                <?php 
                // Reset loop to find the 3rd item for the full-width featured slot
                reset_rows();
                $count = 0;
                while( have_rows('recent_projects') ): the_row();
                    $count++;
                    if($count == 3):
                ?>
                    <article>
                        <img src="<?php echo esc_url(get_sub_field('project_image')); ?>" alt="<?php the_sub_field('project_name'); ?>" class="w-full h-[360px] md:h-[520px] object-cover mb-3">
                        <div class="flex flex-wrap items-center justify-between text-[#252525] gap-3 text-sm md:text-base">
                            <p><span class="font-semibold"><?php the_sub_field('project_name'); ?></span> | <?php the_sub_field('project_category'); ?></p>
                            <time datetime="<?php the_sub_field('project_date'); ?>"><?php the_sub_field('project_date'); ?></time>
                        </div>
                    </article>
                <?php 
                    endif;
                endwhile; 
                ?>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>