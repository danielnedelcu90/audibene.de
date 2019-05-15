<?php
/**
 * Template part for displaying headline and copy content in content_page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package audibene
 */
?>

<?php if (get_sub_field('create_accordion')) {
	$accHead = 'auditoggle ';
	$accInner = 'inner-acc ';
	if (in_array('mobile', get_sub_field('create_accordion'))) {
		$accHead = $accHead.'mobile ';
		$accInner = $accInner.'mobile ';
	}
	if (in_array('desktop', get_sub_field('create_accordion'))) {
		$accHead = $accHead.'desktop ';
		$accInner = $accInner.'desktop ';
	}
} 

	$markup = get_sub_field('headline_markup_markup') ? get_sub_field('headline_markup_markup') : 'div';

?>


<section class="<?php displayClass(); ?> headline-copy-section<?php echo (get_sub_field('section_arrow_section_arrow') !== 'off' ? ' section-arrow-' . get_sub_field('section_arrow_section_arrow') : false); ?><?php echo (get_sub_field('section_space_top_section_space_top') !== 'off' ? ' section-space-top' : false); ?><?php echo (get_sub_field('section_space_bottom_section_space_bottom') !== 'off' ? ' section-space-bottom' : false); ?> <?php if(get_sub_field('side_quote')) {echo 'side-quote'; } ?>"<?php echo (get_sub_field('anchor_id') ? ' id="' . get_sub_field('anchor_id') . '""' :  false); ?>>

    <div class="container container-gutter">
    	<?php if(get_sub_field('side_quote')) {echo '<div class="side-quote-left">';}
    	if (get_sub_field('headline')) { ?>
    		<<?php echo $markup; ?> class="section-headline headline-copy-headline <?php echo $accHead; ?>">
	            <?php echo get_sub_field('headline'); ?>
	        </<?php echo $markup; ?>>
    	<?php } ?>

        <div class="headline-copy-content <?php echo $accInner; ?>">
	        <?php echo get_sub_field('copy'); ?>
        </div>
        <?php if(get_sub_field('side_quote')) { ?>
        	</div>
        	<div class="side-quote-right">
		    	<div class="quote-head">
		    		<div class="quote-image" style="background-image:url(<?php echo get_sub_field('side_quote_image')['url']; ?>);">
			    	</div>
			    	<h4 class="quote-title"><?php the_sub_field('side_quote_headline'); ?></h4>
		    	</div>
		        <div class="quote-content">
			        <?php the_sub_field('side_quote_copy'); ?>
		        </div>
		    </div>
        <?php } ?>
    </div>
</section>
