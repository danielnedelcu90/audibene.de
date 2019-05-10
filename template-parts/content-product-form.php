<?php
/**
 * Template part for displaying hero form content in content_page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package audibene
 */
?>

<?php

// define go form script variable
$go_form_script = get_sub_field('go_form_script');

?>


<section class="product-form-section<?php echo (get_sub_field('section_arrow_section_arrow') !== 'off' ? ' section-arrow-' . get_sub_field('section_arrow_section_arrow') : false); ?><?php echo (get_sub_field('section_space_top_section_space_top') !== 'off' ? ' section-space-top' : false); ?><?php echo (get_sub_field('section_space_bottom_section_space_bottom') !== 'off' ? ' section-space-bottom' : false); ?>"<?php echo (get_sub_field('anchor_id') ? ' id="' . get_sub_field('anchor_id') . '""' :  false); ?>>
    <div class="container container-item-gutter product-form-container">

        <div class="product-form-wrapper">
            <div class="product-form-left">
                <div class="product-form-header">
                    <<?php echo (get_sub_field('headline_markup_markup') ? get_sub_field('headline_markup_markup') : 'div'); ?> class="product-form-headline">
                        <?php echo get_sub_field('headline'); ?>
                    </<?php echo (get_sub_field('headline_markup_markup') ? get_sub_field('headline_markup_markup') : 'div'); ?>>

                    <?php if (get_sub_field('subline')) { ?>
                    <<?php echo get_sub_field('subline_markup_markup') ? get_sub_field('subline_markup_markup') : 'div'; ?> class="product-form-subline">
                        <?php echo get_sub_field('subline'); ?>
                    </<?php echo get_sub_field('subline_markup_markup') ? get_sub_field('subline_markup_markup') : 'div'; ?>>
                    <?php } ?>
                </div>
	            <?php if ( get_sub_field('product_image') && get_sub_field('product_image')['url'] ) { ?>
                <div class="product-form-img lazy-load">
                    <img data-src="<?php echo get_sub_field('product_image')['url']; ?>" alt="<?php echo get_sub_field('product_image')['alt']; ?>" height="<?php echo (get_sub_field('product_image')['height'] > 0) ? get_sub_field('product_image')['height'] : ''; ?>" width="<?php echo (get_sub_field('product_image')['width'] > 0) ? get_sub_field('product_image')['width'] : ''; ?>">
                </div>
                <?php } ?>
                <?php if( have_rows('product_thumbnails') ): ?>
                    <div class="product-form-thumbnails">
	                    <?php while ( have_rows('product_thumbnails') ) : the_row(); ?>
                            <div class="product-form-thumbnails-img lazy-load">
                                <img data-src="<?php echo get_sub_field('thumbnail')['url']; ?>" alt="<?php echo get_sub_field('thumbnail')['alt']; ?>" height="<?php echo (get_sub_field('thumbnail')['height'] > 0) ? get_sub_field('thumbnail')['height'] : ''; ?>" width="<?php echo (get_sub_field('thumbnail')['width'] > 0) ? get_sub_field('thumbnail')['width'] : ''; ?>">
                            </div>
	                    <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <?php if ( get_sub_field('link') && get_sub_field('link')['url'] ) { ?>
                    <div class="product-form-link-wrapper">
                        <a href="<?php echo get_sub_field('link')['url']; ?>" target="<?php echo get_sub_field('link')['target']; ?>" class="btn btn-primary"><?php echo get_sub_field('link')['title']; ?></a>
                    </div>
                <?php } ?>
                <?php if ( get_sub_field('copy') ) { ?>
                    <div class="product-form-copy">
	                    <?php echo get_sub_field('copy'); ?>
                    </div>
                <?php } ?>
            </div>
            <div class="product-form-script">
	            <?php if( have_rows( 'forms', 'option' ) ): ?>

		            <?php while( have_rows( 'forms', 'option' ) ): the_row(); ?>

			            <?php if ( get_sub_field( 'unique_id' ) ==  $go_form_script ): ?>

				            <?php echo get_sub_field( 'form_script' ); ?>

			            <?php endif; ?>

		            <?php endwhile; ?>

	            <?php endif; ?>
            </div>
        </div>
    </div>
</section>