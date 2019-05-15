<?php
/**
 * Template part for displaying image copy customer voices content in content_page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package audibene
 */
?>


<section class="<?php displayClass(); ?> image-copy-customer-voices-section<?php echo (get_sub_field('section_arrow_section_arrow') !== 'off' ? ' section-arrow-' . get_sub_field('section_arrow_section_arrow') : false); ?><?php echo (get_sub_field('section_space_top_section_space_top') !== 'off' ? ' section-space-top' : false); ?><?php echo (get_sub_field('section_space_bottom_section_space_bottom') !== 'off' ? ' section-space-bottom' : false); ?>"<?php echo (get_sub_field('anchor_id') ? ' id="' . get_sub_field('anchor_id') . '""' :  false); ?>>
    <div class="container container-item-gutter">

	    <?php
            if ( get_sub_field('column_order') ) {

                $column_order = ' image-copy-customer-voices-wrapper-' . get_sub_field('column_order');

            } else {

	            $column_order = false;

            } ?>

	    <?php if( have_rows('customer_voices') ): ?>

			    <?php while ( have_rows('customer_voices') ) : the_row(); ?>

                    <div class="image-copy-customer-voices-wrapper<?php echo $column_order; ?>">
                        <div class="image-copy-customer-voices-col-img lazy-load">
                            <img data-src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('image')['alt']; ?>" height="<?php echo get_sub_field('image')['height']; ?>" width="<?php echo get_sub_field('image')['width']; ?>">
                        </div>
					    <?php echo get_sub_field('copy'); ?>
                    </div>

			    <?php endwhile; ?>

	    <?php endif; ?>

    </div>
</section>
