<?php
/**
 * Template part for displaying headline and copy content in content_page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package audibene
 */
?>


<section class="<?php displayClass(); ?> quote-section<?php echo (get_sub_field('section_arrow_section_arrow') !== 'off' ? ' section-arrow-' . get_sub_field('section_arrow_section_arrow') : false); ?><?php echo (get_sub_field('section_space_top_section_space_top') !== 'off' ? ' section-space-top' : false); ?><?php echo (get_sub_field('section_space_bottom_section_space_bottom') !== 'off' ? ' section-space-bottom' : false); ?>"<?php echo (get_sub_field('anchor_id') ? ' id="' . get_sub_field('anchor_id') . '""' :  false); ?>>
    <div class="container container-gutter">
    	<div class="side-quote-single">
	    	<div class="quote-head">
	    		<div class="quote-image" style="background-image: url(<?php echo get_sub_field('image_quote')['url']; ?>);">
		    	</div>
		    	<h4 class="quote-title"><?php the_sub_field('title_quote'); ?></h4>
	    	</div>
	        <div class="quote-content">
		        <?php the_sub_field('text_quote'); ?>
	        </div>
	    </div>
    </div>
</section>
