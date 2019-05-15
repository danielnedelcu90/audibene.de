<?php
/**
 * Template part for displaying copy content in content_page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package audibene
 */
?>

<?php $markup = get_sub_field('headline_markup_markup') ? get_sub_field('headline_markup_markup') : 'div'; ?>

<section class="<?php displayClass(); ?> button-links-section<?php echo (get_sub_field('section_arrow_section_arrow') !== 'off' ? ' section-arrow-' . get_sub_field('section_arrow_section_arrow') : false); ?><?php echo (get_sub_field('section_space_top_section_space_top') !== 'off' ? ' section-space-top' : false); ?><?php echo (get_sub_field('section_space_bottom_section_space_bottom') !== 'off' ? ' section-space-bottom' : false); ?>"<?php echo (get_sub_field('anchor_id') ? ' id="' . get_sub_field('anchor_id') . '""' :  false); ?>>
    <div class="container container-gutter">
    	<<?php echo $markup;?> class="button-links-headline">
    		<?php the_sub_field('headline'); ?>
    	</<?php echo $markup;?>>
    	<?php if(get_sub_field('text')) { ?>
    		<div class="button-links-content">
		        <?php the_sub_field('text'); ?>
	        </div>
    	<?php } ?>
    	<div class="button-links-buttons">
    		<?php if(have_rows('buttons')) {
    			while(have_rows('buttons')) { 
    				the_row(); ?>
    				<a href="<?php echo get_sub_field('button')['url']; ?>" target="<?php echo get_sub_field('button')['target']; ?>" class="btn-links"><?php echo get_sub_field('button')['title']; ?></a>
    			<?php }
    		} ?>
    	</div>
    </div>
</section>
