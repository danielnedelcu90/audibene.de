<?php
/**
 * Template part for displaying 2 column copy product content in content_page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package audibene
 */
?>


<section class="<?php displayClass(); ?> copy-product-section<?php echo (get_sub_field('section_arrow_section_arrow') !== 'off' ? ' section-arrow-' . get_sub_field('section_arrow_section_arrow') : false); ?><?php echo (get_sub_field('section_space_top_section_space_top') !== 'off' ? ' section-space-top' : false); ?><?php echo (get_sub_field('section_space_bottom_section_space_bottom') !== 'off' ? ' section-space-bottom' : false); ?>"<?php echo (get_sub_field('anchor_id') ? ' id="' . get_sub_field('anchor_id') . '""' :  false); ?>>
    <div class="container container-item-gutter">
        <<?php echo (get_sub_field('headline_markup_markup') ? get_sub_field('headline_markup_markup') : 'div'); ?> class="section-headline copy-product-headline">
            <?php echo get_sub_field('headline'); ?>
        </<?php echo (get_sub_field('headline_markup_markup') ? get_sub_field('headline_markup_markup') : 'div'); ?>>
        <div class="copy-product-wrapper">
            <div class="copy-product-col">
                <div class="copy-product-col-copy">
	                <?php echo get_sub_field('copy'); ?>
                </div>
            </div>
            <div class="copy-product-col">
                <<?php echo (get_sub_field('product_headline_markup_markup') ? get_sub_field('product_headline_markup_markup') : 'div'); ?> class="copy-product-col-headline">
                    <?php echo get_sub_field('product_headline'); ?>
                </<?php echo (get_sub_field('product_headline_markup_markup') ? get_sub_field('product_headline_markup_markup') : 'div'); ?>>
                <div class="copy-product-col-wrapper">
                    <div class="copy-product-col-img lazy-load">
                        <img data-src="<?php echo get_sub_field('product_image')['url']; ?>" alt="<?php echo get_sub_field('product_image')['alt']; ?>" height="<?php echo get_sub_field('product_image')['height']; ?>" width="<?php echo get_sub_field('product_image')['width']; ?>">
                    </div>
                    <<?php echo (get_sub_field('product_subline_markup_markup') ? get_sub_field('product_subline_markup_markup') : 'div'); ?> class="copy-product-col-subline">
                        <?php echo get_sub_field('product_subline'); ?>
                    </<?php echo (get_sub_field('product_subline_markup_markup') ? get_sub_field('product_subline_markup_markup') : 'div'); ?>>
                    <div class="copy-product-col-copy">
	                    <?php echo get_sub_field('product_copy'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
