<?php

function NKs_widget_init()
{
    register_sidebar([
        'name' => __('Footer Widgets', 'nks-theme'),
        'id' => 'footer-widgets',
        'description' => __('Widgets shown in the footer.', 'nks-theme'),
        'before_widget' => '<div class="mb-4">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="xl:text-4xl font-semibold mb-3">',
        'after_title' => '</h4>',
    ]);

    register_sidebar([
        'name' => __('Footer Social Links', 'nks-theme'),
        'id' => 'footer-social',
        'description' => __('Add social link widgets for the footer social section.', 'nks-theme'),
        'before_widget' => '<div class="mb-2 text-gray-400">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="text-lg font-semibold mb-4 text-white">',
        'after_title' => '</h4>',
    ]);
}

add_action('widgets_init', 'NKs_widget_init');

function NKs_footer_social_menu_class($nav_menu_args, $nav_menu, $args, $instance)
{
    if (!empty($args['id']) && $args['id'] === 'footer-social') {
        $existing_class = isset($nav_menu_args['menu_class']) ? $nav_menu_args['menu_class'] : 'menu';
        $nav_menu_args['menu_class'] = trim($existing_class . ' space-y-2');
    }

    return $nav_menu_args;
}

add_filter('widget_nav_menu_args', 'NKs_footer_social_menu_class', 10, 4);