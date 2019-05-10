<?php
/**
 * Template Name: Author Page
 *
 * @package audibene
 */

get_header(); ?>

<?php
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
$author_data = get_userdata(intval($author));
?>

	<section class="subcategory-teaser-section">
		<div class="container container-item-gutter">

			<h2 class="section-headline subcategory-teaser-headline center">
				<?php echo __('All articles written by','audibene'); ?> <?php echo $author_data->display_name; ?>
			</h2>

			<?php

			$count = 15;
			$paged = get_query_var('paged') ? get_query_var('paged') : 1;
			$offset = ($paged - 1) * $count;

			//        print_r($offset);

			$args = array(
				'post_type'      => 'page',
				'posts_per_page' => $count,
				'paged'          => $paged,
				'offset'         => $offset,
				'author'    => $author_data->ID,
				'orderby'        => 'date',
				'order'          => 'ASC',
//				'meta_query' => array(
//					'relation' => 'AND',
//					array(
//						'key' => '_wp_page_template',
//						'value' => 'blog_article_page.php',
//						'compare' => 'LIKE'
//					)
//				)
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

					<div class="subcategory-teaser-content<?php echo ($teaser_group['image'] ? false : ' no-image') ?>">

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

		<?php

		$prev_link = get_previous_posts_link('<svg viewBox="0 0 22 11" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.41421"><path d="M.75 0a.68.68 0 0 1 .525.225l9.525 8.7 9.525-8.7a.901.901 0 0 1 1.05 0c.3.225.3.675 0 .9l-10.05 9.15a.901.901 0 0 1-1.05 0L.225 1.125a.563.563 0 0 1 0-.9C.45.075.6 0 .75 0z" fill="#265da5" fill-rule="nonzero"></path></svg>', $child_pages->max_num_pages);
		$next_link = get_next_posts_link('<svg viewBox="0 0 22 11" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.41421"><path d="M.75 0a.68.68 0 0 1 .525.225l9.525 8.7 9.525-8.7a.901.901 0 0 1 1.05 0c.3.225.3.675 0 .9l-10.05 9.15a.901.901 0 0 1-1.05 0L.225 1.125a.563.563 0 0 1 0-.9C.45.075.6 0 .75 0z" fill="#265da5" fill-rule="nonzero"></path></svg>', $child_pages->max_num_pages);

		if ($prev_link || $next_link) {

			echo '<div class="pagination">';
			if ($prev_link){
				echo $prev_link;
			}
			if ($next_link){
				echo $next_link;
			}
			echo '</div>';
		}

		?>

		<?php endif; ?>
		</div>
	</section>

<?php
get_footer();