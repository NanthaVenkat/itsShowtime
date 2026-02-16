<?php get_header(); ?>

<main class="container mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold underline mb-4">
        Wordpress Dashboard
    </h1>

    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    else :
        _e('Sorry, no posts matched your criteria.', 'textdomain');
    endif;
    ?>
</main>

<?php get_footer(); ?>
