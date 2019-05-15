<?php
/**
 * Template part for displaying copy form content in content_page.php
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

<section class="<?php displayClass(); ?> copy-form-section<?php echo (get_sub_field('section_arrow_section_arrow') !== 'off' ? ' section-arrow-' . get_sub_field('section_arrow_section_arrow') : false); ?><?php echo (get_sub_field('section_space_top_section_space_top') !== 'off' ? ' section-space-top' : false); ?><?php echo (get_sub_field('section_space_bottom_section_space_bottom') !== 'off' ? ' section-space-bottom' : false); ?>"<?php echo (get_sub_field('anchor_id') ? ' id="' . get_sub_field('anchor_id') . '""' :  false); ?>>

    <div class="container container-item-gutter">
        <div class="copy-form-wrapper">
            <div class="copy-form-script">
		        <?php if( have_rows( 'forms', 'option' ) ): ?>

			        <?php while( have_rows( 'forms', 'option' ) ): the_row(); ?>

				        <?php if ( get_sub_field( 'unique_id' ) ==  $go_form_script ): ?>

					        <?php echo get_sub_field( 'form_script' ); ?>

				        <?php endif; ?>

			        <?php endwhile; ?>

		        <?php endif; ?>
            </div>
            <<?php echo (get_sub_field('markup_inner') ? get_sub_field('markup_inner') : 'div'); ?> class="section-headline headline-hero">
		        <?php echo get_sub_field('headline_inner'); ?>
		    </<?php echo (get_sub_field('markup_inner') ? get_sub_field('markup_inner') : 'div'); ?>>
	    
            <?php if(get_sub_field('preview_text')) {
            	echo get_sub_field('preview_text');
            } ?>
	        <?php echo get_sub_field('copy'); ?>
        </div>
    </div>
</section>
