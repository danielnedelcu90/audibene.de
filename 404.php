<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package audibene
 */

get_header();

$error_404 = get_field('go_404_content','option');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <section class="error-404-section"<?php echo (get_sub_field('anchor_id') ? ' id="' . get_sub_field('anchor_id') . '""' :  false); ?>>
                <div class="container container-item-gutter">
                    <div class="error-404-wrapper">

                        <<?php echo ($error_404['headline_markup_markup'] ? $error_404['headline_markup_markup'] : 'div'); ?> class="section-headline error-404-headline">
                            <?php echo $error_404['headline']; ?>
                        </<?php echo ($error_404['headline_markup_markup'] ? $error_404['headline_markup_markup'] : 'div'); ?>>

                        <div class="error-404-content-wrapper">

                            <div class="error-404-content-img lazy-load">
                                <img data-src="<?php echo $error_404['image']['url']; ?>" alt="<?php echo $error_404['image']['alt']; ?>" height="<?php echo $error_404['image']['height']; ?>" width="<?php echo $error_404['image']['width']; ?>">
                            </div>
                            <div class="error-404-content-copy">
	                            <?php echo $error_404['copy']; ?>
                            </div>
                            <div class="error-404-content-form">
                                <?php if( have_rows( 'forms', 'option' ) ): ?>

                                <?php while( have_rows( 'forms', 'option' ) ): the_row(); ?>

                                    <?php if ( get_sub_field( 'unique_id' ) ==  $error_404['go_form_script'] ): ?>

                                        <?php echo get_sub_field( 'form_script' ); ?>

                                    <?php endif; ?>

                                <?php endwhile; ?>

                            <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

		</main>
	</div>

<?php
get_footer();
