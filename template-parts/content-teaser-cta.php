<?php
/**
 * Template part for displaying teaser cta content in content_page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package audibene
 */
?>


<section class="teaser-cta-section<?php echo (get_sub_field('section_arrow_section_arrow') !== 'off' ? ' section-arrow-' . get_sub_field('section_arrow_section_arrow') : false); ?><?php echo (get_sub_field('section_space_top_section_space_top') !== 'off' ? ' section-space-top' : false); ?><?php echo (get_sub_field('section_space_bottom_section_space_bottom') !== 'off' ? ' section-space-bottom' : false); ?>"<?php echo (get_sub_field('anchor_id') ? ' id="' . get_sub_field('anchor_id') . '""' :  false); ?>>
    <div class="container container-gutter">
        <div class="teaser-cta-wrapper">
            <div class="teaser-cta-teaser">
		        <?php echo get_sub_field('teaser'); ?>
            </div>
            <div class="teaser-cta-link">
		        <a href="<?php echo get_sub_field('link')['url']; ?>" target="<?php echo get_sub_field('link')['target']; ?>" class="btn btn-primary"><?php echo get_sub_field('link')['title']; ?>  »</a>
            </div>
        </div>
    </div>
</section>
