<?php

function NKs_register_menus()
{
    register_nav_menus([
        'primary' => __('primary Menu', 'NKs'),
        'footer' => __('Footer Menu', 'NKs'),
    ]);
}

add_action('init', 'NKs_register_menus');