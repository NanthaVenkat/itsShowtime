<?php

function load_more_posts()
{
    $paged = $_POST['page'];
    $current_post_id = isset($_POST['current_post_id']) ? intval($_POST['current_post_id']) : 0;
    $posts_per_page = 8;

    if ($current_post_id > 0) {
        // Handle Single Page Dual Column Load
        $per_column = 4;

        // 1. Trending
        $trending_args = array(
            'post_type'      => 'post',
            'posts_per_page' => $per_column,
            'paged'          => $paged + 1,
            'category_name'  => 'trending',
            'post__not_in'   => array($current_post_id),
            'orderby'        => 'date',
            'order'          => 'DESC'
        );
        $trending_query = new WP_Query($trending_args);
        ob_start();
        if ($trending_query->have_posts()) :
            while ($trending_query->have_posts()) : $trending_query->the_post();
                include get_template_directory() . '/templates/blog-card.php';
            endwhile;
        endif;
        $trending_html = ob_get_clean();
        wp_reset_postdata();

        // 2. Recent
        $recent_args = array(
            'post_type'      => 'post',
            'posts_per_page' => $per_column,
            'paged'          => $paged + 1,
            'post__not_in'   => array($current_post_id),
            'orderby'        => 'date',
            'order'          => 'DESC'
        );
        $recent_query = new WP_Query($recent_args);
        ob_start();
        if ($recent_query->have_posts()) :
            while ($recent_query->have_posts()) : $recent_query->the_post();
                include get_template_directory() . '/templates/blog-card.php';
            endwhile;
        endif;
        $recent_html = ob_get_clean();
        wp_reset_postdata();

        wp_send_json(array(
            'trending' => $trending_html,
            'recent'   => $recent_html
        ));
    } else {
        // Handle Blog List Page Load (Standard)
        $trending_query = new WP_Query(array(
            'category_name' => 'trending',
            'posts_per_page' => 2,
            'fields' => 'ids'
        ));
        $trending_ids = $trending_query->posts;

        $args = array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => $posts_per_page,
            'paged'          => $paged + 1,
            'post__not_in'   => $trending_ids,
            'orderby'        => 'date',
            'order'          => 'DESC',
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                include get_template_directory() . '/templates/blog-card.php';
            endwhile;
        endif;

        wp_reset_postdata();
    }
    die();
}

add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');
