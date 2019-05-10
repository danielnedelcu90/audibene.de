<?php
/**
 * Template part for displaying table of contents in content_page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package audibene
 */
?>


<section class="toc-section<?php echo (get_sub_field('section_arrow_section_arrow') !== 'off' ? ' section-arrow-' . get_sub_field('section_arrow_section_arrow') : false); ?><?php echo (get_sub_field('section_space_top_section_space_top') !== 'off' ? ' section-space-top' : false); ?><?php echo (get_sub_field('section_space_bottom_section_space_bottom') !== 'off' ? ' section-space-bottom' : false); ?>"<?php echo (get_sub_field('anchor_id') ? ' id="' . get_sub_field('anchor_id') . '""' :  false); ?>>
    <div class="container container-gutter">

        <div class="toc-wrapper">

            <div class="toc-headline">
	            <?php echo get_sub_field('headline'); ?>
            </div>

	        <?php if( have_rows('links') ): ?>

            <ul class="toc-list">

		        <?php while ( have_rows('links') ) : the_row(); ?>

                    <li class="toc-item">
                        <a href="<?php echo get_sub_field('link')['url']; ?>" title="<?php echo get_sub_field('link')['title']; ?>"><?php echo get_sub_field('link')['title']; ?></a>
                    </li>

		        <?php endwhile; ?>

            </ul>

	    <?php endif; ?>

        </div>

    </div>
</section>
