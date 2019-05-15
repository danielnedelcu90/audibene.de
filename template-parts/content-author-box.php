<?php
/**
 * Template part for displaying author box content in content_page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package audibene
 */
?>

<?php
$author_id = get_the_author_meta('ID');
$author_badge = get_field('author', 'user_'. $author_id ); ?>


<section class="author-box-section <?php displayClass(); ?>">
    <div class="container container-gutter">
        <div class="author-box-content">

            <div class="author-box-wrapper">

                <?php if ( $author_badge['avatar']['url'] ) { ?>

                    <div class="author-box-img" style="background-image: url(<?php echo $author_badge['avatar']['url']; ?>);"></div>

                <?php } ?>

                <div class="author-box-meta">
                    <div class="author-box-head">
                        <div class="author-box-written-by">
                            <?php echo __('Written by','audibene'); ?>:
                        </div>
                        <div class="author-box-name">
                            <?php echo get_the_author_meta('first_name'). ' '. get_the_author_meta('last_name'); ?>
                        </div>
                    </div>
                    <div class="author-box-bio">
                        <?php echo get_the_author_meta('description'); ?>
                    </div>
                    <div class="author-box-more">
                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author">
                            <?php echo __('More articles from author','audibene') . " »" ?>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
