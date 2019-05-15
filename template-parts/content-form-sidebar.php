<?php
/**
 * Template part for displaying form sidebar in request_page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package audibene
 */
?>

<?php

// define go form script variable
$go_form_script = get_sub_field('go_form_script');

?>

<section class="<?php displayClass(); ?> form-sidebar-section"<?php echo (get_sub_field('anchor_id') ? ' id="' . get_sub_field('anchor_id') . '""' :  false); ?>>
    <div class="container container-gutter">
        <div class="form-sidebar-wrapper">
            <div class="form-sidebar-form">
	            <?php if( have_rows( 'forms', 'option' ) ): ?>

		            <?php while( have_rows( 'forms', 'option' ) ): the_row(); ?>

			            <?php if ( get_sub_field( 'unique_id' ) ==  $go_form_script ): ?>

				            <?php echo get_sub_field( 'form_script' ); ?>

			            <?php endif; ?>

		            <?php endwhile; ?>

	            <?php endif; ?>
            </div>
            <div class="form-sidebar-sidebar">
                <div class="form-sidebar-sidebar-headline">
	                <?php echo get_sub_field('request_title'); ?> <span><?php echo get_sub_field('request_time'); ?></span>
                </div>
                <div class="form-sidebar-sidebar-wrapper">
                    <div class="form-sidebar-checklist">
                        <ul class="form-sidebar-checklist-list">
	                    <?php while ( have_rows('checklist') ) : the_row(); ?>

                            <li class="form-sidebar-checklist-item">
                                <div class="form-sidebar-checklist-checker">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M20.285 2L9 13.567 3.714 8.556 0 12.272 9 21 24 5.715z"/></svg>
                                </div>
                                <?php echo get_sub_field('point'); ?>
                            </li>

	                    <?php endwhile; ?>
                        </ul>
                    </div>
                    <div class="form-sidebar-seals lazy-load">
                        <img data-src="<?php echo get_sub_field('seals_image')['url']; ?>" alt="<?php echo get_sub_field('seals_image')['alt']; ?>" height="<?php echo get_sub_field('seals_image')['height']; ?>" width="<?php echo get_sub_field('seals_image')['width']; ?>">
                    </div>
                    <div class="form-sidebar-client">
                        <div class="form-sidebar-client-wrapper">
                            <div class="form-sidebar-client-quote">
	                            <?php echo get_sub_field('client_quote'); ?>
                            </div>
                            <div class="form-sidebar-client-img-wrapper">
                                <div class="form-sidebar-client-img lazy-load">
                                    <img data-src="<?php echo get_sub_field('client_image')['url']; ?>" alt="<?php echo get_sub_field('client_image')['alt']; ?>" height="<?php echo get_sub_field('client_image')['height']; ?>" width="<?php echo get_sub_field('client_image')['width']; ?>">
                                </div>
                                <div class="form-sidebar-client-name">
	                                <?php echo get_sub_field('client_name'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
