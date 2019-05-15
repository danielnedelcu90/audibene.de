<?php
/**
 * Template part for displaying 4 column usp content in content_page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package audibene
 */
?>


<section class="<?php displayClass(); ?> steps-section<?php echo (get_sub_field('section_arrow_section_arrow') !== 'off' ? ' section-arrow-' . get_sub_field('section_arrow_section_arrow') : false); ?><?php echo (get_sub_field('section_space_top_section_space_top') !== 'off' ? ' section-space-top' : false); ?><?php echo (get_sub_field('section_space_bottom_section_space_bottom') !== 'off' ? ' section-space-bottom' : false); ?>"<?php echo (get_sub_field('anchor_id') ? ' id="' . get_sub_field('anchor_id') . '""' :  false); ?>>
    <div class="container container-item-gutter">
        <<?php echo (get_sub_field('headline_markup_markup') ? get_sub_field('headline_markup_markup') : 'div'); ?> class="section-headline">
            <?php echo get_sub_field('headline'); ?>
        </<?php echo (get_sub_field('headline_markup_markup') ? get_sub_field('headline_markup_markup') : 'div'); ?>>

        <?php if (get_sub_field('subline')) { ?>
            <<?php echo get_sub_field('subline_markup_markup') ? get_sub_field('subline_markup_markup') : 'div'; ?> class="section-subline">
                <?php echo get_sub_field('subline'); ?>
            </<?php echo get_sub_field('subline_markup_markup') ? get_sub_field('subline_markup_markup') : 'div'; ?>>
        <?php } ?>

        <?php if (get_sub_field('image_mobile')['url']) { ?>
            <div class="steps-image-mobile lazy-load">
                <img data-src="<?php echo get_sub_field('image_mobile')['url']; ?>" alt="<?php echo get_sub_field('image_mobile')['alt']; ?>" height="<?php echo (get_sub_field('image_mobile')['height'] > 0) ? get_sub_field('image_mobile')['height'] : ''; ?>" width="<?php echo (get_sub_field('image_mobile')['width'] > 0) ? get_sub_field('image_mobile')['width'] : ''; ?>">
            </div>
        <?php } ?>

        <?php
            if ( !empty( get_sub_field('steps_numbering') ) && get_sub_field('steps_numbering')[0] == 'enable' ) {
                $steps_numbering = ' steps-numbering';
            } else {
	            $steps_numbering = false;
            }
        ?>

        <?php if( have_rows('steps') ): ?>

            <div class="steps-wrapper">

                <?php while ( have_rows('steps') ) : the_row(); ?>

                    <div class="steps-item">

                        <div class="steps-image lazy-load">
                            <img data-src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('image')['alt']; ?>" height="<?php echo (get_sub_field('image')['height'] > 0) ? get_sub_field('image')['height'] : ''; ?>" width="<?php echo (get_sub_field('image')['width'] > 0) ? get_sub_field('image')['width'] : ''; ?>">
                        </div>
                        <<?php echo (get_sub_field('headline_markup_markup') ? get_sub_field('headline_markup_markup') : 'div'); ?> class="steps-headline<?php echo $steps_numbering; ?>">
                            <?php echo get_sub_field('headline'); ?>
                        </<?php echo (get_sub_field('headline_markup_markup') ? get_sub_field('headline_markup_markup') : 'div'); ?>>
                        <<?php echo get_sub_field('subline_markup_markup') ? get_sub_field('subline_markup_markup') : 'div'; ?> class="steps-subline<?php echo $steps_numbering; ?>">
                            <?php echo get_sub_field('subline'); ?>
                        </<?php echo get_sub_field('subline_markup_markup') ? get_sub_field('subline_markup_markup') : 'div'; ?>>
                        <div class="steps-copy">
                            <?php echo get_sub_field('copy'); ?>
                        </div>

                    </div>

                <?php endwhile; ?>

            </div>

        <?php endif; ?>

    </div>
</section>
