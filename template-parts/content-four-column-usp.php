<?php
/**
 * Template part for displaying 4 column usp content in content_page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package audibene
 */
?>

<section class="<?php displayClass(); ?> usp-section<?php echo (get_sub_field('section_arrow_section_arrow') !== 'off' ? ' section-arrow-' . get_sub_field('section_arrow_section_arrow') : false); ?><?php echo (get_sub_field('section_space_top_section_space_top') !== 'off' ? ' section-space-top' : false); ?><?php echo (get_sub_field('section_space_bottom_section_space_bottom') !== 'off' ? ' section-space-bottom' : false); ?>"<?php echo (get_sub_field('anchor_id') ? ' id="' . get_sub_field('anchor_id') . '""' :  false); ?>>
    <div class="container container-item-gutter">
        <<?php echo (get_sub_field('headline_markup_markup') ? get_sub_field('headline_markup_markup') : 'div'); ?> class="section-headline">
            <?php echo get_sub_field('headline'); ?>
        </<?php echo (get_sub_field('headline_markup_markup') ? get_sub_field('headline_markup_markup') : 'div'); ?>>

        <?php if (get_sub_field('subline')) { ?>
            <<?php echo get_sub_field('subline_markup_markup') ? get_sub_field('subline_markup_markup') : 'div'; ?> class="section-subline">
                <?php echo get_sub_field('subline'); ?>
            </<?php echo get_sub_field('subline_markup_markup') ? get_sub_field('subline_markup_markup') : 'div'; ?>>
        <?php } ?>

        <?php if( have_rows('usp') ): ?>

            <div class="usp-wrapper">

            <?php while ( have_rows('usp') ) : the_row(); ?>

                <?php if ( get_sub_field('link') ) { ?>

                    <a href="<?php echo get_sub_field('link')['url']; ?>" title="<?php echo get_sub_field('link')['title']; ?>" class="usp-item">

                <?php } else { ?>

                    <div class="usp-item">

                <?php } ?>

                    <div class="usp-icon lazy-load">
                        <img data-src="<?php echo get_sub_field('icon')['url']; ?>" alt="<?php echo get_sub_field('icon')['alt']; ?>" height="<?php echo (get_sub_field('icon')['height'] > 0) ? get_sub_field('icon')['height'] : ''; ?>" width="<?php echo (get_sub_field('icon')['width'] > 0) ? get_sub_field('icon')['width'] : ''; ?>">
                    </div>
                    <<?php echo (get_sub_field('headline_markup_markup') ? get_sub_field('headline_markup_markup') : 'div'); ?> class="usp-headline">
                        <?php echo get_sub_field('headline'); ?>
                    </<?php echo (get_sub_field('headline_markup_markup') ? get_sub_field('headline_markup_markup') : 'div'); ?>>
                    <div class="usp-copy">
                        <?php echo get_sub_field('copy'); ?>
                    </div>

                <?php if ( !empty( get_sub_field('show_link') ) && get_sub_field('show_link')[0] == 'enable' ) { ?>

                    <div class="usp-link">
	                    <?php echo get_sub_field('link')['title']; ?>
                    </div>

                <?php } ?>

                <?php if ( get_sub_field('link') ) { ?>

                    </a>

                <?php } else { ?>

                    </div>

                <?php } ?>

            <?php endwhile; ?>

            </div>

        <?php endif; ?>

    </div>
</section>
