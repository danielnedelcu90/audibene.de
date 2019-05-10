<?php
/**
 * Page content part for content_page.php
 *
 * @package audibene
 */

if( have_rows( 'content' ) ):

	// loop through the rows of data
	while ( have_rows('content') ) : the_row();

		// check current row layout
		if( get_row_layout() == 'breadcrumb' ):

			//get_template_part( 'template-parts/content', 'breadcrumb' );

		elseif( get_row_layout() == 'hero' ):

			get_template_part( 'template-parts/content', 'hero' );

		elseif( get_row_layout() == 'hero_form' ):

			get_template_part( 'template-parts/content', 'hero-form' );

		elseif( get_row_layout() == 'product_form' ):

			get_template_part( 'template-parts/content', 'product-form' );

		elseif( get_row_layout() == 'copy_form' ):

			get_template_part( 'template-parts/content', 'copy-form' );

		elseif( get_row_layout() == 'quote' ):

			get_template_part( 'template-parts/content', 'quote' );

		elseif( get_row_layout() == 'double_offer' ):

			get_template_part( 'template-parts/content', 'double-offer' );

		elseif( get_row_layout() == 'table_of_contents' ):

			get_template_part( 'template-parts/content', 'table-of-contents' );

		elseif( get_row_layout() == 'two_column_copy_image' ):

			get_template_part( 'template-parts/content', 'two-column-copy-image' );

		elseif( get_row_layout() == 'image_copy_customer_voices' ):

			get_template_part( 'template-parts/content', 'image-copy-customer-voices' );

		elseif( get_row_layout() == 'two_column_headline_copy' ):

			get_template_part( 'template-parts/content', 'two-column-headline-copy' );

		elseif( get_row_layout() == 'two_column_copy_product' ):

			get_template_part( 'template-parts/content', 'two-column-copy-product' );

		elseif( get_row_layout() == 'three_column_steps' ):

			get_template_part( 'template-parts/content', 'three-column-steps' );

		elseif( get_row_layout() == 'four_column_usp' ):

			get_template_part( 'template-parts/content', 'four-column-usp' );

		elseif( get_row_layout() == 'headline' ):

			get_template_part( 'template-parts/content', 'headline' );

		elseif( get_row_layout() == 'copy' ):

			get_template_part( 'template-parts/content', 'copy' );

		elseif( get_row_layout() == 'headline_copy' ):

			get_template_part( 'template-parts/content', 'headline-copy' );

		elseif( get_row_layout() == 'teaser_cta' ):

			get_template_part( 'template-parts/content', 'teaser-cta' );

		elseif( get_row_layout() == 'cta' ):

			get_template_part( 'template-parts/content', 'cta' );

		elseif( get_row_layout() == 'fullscreen_image' ):

			get_template_part( 'template-parts/content', 'fullscreen-image' );

		elseif( get_row_layout() == 'memo' ):

			get_template_part( 'template-parts/content', 'memo' );

		elseif( get_row_layout() == 'html' ):

			get_template_part( 'template-parts/content', 'html' );

		elseif( get_row_layout() == 'subcategory_teaser' ):

			get_template_part( 'template-parts/content', 'subcategory-teaser' );

		elseif( get_row_layout() == 'author_box' ):

			get_template_part( 'template-parts/content', 'author-box' );

		elseif( get_row_layout() == 'last_blog_article_teaser' ):

			get_template_part( 'template-parts/content', 'last-blog-article-teaser' );

		endif;

	endwhile;

	// include related category teaser
	get_template_part( 'template-parts/content', 'related-category-teaser' );

else :

	// no layouts found

endif;
