<?php

function NKs_widget_init()
{
    register_sidbar([
        'name' => 'Footer Widgets',
        'id' => 'footer-widgets',
        'before_widget' => '<div class="mb-b">',
        'after_widget' => '</div">'
    ]);
}

add_action('widget_init', 'NKs_widget_init');