<?php get_header(); ?>
<div class="bg-gray-100 py-12">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold">
            <?php
            if (is_home() && !is_front_page()) {
                single_post_title();
            } else {
                echo 'Blog';
            }
            ?>
        </h1>
    </div>
</div>
<main class="container mx-auto px-4 py-12">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="block group">
                    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition h-full">
                        <?php if (has_post_thumbnail()):
                            the_post_thumbnail('medium_large', ['class' => 'w-full h-56 object-cover']);
                        endif; ?>
                        <div class="p-6">
                            <div class="text-xs font-bold uppercase tracking-wider text-blue-600 mb-2">
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    echo esc_html($categories[0]->name);
                                } else {
                                    echo 'Uncategorized';
                                }
                                ?>
                            </div>
                            <h2 class="text-xl font-bold mb-3 group-hover:text-blue-600 transition"><?php the_title(); ?></h2>
                            <p class="text-gray-600 text-sm mb-2 overflow-hidden" style="display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;">
                                <?php echo esc_html(get_the_excerpt()); ?>
                            </p>
                        </div>
                    </article>
                </a>
        <?php endwhile;
        else:
            echo '<p>No posts found.</p>';
        endif; ?>
    </div>
    <div class="mt-12">
        <?php the_posts_pagination(['class' => 'flex justify-center space-x-2']); ?>
    </div>
</main>
<?php get_footer(); ?>