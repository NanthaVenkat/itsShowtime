<?php

function NKs_theme_assets()
{
    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();

    wp_enqueue_style(
        'nks-tailwind',
        $theme_uri . '/assets/css/output.css',
        [],
        filemtime($theme_dir . '/assets/css/output.css')
    );

    wp_enqueue_style(
        'nks-swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        [],
        '11.1.15'
    );


    wp_enqueue_script(
        'nks-swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        [],
        '11.1.15',
        true
    );

    wp_enqueue_script(
        'nks-main',
        $theme_uri . '/assets/js/main.js',
        ['nks-swiper'],
        filemtime($theme_dir . '/assets/js/main.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'NKs_theme_assets');

