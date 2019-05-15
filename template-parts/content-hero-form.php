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


<section class="<?php displayClass(); ?> hero-form-section<?php echo (is_array(get_sub_field('logo_line')) ? ' logo-line' : false); ?>"<?php echo (get_sub_field('background_image')['url'] ? ' style="background-image: url(' . get_sub_field('background_image')['url'] . ');"' : false); ?><?php echo (get_sub_field('anchor_id') ? ' id="' . get_sub_field('anchor_id') . '""' :  false); ?>>
    <div class="container container-item-gutter hero-form-container">

        <div class="hero-form-wrapper">
            <div class="hero-form-left">
                <div class="hero-form-header">
                    <<?php echo (get_sub_field('headline_markup_markup') ? get_sub_field('headline_markup_markup') : 'div'); ?> class="hero-form-headline">
                        <?php echo get_sub_field('headline'); ?>
                    </<?php echo (get_sub_field('headline_markup_markup') ? get_sub_field('headline_markup_markup') : 'div'); ?>>

                    <?php if (get_sub_field('subline')) { ?>
                    <<?php echo get_sub_field('subline_markup_markup') ? get_sub_field('subline_markup_markup') : 'div'; ?> class="hero-form-subline">
                        <?php echo get_sub_field('subline'); ?>
                    </<?php echo get_sub_field('subline_markup_markup') ? get_sub_field('subline_markup_markup') : 'div'; ?>>
                    <?php } ?>
                </div>
                <div class="hero-form-img lazy-load<?php echo (get_sub_field('image_vertical_align') ? ' hero-form-img-' . get_sub_field('image_vertical_align') : false); ?>">
                    <img data-src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('image')['alt']; ?>" height="<?php echo (get_sub_field('image')['height'] > 0) ? get_sub_field('image')['height'] : ''; ?>" width="<?php echo (get_sub_field('image')['width'] > 0) ? get_sub_field('image')['width'] : ''; ?>">
                </div>
            </div>
            <div class="hero-form-script">
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
	<?php if( have_rows('logo_line') ): ?>
        <div class="hero-form-logos">
            <div class="hero-form-logo-wrapper">
                <div class="hero-form-logo-img-wrapper">
                    <?php while ( have_rows('logo_line') ) : the_row(); ?>
                        <div class="hero-form-logo-img lazy-load">
                            <img data-src="<?php echo get_sub_field('logo')['url']; ?>" alt="<?php echo get_sub_field('logo')['alt']; ?>" height="<?php echo (get_sub_field('logo')['height'] > 0) ? get_sub_field('logo')['height'] : ''; ?>" width="<?php echo (get_sub_field('logo')['width'] > 0) ? get_sub_field('logo')['width'] : ''; ?>">
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
	<?php endif; ?>
</section>