<?php get_header(); ?>

<main class="single-post-page bg-white pb-20">
    <?php while (have_posts()) : the_post();
        $post_id = get_the_ID();
        $hero_thumb = get_the_post_thumbnail_url($post_id, 'full');
        $categories = get_the_category();
        $category_name = !empty($categories) ? $categories[0]->name : 'News';
    ?>
        <!-- Post Hero -->
        <article class="relative overflow-hidden bg-center bg-cover h-screen p-4 md:p-10 flex">
            <div class="absolute inset-0 z-0">
                <?php if ($hero_thumb) : ?>
                    <img src="<?php echo esc_url($hero_thumb); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover">
                <?php else : ?>
                    <div class="w-full h-full bg-gray-900"></div>
                <?php endif; ?>
                <div class="absolute inset-0 bg-black/40"></div>
            </div>

            <div class="container mx-auto relative z-10 text-white max-w-5xl mt-auto pb-10">
                <span class="tag-label bg-primary text-white text-xs font-bold px-3 py-1 rounded inline-block mb-4"><?php echo esc_html($category_name); ?></span>
                <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight"><?php the_title(); ?></h1>
                <div class="flex items-center gap-4 text-sm">
                    <span>By <?php the_author(); ?></span>
                    <span class="w-1 h-1 bg-gray-500 rounded-full"></span>
                    <span><?php echo get_the_date(); ?></span>
                </div>
            </div>
        </article>

        <!-- Post Content -->
        <section class="px-4 md:px-10 lg:px-20 bg-white">
            <div class="container py-20 border-b border-[#B6B6B6] mx-auto">
                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed font-light">
                    <?php the_content(); ?>
                </div>
            </div>
        </section>

        <!-- Bottom Sections: Trending & Recent -->
        <section class="py-20 px-4 md:px-10 lg:px-20">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 relative">

                <div class="hidden lg:inline-block h-full w-[1px] absolute left-1/2 top-0 bg-gray-200"></div>

                    <!-- Trending Column -->
                    <div>
                        <h2 class="text-2xl font-semibold text-primary w-fit pb-2 mb-5">Trending Blogs</h2>
                        <div id="trending-grid" class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <?php
                            $trending_args = array(
                                'post_type'      => 'post',
                                'posts_per_page' => 4,
                                'category_name'  => 'trending',
                                'post__not_in'   => array($post_id),
                                'orderby'        => 'date',
                                'order'          => 'DESC'
                            );
                            $trending_query = new WP_Query($trending_args);
                            if ($trending_query->have_posts()) :
                                while ($trending_query->have_posts()) : $trending_query->the_post();
                                    include get_template_directory() . '/templates/blog-card.php';
                                endwhile;
                            endif;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>

                    <!-- Recent Column -->
                    <div>
                        <h2 class="text-2xl font-semibold text-primary w-fit pb-2 mb-5">Recent Blogs</h2>
                        <div id="recent-grid" class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <?php
                            $recent_args = array(
                                'post_type'      => 'post',
                                'posts_per_page' => 4,
                                'post__not_in'   => array($post_id),
                                'orderby'        => 'date',
                                'order'          => 'DESC'
                            );
                            $recent_query = new WP_Query($recent_args);
                            if ($recent_query->have_posts()) :
                                while ($recent_query->have_posts()) : $recent_query->the_post();
                                    include get_template_directory() . '/templates/blog-card.php';
                                endwhile;
                            endif;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>

                </div>

                <!-- Load More Button -->
                <div class="text-center mt-16">
                    <button id="load-more-btn" data-page="1" data-post-id="<?php echo $post_id; ?>" class="bg-primary text-white px-10 py-3 rounded-lg font-bold hover:bg-red-700 transition-colors uppercase text-sm tracking-wider">
                        Load More
                    </button>
                </div>
            </div>
        </section>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>