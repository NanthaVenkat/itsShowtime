<?php get_header(); ?>
<main class="container mx-auto px-4 py-12 flex flex-col md:flex-row gap-12">
    <div class="md:w-2/3">
        <?php while (have_posts()):
            the_post(); ?>
            <header class="mb-8">
                <span class="text-blue-600 font-bold uppercase tracking-widest text-xs"><?php the_category(', '); ?></span>
                <h1 class="text-4xl font-bold mt-2"><?php the_title(); ?></h1>
                <div class="text-gray-500 mt-4 text-sm">By <?php the_author(); ?> | <?php echo get_the_date(); ?></div>
                <?php if (has_post_thumbnail()): ?>
                    <div class="mt-6">
                        <?php the_post_thumbnail('large', ['class' => 'w-full h-auto rounded-lg shadow-md']); ?>
                    </div>
                <?php endif; ?>
            </header>
            <div class="prose max-w-none">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    </div>
    <aside class="md:w-1/3">
        <?php get_sidebar(); // If have widgets for posts 
        ?>
    </aside>
</main>
<?php get_footer(); ?>