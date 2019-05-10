<?php
/**
 * The template for displaying the footer request
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package audibene
 */

?>

	</div>

	<footer id="colophon" class="site-request-footer">
		<div class="footer-request-branding fgs-content-wrapper">

	            <?php if( have_rows('go_frs_links', 'option') ): ?>
		            <?php while( have_rows('go_frs_links', 'option') ): the_row(); ?>

                                <a href="<?php echo get_sub_field('link')['url']; ?>" title="<?php echo get_sub_field('link')['title']; ?>">
		                            <?php echo get_sub_field('link')['title']; ?>
                                </a>

		            <?php endwhile; ?>
	            <?php endif; ?>

		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
