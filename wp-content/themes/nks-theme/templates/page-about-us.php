<?php
/*
Template Name: About Us
Template Post Type: page
*/

get_header();

// Fetch Hero Fields
$hero_title = get_field('hero_title') ?: 'Built to Be Seen. <span class="text-primary">Designed to Be Remembered</span>';
$hero_desc = get_field('hero_description');
$hero_img = get_field('hero_image') ?: home_url('/wp-content/uploads/2026/02/banner2-scaled.webp');

// Fetch Direction Fields
$dir_img = get_field('direction_image') ?: home_url('/wp-content/uploads/2026/02/banner3.webp');
$mission = get_field('mission_text');
$vision = get_field('vision_text');
?>

<main class="about-page bg-white text-[#151515]">
    <section class="pt-40 pb-16">
        <div class="container mx-auto px-4 lg:px-10 grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            <div>
                <p class="text-sm font-medium mb-6">
                    <span class="text-[#F59E0B] tracking-wide">★★★★★</span>
                    <span class="ml-2 text-[#3f3f3f]">4.9/5 Reviews</span>
                </p>
                <h1 class="text-3xl sm:text-4xl md:text-5xl leading-tight font-semibold mb-5">
                    <?php echo $hero_title; ?>
                </h1>
                <?php if ($hero_desc): ?>
                    <p class="text-[#4a4a4a] text-lg max-w-xl mb-8"><?php echo esc_html($hero_desc); ?></p>
                <?php endif; ?>
                <a href="<?php echo esc_url(home_url('/contact')); ?>"
                    class="inline-flex items-center justify-between gap-2 rounded-lg bg-primary text-white px-2 py-2 font-medium hover:bg-red-700 transition-colors">
                    Contact Us <span
                        class="inline-flex justify-center items-center p-1 bg-white rounded text-primary text-xs"><i
                            class="fas fa-arrow-right"></i></span>
                </a>
            </div>
            <div>
                <img src="<?php echo esc_url($hero_img); ?>" alt="Hero Image"
                    class="w-full h-[340px] md:h-[520px] object-cover">
            </div>
        </div>
    </section>

    <section class="bg-primary text-white py-14">
        <div class="container mx-auto px-4 lg:px-10 text-center">
            <h2 class="text-4xl md:text-5xl font-semibold mb-6"><?php the_field('mid_banner_title'); ?></h2>
            <p class="max-w-4xl mx-auto text-lg leading-relaxed"><?php the_field('mid_banner_description'); ?></p>
        </div>
    </section>

    <section class="py-16 overflow-hidden">
        <div class="container mx-auto px-4 lg:px-10">
            <h2 class="text-primary text-5xl font-semibold text-center mb-10">Our Direction</h2>
            <img src="<?php echo esc_url($dir_img); ?>" alt="Our direction"
                class="w-full h-[260px] md:h-[420px] object-cover mb-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <article>
                    <h3 class="text-primary text-3xl font-semibold mb-4">MISSION</h3>
                    <p class="text-[#434343] text-lg leading-relaxed"><?php echo esc_html($mission); ?></p>
                </article>
                <article>
                    <h3 class="text-primary text-3xl font-semibold mb-4">VISION</h3>
                    <p class="text-[#434343] text-lg leading-relaxed"><?php echo esc_html($vision); ?></p>
                </article>
            </div>
        </div>
    </section>

    <section class="py-16 journey-section">
        <div class="container mx-auto px-4 lg:px-10">
            <h2 class="text-primary text-5xl font-semibold text-center mb-5"><?php the_field('journey_title'); ?></h2>
            <p class="text-center max-w-3xl mx-auto mb-16"><?php the_field('journey_subtitle'); ?></p>

            <div class="relative timeline-container max-w-6xl mx-auto">
                <?php if (have_rows('journey_timeline')): ?>

                    <div class="hidden md:block">
                        <?php
                        $rows = get_field('journey_timeline');
                        $chunks = array_chunk($rows, 5); // Assuming 5 items per row based on your circles
                        foreach ($chunks as $chunk):
                            ?>
                            <div class="grid grid-cols-3 gap-6 mb-8 items-end min-h-[140px]">
                                <?php foreach ([0, 2, 4] as $index):
                                    if (isset($chunk[$index])): ?>
                                        <article class="px-5">
                                            <h3 class="text-xl font-semibold mb-2"><?php echo esc_html($chunk[$index]['title']); ?></h3>
                                            <p class="text-sm leading-snug"><?php echo esc_html($chunk[$index]['description']); ?></p>
                                        </article>
                                    <?php else:
                                        echo '<div></div>'; endif; endforeach; ?>
                            </div>

                            <div class="grid grid-cols-5 py-6">
                                <?php foreach ($chunk as $i => $item):
                                    $is_even = ($i % 2 != 0);
                                    $rotate_class = $is_even ? '-rotate-[135deg]' : 'rotate-45';
                                    $inner_rotate = $is_even ? 'rotate-[135deg]' : '-rotate-45';
                                    ?>
                                    <div
                                        class="w-50 h-50 xl:w-60 xl:h-60 relative mx-auto border border-[30px] border-[#F5F5F5] border-l-primary border-t-primary <?php echo $rotate_class; ?> rounded-full flex flex-col items-center justify-center">
                                        <div
                                            class="h-10 w-0.5 -translate-x-[1px] bg-primary left-0 -top-5 absolute inline-block <?php echo $is_even ? 'rotate-[135deg]' : '-rotate-45'; ?>">
                                        </div>
                                        <div class="<?php echo $inner_rotate; ?> text-center">
                                            <p class="font-medium text-xl lg:text-2xl text-primary">
                                                <?php echo esc_html($item['month']); ?></p>
                                            <p class="font-semibold text-2xl lg:text-3xl"><?php echo esc_html($item['year']); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="grid grid-cols-[50px_1fr_50px_1fr_50px] gap-6 mt-8 items-start min-h-[140px]">
                                <div></div>
                                <?php foreach ([1, 3] as $index):
                                    if (isset($chunk[$index])): ?>
                                        <article class="px-2">
                                            <h3 class="text-xl font-semibold mb-2"><?php echo esc_html($chunk[$index]['title']); ?></h3>
                                            <p class="text-sm leading-snug"><?php echo esc_html($chunk[$index]['description']); ?></p>
                                        </article>
                                        <div></div>
                                    <?php endif; endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="md:hidden mt-10 space-y-10">
                        <?php
                        $count = 0;
                        while (have_rows('journey_timeline')):
                            the_row();
                            $count++;
                            $side_class = ($count % 2 != 0) ? 'border-l-4 pl-4' : 'border-r-4 text-right pr-4';
                            ?>
                            <article class="<?php echo $side_class; ?> border-primary">
                                <span class="text-primary font-bold text-sm"><?php the_sub_field('month'); ?>
                                    <?php the_sub_field('year'); ?></span>
                                <h3 class="text-2xl font-bold mb-2"><?php the_sub_field('title'); ?></h3>
                                <p class="text-[#4d4d4d]"><?php the_sub_field('description'); ?></p>
                            </article>
                        <?php endwhile; ?>
                    </div>

                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php get_template_part('templates/testimonial'); ?>
</main>

<?php get_footer(); ?>
