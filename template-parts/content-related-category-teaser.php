<?php
/**
 * Template part for displaying related category teaser content in content_page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package audibene
 */
?>

<?php

$teaser = false;

if ( get_field('related_category_teaser') !== 'off') {

	if ( get_field('related_category_teaser') == 'global' ) {

		$teaser = get_field('go_related_category_teaser');

		if( have_rows( 'related_category_teaser', 'option' ) ):

            while( have_rows( 'related_category_teaser', 'option' ) ): the_row();

                if ( get_sub_field( 'unique_id' ) ==  $teaser ):

	                $teaser = array(
	                  'headline' => get_sub_field( 'headline' ),
	                  'teaser' => get_sub_field( 'teaser' ),
	                  'more_link' => get_sub_field( 'more_link' )
                    );

                    break;

                endif;

            endwhile;

        endif;

	} elseif ( get_field('related_category_teaser') == 'manually' ) {

		$teaser = get_field('manually_teaser');

	} else {

	    $teaser = false;

    }

}

?>

<?php if ( $teaser['teaser'] ) { ?>
    <section class="related-category-teaser-section">
    <div class="container container-item-gutter">
        <div class="related-category-teaser-headline">
            <?php echo $teaser['headline']; ?>
        </div>

        <div class="related-category-teaser-wrapper">

            <?php foreach ( $teaser['teaser'] as $item ) { ?>

	            <?php $teaser_group = get_field('teaser', $item['link']); ?>

                <a href="<?php echo get_permalink($item['link']); ?>" class="related-category-teaser-item">

                    <div class="related-category-teaser-img lazy-load">
                        <img data-src="<?php echo $teaser_group['image']['url']; ?>" alt="<?php echo $teaser_group['image']['alt']; ?>">
                    </div>
                    <div class="related-category-teaser-title">
	                    <?php echo get_the_title($item['link']); ?>
                    </div>

                </a>

            <?php } ?>

        </div>
        <?php if ($teaser['more_link']) { ?>
            <div class="related-category-teaser-more-wrapper">
                <a href="<?php echo $teaser['more_link']['url']; ?>" target="<?php echo $teaser['more_link']['target']; ?>" class="related-category-teaser-more">

                    <?php echo $teaser['more_link']['title']; ?>

                </a>
            </div>
        <?php } ?>
    </div>
</section>
<?php } ?>
