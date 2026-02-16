<?php

function NKs_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    // Logo
    add_theme_support('custom-logo', [
        'height' => 80,
        'weight' => 240,
        'flex-width' => true,
        'flex-height' => true
    ]);

    // fav icon
    add_theme_support('site-icon');

    // Nav Menus 
    register_nav_menus([
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu'
    ]);

    add_theme_support('html5', [
        'search-form',
        'gallery',
        'caption'
    ]);
}

add_action('after_setup_theme', 'NKs_theme_setup');
