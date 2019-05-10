<?php
/**
 * Template Name: Request Page
 *
 * @package audibene
 */

 get_header('request'); ?>

<?php
// check if the flexible content field has rows of data


if( have_rows( 'content' ) ):

    // loop through the rows of data
    while ( have_rows('content') ) : the_row();

        // check current row layout
	    if( get_row_layout() == 'form' ):

		    get_template_part( 'template-parts/content', 'form' );


        elseif( get_row_layout() == 'form_sidebar' ):

	        get_template_part( 'template-parts/content', 'form-sidebar' );


	    endif;

    endwhile;

else :

    // no layouts found

endif;

?>

 <?php get_footer('request'); ?>