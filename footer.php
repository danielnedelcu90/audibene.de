<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package audibene
 */

?>

	</div>

	<footer id="colophon" class="site-footer">
		<div class="footer-branding fgs-content-wrapper">

            <div class="footer-column footer-links">

                <?php if( have_rows('go_fs_links_column_1', 'option') ): ?>

                    <div class="footer-link-list">

                        <?php while( have_rows('go_fs_links_column_1', 'option') ): the_row(); ?>
                            <?php if( have_rows('links', 'option') ): ?>
                                <?php while( have_rows('links', 'option') ): the_row(); ?>

                                    <a href="<?php echo get_sub_field( 'link' )['url']; ?>" title="<?php echo get_sub_field( 'link' )['title']; ?>" target="<?php echo get_sub_field( 'link' )['target']; ?>" class="footer-link-item">
                                        <?php echo get_sub_field( 'link' )['title']; ?>
                                    </a>

                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>

                    </div>

                <?php endif; ?>

                <?php if( have_rows('go_fs_socials', 'option') ): ?>
                    <?php while( have_rows('go_fs_socials', 'option') ): the_row(); ?>

                        <div class="footer-socials fgs-content-wrapper">

                            <?php if (get_field('go_fs_socials', 'option')['socials_headline']) { ?>
                                <div class="footer-headline">
                                    <?php echo get_field('go_fs_socials', 'option')['socials_headline']; ?>
                                </div>
                            <?php } ?>

                            <?php if( have_rows('social') ): ?>
                                <div class="footer-socials-wrapper">
                                    <?php while( have_rows('social') ): the_row(); ?>

                                            <?php if( get_sub_field('link') ): ?>
                                                <a href="<?php echo get_sub_field('link')['url']; ?>" title="<?php echo get_sub_field('link')['title']; ?>">
                                                    <div class="footer-social lazy-load">
                                                        <img data-src="<?php echo get_sub_field('icon')['url']; ?>" alt="<?php echo get_sub_field('icon')['alt']; ?>" height="<?php echo get_sub_field('icon')['height']; ?>" width="<?php echo get_sub_field('icon')['width']; ?>">
                                                    </div>
                                                </a>
                                            <?php else: ?>
                                                <div class="footer-social lazy-load">
                                                    <img data-src="<?php echo get_sub_field('icon')['url']; ?>" alt="<?php echo get_sub_field('icon')['alt']; ?>" height="<?php echo get_sub_field('icon')['height']; ?>" width="<?php echo get_sub_field('icon')['width']; ?>">
                                                </div>
                                            <?php endif; ?>

                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>

                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>

            </div>

            <?php if( have_rows('go_fs_column_2', 'option') ): ?>

                <?php if( get_field('go_fs_column_2', 'option')['content'] == 'links' ): ?>

                            <?php while( have_rows('go_fs_column_2', 'option') ): the_row(); ?>
                                <?php if( have_rows('links', 'option') ): ?>

                                <div class="footer-column footer-links">

                                    <div class="footer-link-list">

                                        <?php while( have_rows('links', 'option') ): the_row(); ?>

                                        <a href="<?php echo get_sub_field( 'link' )['url']; ?>" title="<?php echo get_sub_field( 'link' )['title']; ?>" target="<?php echo get_sub_field( 'link' )['target']; ?>" class="footer-link-item">
                                            <?php echo get_sub_field( 'link' )['title']; ?>
                                        </a>

                                    <?php endwhile; ?>

                                    </div>

                                </div>

                                <?php else: ?>

                                    <div class="footer-column footer-column-empty"></div>

                                <?php endif; ?>
                            <?php endwhile; ?>

                <?php elseif( get_field('go_fs_column_2', 'option')['content'] == 'text' && get_field('go_fs_column_2', 'option')['text'] ): ?>

                    <div class="footer-column footer-links">

                        <div class="footer-link-text">
                            <?php echo get_field('go_fs_column_2', 'option')['text']; ?>
                        </div>

                    </div>

                <?php else: ?>

                    <div class="footer-column footer-column-empty"></div>

                <?php endif; ?>

            <?php endif; ?>

            <?php if( get_field('go_fs_phone_number', 'option') ): ?>

            <div class="footer-column footer-phone-number">
                <a href="<?php echo get_field('go_fs_phone_number', 'option')['url']; ?>" class="footer-phone-number-link">
                    <svg viewBox="0 0 56 56" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.41421"><path d="M55.125 43.161l-10.65-8.7c-.525-.45-1.65-.75-2.325 0l-2.175 2.175L53.7 47.811l1.8-2.175c.375-.9.225-1.95-.375-2.475zm-31.2-11.475c-3.75-3.825-6.45-7.35-7.425-8.55-1.35-1.95-1.2-2.475-.525-3.675.45-.9.75-1.275 1.2-1.8L5.925 3.786c-1.05 1.125-2.475 3-3.6 5.025-1.2 2.175-2.175 4.65-2.325 6.3 2.325 6 8.25 16.65 16.05 24.45 7.8 7.8 18.45 13.725 24.45 16.05 1.65-.15 4.05-1.125 6.3-2.325 2.025-1.125 3.975-2.55 5.025-3.6L37.95 38.436c-.525.45-.975.75-1.8 1.2-1.275.675-1.8.825-3.675-.525-1.2-.9-4.65-3.675-8.55-7.425zM12.525.561C12 .036 10.95-.189 10.05.186l-2.175 1.8L19.05 15.711l2.175-2.175c.75-.675.45-1.725 0-2.325l-8.7-10.65z" fill="#3a3a3a" fill-rule="nonzero"/></svg>
                    <?php echo get_field('go_fs_phone_number', 'option')['title']; ?>
                </a>
            </div>

            <?php endif; ?>

            <?php if( get_field('go_fs_rating_column', 'option') ): ?>

                <div class="footer-column footer-rating-column">

                    <?php if ( get_post_meta( get_the_ID(), 'audibene_rating_status', true ) !== 'no' ) { ?>

                        <div class="footer-headline">
                            <?php echo get_field('go_fs_rating_column', 'option')['rating_headline']; ?>
                        </div>
                        <div class="rating-container">
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
                        <p class="footer-rating-txt aggregateRating" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                            <?php
                            printf( __( '<span class="rating-count" itemprop="ratingCount">%1$s</span> ratings with <span class="rating-value" itemprop="ratingValue">%2$s</span> between <span class="worst-rating" itemprop="worstRating">1</span> to <span class="best-rating" itemprop="bestRating">5</span> stars',
                                'audibene' ), $ratings, $rating );
                            ?>
                        </p>

                    <?php } ?>
                </div>

            <?php endif; ?>

            <?php if( have_rows('go_fs_countries_column', 'option') ): ?>

            <div class="footer-column footer-countries">

                <div class="footer-headline">
                    <?php echo get_field( 'go_fs_countries_column', 'option' )['countries_headline']; ?>
                </div>

                <div class="footer-countries-wrapper">

                    <?php while( have_rows('go_fs_countries_column', 'option') ): the_row(); ?>
                        <?php if( have_rows('country_flags', 'option') ): ?>
                            <?php while( have_rows('country_flags', 'option') ): the_row(); ?>

                                <a href="<?php echo get_sub_field( 'link' )['url']; ?>" title="<?php echo get_sub_field( 'link' )['title']; ?>" target="<?php echo get_sub_field( 'link' )['target']; ?>" class="footer-countries-link">
                                    <img src="<?php echo get_sub_field( 'icon' )['url']; ?>" alt="<?php echo get_sub_field( 'icon' )['alt']; ?>" />
                                </a>

                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>

                </div>

            </div>

            <?php endif; ?>

		</div>

        <?php if( have_rows('go_fs_logo_line', 'option') ): ?>
            <?php while( have_rows('go_fs_logo_line', 'option') ): the_row(); ?>

            <div class="footer-logo-line fgs-content-wrapper">

                <?php if (get_field('go_fs_logo_line', 'option')['headline']) { ?>
                    <div class="footer-logo-line-headline">
                        <?php echo get_field('go_fs_logo_line', 'option')['headline']; ?>
                    </div>
                <?php } ?>

                <div class="footer-logo-line-img-wrapper">
                    <?php if( have_rows('logo_mobile') ): ?>
                        <?php while( have_rows('logo_mobile') ): the_row(); ?>

                            <?php if( get_sub_field('link') ): ?>
                                <a href="<?php echo get_sub_field('link')['url']; ?>" title="<?php echo get_sub_field('link')['title']; ?>" class="footer-logo-line-mobile">
                                    <div class="lazy-load">
                                        <img data-src="<?php echo get_sub_field('logo')['url']; ?>" alt="<?php echo get_sub_field('logo')['alt']; ?>" height="<?php echo get_sub_field('logo')['height']; ?>" width="<?php echo get_sub_field('logo')['width']; ?>"<?php echo (get_sub_field('logo')['height'] < 78 && get_sub_field('logo')['height'] !== 0) ? 'style="max-height:' . get_sub_field('logo')['height'] . 'px"' : false; ?>>
                                    </div>
                                </a>
                            <?php else: ?>
                                <div class="footer-logo-line-mobile lazy-load">
                                    <img data-src="<?php echo get_sub_field('logo')['url']; ?>" alt="<?php echo get_sub_field('logo')['alt']; ?>" height="<?php echo get_sub_field('logo')['height']; ?>" width="<?php echo get_sub_field('logo')['width']; ?>"<?php echo (get_sub_field('logo')['height'] < 78 && get_sub_field('logo')['height'] !== 0) ? 'style="height:' . get_sub_field('logo')['height'] . 'px"' : false; ?>>
                                </div>
                            <?php endif; ?>

                        <?php endwhile; ?>
                    <?php endif; ?>

                    <?php if( have_rows('logo_desktop') ): ?>
                        <?php while( have_rows('logo_desktop') ): the_row(); ?>

                            <?php if( get_sub_field('link') ): ?>
                                <a href="<?php echo get_sub_field('link')['url']; ?>" title="<?php echo get_sub_field('link')['title']; ?>" class="footer-logo-line-desktop">
                                    <div class="lazy-load">
                                        <img data-src="<?php echo get_sub_field('logo')['url']; ?>" alt="<?php echo get_sub_field('logo')['alt']; ?>" height="<?php echo get_sub_field('logo')['height']; ?>" width="<?php echo get_sub_field('logo')['width']; ?>"<?php echo (get_sub_field('logo')['height'] < 78 && get_sub_field('logo')['height'] !== 0) ? 'style="height:' . get_sub_field('logo')['height'] . 'px"' : false; ?>>
                                    </div>
                                </a>
                            <?php else: ?>
                                <div class="footer-logo-line-desktop lazy-load">
                                    <img data-src="<?php echo get_sub_field('logo')['url']; ?>" alt="<?php echo get_sub_field('logo')['alt']; ?>" height="<?php echo get_sub_field('logo')['height']; ?>" width="<?php echo get_sub_field('logo')['width']; ?>"<?php echo (get_sub_field('logo')['height'] < 78 && get_sub_field('logo')['height'] !== 0) ? 'style="height:' . get_sub_field('logo')['height'] . 'px"' : false; ?>>
                                </div>
                            <?php endif; ?>

                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

            </div>

            <?php endwhile; ?>
        <?php endif; ?>
	</footer>
</div>
<a id="backToTop" class='back-to-top-btn'></a>

<?php wp_footer(); ?>

</body>
</html>
