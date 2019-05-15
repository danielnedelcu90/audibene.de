<?php
/**
 * Template part for displaying headline and copy content in content_page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package audibene
 */
?>

<section class="<?php displayClass(); ?> rating-section<?php echo (get_sub_field('section_arrow_section_arrow') !== 'off' ? ' section-arrow-' . get_sub_field('section_arrow_section_arrow') : false); ?><?php echo (get_sub_field('section_space_top_section_space_top') !== 'off' ? ' section-space-top' : false); ?><?php echo (get_sub_field('section_space_bottom_section_space_bottom') !== 'off' ? ' section-space-bottom' : false); ?> <?php if(get_sub_field('side_quote')) {echo 'side-quote'; } ?>"<?php echo (get_sub_field('anchor_id') ? ' id="' . get_sub_field('anchor_id') . '""' :  false); ?>>

    <div class="container container-gutter">
        <div class="rating-content">
            <div class="rating-headline">
                <?php echo get_field('go_fs_rating_column', 'option')['rating_headline']; ?>
            </div>
            <div class="section-rating-container">
                <?php

                $post_id = get_the_ID();

                $star_1 = (int) get_post_meta( $post_id, 'audibene_rating_1_star', true );
                $star_2 = (int) get_post_meta( $post_id, 'audibene_rating_2_stars', true);
                $star_3 = (int) get_post_meta( $post_id, 'audibene_rating_3_stars', true );
                $star_4 = (int) get_post_meta( $post_id, 'audibene_rating_4_stars', true );
                $star_5 = (int) get_post_meta( $post_id, 'audibene_rating_5_stars', true );

                $ratings = ($star_1+$star_2+$star_3+$star_4+$star_5);

                if ( $ratings ) {
                    $rating = number_format((float)(1*$star_1+2*$star_2+3*$star_3+4*$star_4+5*$star_5) / ($star_1+$star_2+$star_3+$star_4+$star_5), 2, '.', '');
                } else {
                    $rating = 0;
                }
                ?>
                <?php for ($i=0; $i < 5; $i++) { ?>

                    <?php
                    if ($rating <= $i ) {
                        // empty stars are displayed when the iterator (i) is >= the star value
                        $rating_css = false;
                    } elseif ($rating <= $i + 0.5) {
                        // half stars are displayed for star values between i and i+0.5
                        $rating_css = ' half';
                    } else {
                        // whole stars are displayed when the star value is > i+0.5
                        $rating_css = ' full';
                    }
                    ?>

                    <div class="rank-container<?php echo $rating_css;  ?>">
                        <div class="rank-half"></div>
                        <div class="rank-half"></div>
                    </div>
                <?php } ?>
            </div>
            <div class="section-rating-txt aggregateRating" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                <?php
                printf( __( '<span class="rating-count" itemprop="ratingCount">%1$s</span> ratings with <span class="rating-value" itemprop="ratingValue">%2$s</span> between <span class="worst-rating" itemprop="worstRating">1</span> to <span class="best-rating" itemprop="bestRating">5</span> stars',
                    'audibene' ), $ratings, $rating );
                ?>
            </div>
        </div>
    </div>
</section>

