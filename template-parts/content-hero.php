<?php
/**
 * Template part for displaying hero content in content_page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package audibene
 */
?>

<style>
    @media only screen and ( max-width: 748px ) {
        .hero-section {
            background-image: url(<?php echo get_sub_field('background_image_mobile')['url']; ?>);
        }
    }
    @media only screen and ( min-width: 749px ) {
        .hero-section {
            background-image: url(<?php echo get_sub_field('background_image_desktop')['url']; ?>);
        }
    }
</style>

<section class="<?php displayClass(); ?> hero-section"<?php echo (get_sub_field('anchor_id') ? ' id="' . get_sub_field('anchor_id') . '""' :  false); ?>>
    <?php if(!is_front_page()) { ?>
        <section class="breadcrumb-section">
            <div class="breadcrumb-container">
                <div class="breadcrumb-wrapper">
                    <?php audibene_breadcrumbs(); ?>
                </div>
            </div>
        </section> 
    <?php } ?>
    <div class="container container-item-gutter">
        <div class="hero-wrapper">
            <<?php echo (get_sub_field('headline_markup_markup') ? get_sub_field('headline_markup_markup') : 'div'); ?> class="section-headline headline-hero">
                <?php echo get_sub_field('headline'); ?>
            </<?php echo (get_sub_field('headline_markup_markup') ? get_sub_field('headline_markup_markup') : 'div'); ?>>
	        <?php if ( get_sub_field('image_mobile')['url'] || get_sub_field('image_desktop')['url'] ) { ?>
                <div class="hero-image">
                    <div class="hero-image-mobile lazy-load">
                        <img data-src="<?php echo get_sub_field('image_mobile')['url']; ?>" alt="<?php echo get_sub_field('image_mobile')['alt']; ?>" height="<?php echo get_sub_field('image_mobile')['height']; ?>" width="<?php echo get_sub_field('image_mobile')['width']; ?>">
                    </div>
                    <div class="hero-image-desktop lazy-load">
                        <img data-src="<?php echo get_sub_field('image_desktop')['url']; ?>" alt="<?php echo get_sub_field('image_desktop')['alt']; ?>" height="<?php echo get_sub_field('image_desktop')['height']; ?>" width="<?php echo get_sub_field('image_desktop')['width']; ?>">
                    </div>
                </div>
	        <?php } ?>
        </div>
    </div>
</section>
