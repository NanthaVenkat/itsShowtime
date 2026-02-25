<?php
/**
 * Template Name: Full Width (No Container)
 */
get_header(); ?>
<main id="primary" class="site-main">
    <?php while (have_posts()):
        the_post(); ?>
        <article id="post-<?php the_ID(); ?>">
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>