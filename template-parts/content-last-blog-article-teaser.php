<?php
/**
 * Template part for displaying last blog article teaser
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package audibene
 */
?>

<section class="<?php displayClass(); ?> subcategory-teaser-section">
    <div class="container container-item-gutter">
        <h2 class="section-headline subcategory-teaser-headline center">
		    <?php echo __('Latest blog articles','audibene'); ?>
        </h2>
        <?php

//        print_r($offset);

        $args = array(
	        'post_type'      => 'page',
	        'orderby'        => 'date',
	        'order'          => 'ASC',
	        'posts_per_page' => 4,
	        'meta_query' => array(
		        'relation' => 'AND',
		        array(
			        'key' => '_wp_page_template',
			        'value' => 'blog_article_page.php',
			        'compare' => 'LIKE'
		        )
	        )
        );

        $child_pages = new WP_Query( $args );

        if ( $child_pages->have_posts() ) : ?>

	        <?php while ( $child_pages->have_posts() ) : $child_pages->the_post(); ?>

                <?php $teaser_group = get_field('teaser', get_the_ID()); ?>

                <div class="subcategory-teaser-item">

                    <div class="subcategory-teaser-wrapper">

	                    <?php if ($teaser_group['image']) { ?>
                            <a href="<?php echo get_permalink(); ?>" class="subcategory-teaser-img lazy-load">
                                <img data-src="<?php echo $teaser_group['image']['url']; ?>" alt="<?php echo $teaser_group['image']['alt']; ?>" >
                            </a>
                        <?php } ?>

                        <div class="subcategory-teaser-content">

	                        <?php if ($teaser_group['headline']) { ?>
                                <<?php echo ($teaser_group['headline_markup_markup'] ? $teaser_group['headline_markup_markup'] : 'div'); ?> class="subcategory-teaser-headline">
                                    <?php echo $teaser_group['headline']; ?>
                                </<?php echo ($teaser_group['headline_markup_markup'] ? $teaser_group['headline_markup_markup'] : 'div'); ?>>
                            <?php } else { ?>
                                <h2 class="subcategory-teaser-headline"><?php echo get_the_title(); ?></h2>
                            <?php } ?>

                            <div class="subcategory-teaser-copy">
                                <?php echo $teaser_group['copy']; ?>
                            </div>

                            <a href="<?php echo get_permalink(); ?>" class="subcategory-teaser-more">
	                            <?php echo __('Read more','audibene'); ?>
                            </a>


                        </div>

                    </div>

                </div>

	        <?php endwhile; wp_reset_postdata(); ?>

        <?php endif; ?>
    </div>
</section>
