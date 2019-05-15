<?php
/**
 * Template part for displaying fullscreen image content in content_page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package audibene
 */
?>

<section class="<?php displayClass(); ?> fullscreen-image-section<?php echo (get_sub_field('section_arrow_section_arrow') !== 'off' ? ' section-arrow-' . get_sub_field('section_arrow_section_arrow') : false); ?><?php echo (get_sub_field('section_space_top_section_space_top') !== 'off' ? ' section-space-top' : false); ?><?php echo (get_sub_field('section_space_bottom_section_space_bottom') !== 'off' ? ' section-space-bottom' : false); ?>"<?php echo (get_sub_field('anchor_id') ? ' id="' . get_sub_field('anchor_id') . '""' :  false); ?>>
    <div class="container container-gutter">
        <div class="fullscreen-image-wrapper">
            <div class="fullscreen-image-mobile lazy-load">
                <img data-src="<?php echo get_sub_field('image_mobile')['url']; ?>" alt="<?php echo get_sub_field('image_mobile')['alt']; ?>" height="<?php echo get_sub_field('image_mobile')['height']; ?>" width="<?php echo get_sub_field('image_mobile')['width']; ?>">
            </div>
            <div class="fullscreen-image-desktop lazy-load">
                <img data-src="<?php echo get_sub_field('image_desktop')['url']; ?>" alt="<?php echo get_sub_field('image_desktop')['alt']; ?>" height="<?php echo get_sub_field('image_desktop')['height']; ?>" width="<?php echo get_sub_field('image_desktop')['width']; ?>">
            </div>
        </div>
    </div>
</section>
