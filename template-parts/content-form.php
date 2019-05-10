<?php
/**
 * Template part for displaying form in request_page.php
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

<section class="form-section"<?php echo (get_sub_field('anchor_id') ? ' id="' . get_sub_field('anchor_id') . '""' :  false); ?>>
    <div class="container container-gutter">
        <div class="form-wrapper">

            <?php if( have_rows( 'forms', 'option' ) ): ?>

                <?php while( have_rows( 'forms', 'option' ) ): the_row(); ?>

                    <?php if ( get_sub_field( 'unique_id' ) ==  $go_form_script ): ?>

			            <?php echo get_sub_field( 'form_script' ); ?>

                    <?php endif; ?>

                <?php endwhile; ?>

            <?php endif; ?>

        </div>
    </div>
</section>
