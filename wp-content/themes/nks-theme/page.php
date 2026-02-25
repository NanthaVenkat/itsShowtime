<?php get_header(); ?>
<main class="container mx-auto px-4 py-12 max-w-4xl">
    <?php while (have_posts()):
        the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php body_class(); ?>>
            <h1 class="text-5xl font-extrabold mb-8 text-gray-900"><?php the_title(); ?></h1>
            <?php if (has_post_thumbnail()): ?>
                <div class="rounded-xl overflow-hidden mb-10 shadow-lg">
                    <?php the_post_thumbnail('full', ['class' => 'w-full h-auto']); ?>
                </div>
            <?php endif; ?>
            <div class="prose prose-lg max-w-none prose-slate prose-headings:text-gray-900">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>