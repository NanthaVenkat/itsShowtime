<?php

require get_template_directory() . '/functions/theme-setup.php';
require get_template_directory() . '/functions/enqueue.php';
require get_template_directory() . '/functions/widgets.php';
require get_template_directory() . '/functions/blog.php';
// require get_template_directory() . '/functions/menus.php';

// Allow SVG upload
function allow_svg_upload($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');

// Fix MIME type check
function fix_svg_mime_type($data, $file, $filename, $mimes)
{
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if ($ext === 'svg') {
        $data['type'] = 'image/svg+xml';
        $data['ext']  = 'svg';
    }
    return $data;
}
add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 4);
