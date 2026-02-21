<?php

function NKs_theme_assets()
{
    wp_enqueue_style(
        'NKs-graphik-fonts',
        get_template_directory_uri() . '/assets/fonts/graphik-trial-cufonfonts-webfont/style.css',
        [],
        filemtime(get_template_directory() . '/assets/fonts/graphik-trial-cufonfonts-webfont/style.css')
    );

    // Swiper CSS
    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        [],
        '11.0.0'
    );

    wp_enqueue_style(
        'NKs-tailwind',
        get_template_directory_uri() . '/assets/css/output.css',
        ['NKs-graphik-fonts'],
        filemtime(get_template_directory() . '/assets/css/output.css')
    );

    wp_enqueue_style(
        'NKs-style-sheet',
        get_template_directory_uri() . '/assets/css/style.css',
        [],
        filemtime(get_template_directory() . '/assets/css/style.css')
    );

    // Swiper JS
    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        [],
        '11.0.0',
        true
    );

    wp_enqueue_script(
        'gsap-js',
        'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js',
        [],
        '3.12.5',
        true
    );

    wp_enqueue_script(
        'gsap-scrolltrigger',
        'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js',
        ['gsap-js'],
        '3.12.5',
        true
    );

    wp_enqueue_script(
        'lenis',
        'https://unpkg.com/lenis@1.1.20/dist/lenis.min.js',
        [],
        '1.1.20',
        true
    );

    wp_enqueue_script(
        'NKs-main',
        get_template_directory_uri() . '/assets/js/main.js',
        ['swiper-js', 'gsap-js', 'gsap-scrolltrigger', 'lenis'], // Dependency on Swiper, GSAP and Lenis
        filemtime(get_template_directory() . '/assets/js/main.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'NKs_theme_assets');
