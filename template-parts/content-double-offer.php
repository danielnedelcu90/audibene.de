<?php
/**
 * Template part for displaying headline and copy content in content_page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package audibene
 */
?>


<section class="double-offer-section<?php echo (get_sub_field('section_arrow_section_arrow') !== 'off' ? ' section-arrow-' . get_sub_field('section_arrow_section_arrow') : false); ?><?php echo (get_sub_field('section_space_top_section_space_top') !== 'off' ? ' section-space-top' : false); ?><?php echo (get_sub_field('section_space_bottom_section_space_bottom') !== 'off' ? ' section-space-bottom' : false); ?>"<?php echo (get_sub_field('anchor_id') ? ' id="' . get_sub_field('anchor_id') . '""' :  false); ?>>
    <div class="container container-gutter">
    	<div class="double-offer-image" style="background:url(<?php echo get_sub_field('image_double_offer')['url']; ?>);"></div>
    	<div class="double-offer-content">
    		<h3 class="double-offer-title"><?php the_sub_field('title_double_offer'); ?></h3>
	        <div class="headline-copy-content">
		        <?php the_sub_field('text_double_offer'); ?>
	        </div>
	        <a href="<?php the_sub_field('select_link_double_offer'); ?>" class="double-offer-link">
	        	<?php the_sub_field('link_text_double_offer'); ?>
	        </a>
    	</div>
    </div>
</section>
