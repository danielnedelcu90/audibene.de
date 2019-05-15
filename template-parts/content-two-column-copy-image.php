<?php
/**
 * Template part for displaying 2 column copy image content in content_page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package audibene
 */
?>


<section class="<?php displayClass(); ?> copy-image-section<?php echo (get_sub_field('section_arrow_section_arrow') !== 'off' ? ' section-arrow-' . get_sub_field('section_arrow_section_arrow') : false); ?><?php echo (get_sub_field('section_space_top_section_space_top') !== 'off' ? ' section-space-top' : false); ?><?php echo (get_sub_field('section_space_bottom_section_space_bottom') !== 'off' ? ' section-space-bottom' : false); ?>"<?php echo (get_sub_field('anchor_id') ? ' id="' . get_sub_field('anchor_id') . '""' :  false); ?>>
    <div class="container container-item-gutter">
        <<?php echo (get_sub_field('headline_markup_markup') ? get_sub_field('headline_markup_markup') : 'div'); ?> class="section-headline copy-image-headline">
            <?php echo get_sub_field('headline'); ?>
        </<?php echo (get_sub_field('headline_markup_markup') ? get_sub_field('headline_markup_markup') : 'div'); ?>>
        <div class="copy-image-wrapper<?php echo (get_sub_field('column_order') ? ' copy-image-wrapper-' . get_sub_field('column_order') : false); ?>">
            <div class="copy-image-col-img-mobile lazy-load">
                <img data-src="<?php echo get_sub_field('image_mobile')['url']; ?>" alt="<?php echo get_sub_field('image_mobile')['alt']; ?>" height="<?php echo get_sub_field('image_mobile')['height']; ?>" width="<?php echo get_sub_field('image_mobile')['width']; ?>">
            </div>
            <div class="copy-image-col-img-desktop lazy-load">
                <img data-src="<?php echo get_sub_field('image_desktop')['url']; ?>" alt="<?php echo get_sub_field('image_desktop')['alt']; ?>" height="<?php echo get_sub_field('image_desktop')['height']; ?>" width="<?php echo get_sub_field('image_desktop')['width']; ?>">
            </div>
	        <?php echo get_sub_field('copy'); ?>
        </div>
    </div>
</section>
