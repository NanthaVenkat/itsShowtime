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

    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css',
        [],
        '6.5.2'
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

    $main_script_deps = ['swiper-js', 'gsap-js', 'gsap-scrolltrigger', 'lenis'];

    // ZingChart map dependencies (front page only)
    if (is_front_page()) {
        wp_enqueue_script(
            'zingchart-core',
            'https://cdn.zingchart.com/zingchart.min.js',
            [],
            null,
            true
        );

        wp_enqueue_script(
            'zingchart-maps',
            'https://cdn.zingchart.com/modules/zingchart-maps.min.js',
            ['zingchart-core'],
            null,
            true
        );

        wp_enqueue_script(
            'zingchart-maps-ind',
            'https://cdn.zingchart.com/modules/zingchart-maps-ind.min.js',
            ['zingchart-maps'],
            null,
            true
        );

        $main_script_deps[] = 'zingchart-maps-ind';
    }

    wp_enqueue_script(
        'NKs-main',
        get_template_directory_uri() . '/assets/js/main.js',
        $main_script_deps, // Dependency on Swiper, GSAP, Lenis, and optionally ZingChart for the front page
        filemtime(get_template_directory() . '/assets/js/main.js'),
        true
    );

    wp_localize_script('NKs-main', 'nks_ajax', [
        'ajax_url' => admin_url('admin-ajax.php'),
    ]);
}
add_action('wp_enqueue_scripts', 'NKs_theme_assets');
