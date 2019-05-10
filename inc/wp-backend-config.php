<?php
/**
 * WP backend configurations
 */

/**
 * Enable svg upload support
 * https://css-tricks.com/snippets/wordpress/allow-svg-through-wordpress-media-uploader/
 */

function audibene_cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'audibene_cc_mime_types');
