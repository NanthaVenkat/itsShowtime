<?php get_header(); ?>

<div class="bg-gray-100 py-12">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold">Search Results for: <?php echo get_search_query(); ?></h1>
    </div>
</div>

<main class="container mx-auto px-4 py-12">
    <?php if (have_posts()) : ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php while (have_posts()) :
                the_post(); ?>
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="aspect-w-16 aspect-h-9">
                            <?php the_post_thumbnail('medium', ['class' => 'w-full h-48 object-cover']); ?>
                        </div>
                    <?php endif; ?>
                    <div class="p-6">
                        <h2 class="text-xl font-bold mb-2">
                            <a href="<?php the_permalink(); ?>" class="hover:text-blue-600 transition"><?php the_title(); ?></a>
                        </h2>
                        <div class="text-gray-600 text-sm line-clamp-3 mb-4">
                            <?php echo get_the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="text-blue-600 font-semibold text-sm uppercase hover:underline">
                            Read More &rarr;
                        </a>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="mt-12">
            <?php the_posts_pagination([
                'prev_text' => '&larr; Previous',
                'next_text' => 'Next &rarr;',
                'class' => 'flex justify-center space-x-4'
            ]); ?>
        </div>

    <?php else : ?>
        <div class="text-center py-12">
            <h2 class="text-2xl font-bold mb-4">Nothing Found</h2>
            <p class="text-gray-600 mb-8">Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
            <div class="max-w-md mx-auto">
                <?php get_search_form(); ?>
            </div>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>