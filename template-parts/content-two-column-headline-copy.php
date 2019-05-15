<?php
/**
 * Template part for displaying 2 column headline copy content in content_page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package audibene
 */
?>


<section class="<?php displayClass(); ?> two-column-headline-copy-section<?php echo (get_sub_field('section_arrow_section_arrow') !== 'off' ? ' section-arrow-' . get_sub_field('section_arrow_section_arrow') : false); ?><?php echo (get_sub_field('section_space_top_section_space_top') !== 'off' ? ' section-space-top' : false); ?><?php echo (get_sub_field('section_space_bottom_section_space_bottom') !== 'off' ? ' section-space-bottom' : false); ?>"<?php echo (get_sub_field('anchor_id') ? ' id="' . get_sub_field('anchor_id') . '""' :  false); ?>>
    <div class="container container-item-gutter">

	    <?php if( have_rows('headline_copy') ): ?>

        <div class="two-column-headline-copy-wrapper">

		    <?php while ( have_rows('headline_copy') ) : the_row(); ?>

            <div class="two-column-headline-copy-col">

                <<?php echo (get_sub_field('headline_markup_markup') ? get_sub_field('headline_markup_markup') : 'div'); ?> class="two-column-headline-copy-headline">
                    <?php echo get_sub_field('headline'); ?>
                </<?php echo (get_sub_field('headline_markup_markup') ? get_sub_field('headline_markup_markup') : 'div'); ?>>

                <div class="two-column-headline-copy-copy">
                    <?php echo get_sub_field('copy'); ?>
                </div>

            </div>

            <?php endwhile; ?>

        </div>

        <?php endif; ?>

    </div>
</section>
