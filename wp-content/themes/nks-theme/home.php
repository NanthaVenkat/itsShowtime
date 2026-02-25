<?php get_header();

// Fetch trending posts
$trending_args = array(
    'post_type' => 'post',
    'posts_per_page' => 2,
    'category_name' => 'trending',
    'orderby' => 'date',
    'order' => 'DESC'
);
$trending_query = new WP_Query($trending_args);

// Fallback: If no trending category posts, get the latest 2 posts overall
if (!$trending_query->have_posts()) {
    $trending_args = array(
        'post_type' => 'post',
        'posts_per_page' => 2,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $trending_query = new WP_Query($trending_args);
}

$trending_ids = array();
$hero_post = null;
$featured_post = null;

if ($trending_query->have_posts()) {
    $i = 0;
    while ($trending_query->have_posts()) {
        $trending_query->the_post();
        $trending_ids[] = get_the_ID();
        if ($i == 0)
            $hero_post = get_post();
        if ($i == 1)
            $featured_post = get_post();
        $i++;
    }
}
wp_reset_postdata();

?>

<main class="blog-listing-page bg-white pb-20">

    <?php
    $blog_page_id = get_option('page_for_posts');
    $header_bg = get_the_post_thumbnail_url($blog_page_id, 'full');
    ?>
    <!-- Page Header -->
    <!-- <section class="page-header relative overflow-hidden bg-center bg-cover h-screen p-4 md:p-10 flex"
        style="background-image: url('<`?php echo esc_url($header_bg); ?>');">
        <div class="absolute inset-0 bg-black/50"></div>

        <`?php if ($header_bg): ?>
            <div class="absolute inset-0 z-0">
                <img src="<`?php echo esc_url($header_bg); ?>" alt="Blog Header" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/50"></div>
            </div> 
        <`?php endif; ?>

        <div class="container max-w-3xl mt-auto relative z-10 text-white">
            <p class="bg-primary py-2 px-3 rounded w-max mb-4 text-sm">Trending</p>
            <h1 class="text-3xl md:text-5xl font-bold mb-6 leading-none">Precision Branding, Built for Real-World Use
                Experience </h1>
            <p class="text-gray-200 text-lg md:text-xl max-w-2xl leading-relaxed">
                Naked eye advertising refers to outdoor 3D LED displays that create the illusion of three-dimensional
                Naked eye advertising refers to outdoor 3D LED displays that create the illusion of three-dimensional
            </p>
        </div>
    </section>-->

    <?php if ($hero_post):
        $hero_thumb = get_the_post_thumbnail_url($hero_post->ID, 'full');
        ?>
        <!-- Blog Hero -->
        <div class="blog-hero relative overflow-hidden bg-center bg-cover h-screen p-4 md:p-10 flex">
            <div class="absolute inset-0 z-0">
                <img src="<?php echo esc_url($hero_thumb); ?>" alt="<?php echo esc_attr($hero_post->post_title); ?>"
                    class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/40"></div>
            </div>
            <div class="container mx-auto relative z-10 text-white max-w-5xl ml-0">
                <span
                    class="tag-label bg-primary text-white text-xs font-bold px-3 py-1 rounded inline-block mb-4">Trending</span>
                <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                    <?php echo esc_html($hero_post->post_title); ?>
                </h1>
                <p class="text-lg md:text-xl text-gray-200 max-w-2xl mb-8 leading-relaxed">
                    <?php echo esc_html(get_the_excerpt($hero_post->ID)); ?>
                </p>
                <a href="<?php echo get_permalink($hero_post->ID); ?>"
                    class="inline-flex items-center text-white font-bold hover:underline">
                    Read More
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
    <?php endif; ?>

    <!-- Recent Posts Grid -->
    <section class="py-20 px-4 md:px-10 lg:px-20">
        <div class="container mx-auto">

            <!-- Secondary Trending Section -->
            <?php if ($featured_post):
                $featured_thumb = get_the_post_thumbnail_url($featured_post->ID, 'large');
                ?>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center py-16">
                    <div class="relative overflow-hidden aspect-[16/9] shadow-lg">
                        <span class="inline-block mb-4 tag-label bg-primary text-white text-xs font-bold px-3 py-1 rounded">Trending</span>
                        <img src="<?php echo esc_url($featured_thumb); ?>"
                            alt="<?php echo esc_attr($featured_post->post_title); ?>" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold text-primary mb-6 leading-tight">
                            <?php echo esc_html($featured_post->post_title); ?>
                        </h2>
                        <p class="text-gray-700 text-lg leading-relaxed mb-8">
                            <?php echo esc_html(get_the_excerpt($featured_post->ID)); ?>
                        </p>
                        <a href="<?php echo get_permalink($featured_post->ID); ?>"
                            class="inline-block bg-primary text-white px-8 py-3 rounded-lg font-bold hover:bg-red-700 transition-colors uppercase text-sm tracking-wider">
                            Read more
                        </a>
                    </div>
                </div>
            <?php endif; ?>

            <h2 class="text-md font-semibold tracking-tight mb-7">Recent blog posts
            </h2>

            <div id="blog-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
                <?php
                $grid_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 8,
                    'post__not_in' => $trending_ids, // Exclude trending ones? 
                    // User said "initialy load 8 blogs", usually trending are separate or part of it?
                    // Let's exclude the 2 featured ones if they exist.
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $grid_query = new WP_Query($grid_args);

                if ($grid_query->have_posts()):
                    while ($grid_query->have_posts()):
                        $grid_query->the_post();
                        include get_template_directory() . '/templates/blog-card.php';
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>

            <!-- Load More Button -->
            <div class="text-center">
                <button id="load-more-btn" data-page="1"
                    class="bg-primary text-white px-10 py-3 rounded-lg font-bold hover:bg-red-700 transition-colors uppercase text-sm tracking-wider">
                    Load More
                </button>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>