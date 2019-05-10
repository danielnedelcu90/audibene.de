<?php
/**
 * The header request for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package audibene
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<?php
	$pushengage = get_field( 'go_pushengage_content', 'option');
	if ( $pushengage['pushengage_code'] ) {
//            echo '<script src="' . $pushengage['worker_script'] . '"></script>';
		echo $pushengage['pushengage_code'];
	}
	$sessionlayer = get_field( 'go_sessionlayer_content', 'option');
	if ( $sessionlayer['script'] ) {
		echo $sessionlayer['script'];
	}
	?>
</head>

<body <?php body_class('request-page'); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header-request">
		<div class="header-request-branding">
            <div class="header-request-logo">
                <img src="<?php echo get_field( 'go_hrs_header_logo', 'option')['url']; ?>" alt="<?php echo get_field( 'go_hrs_header_logo', 'option')['alt']; ?>">
            </div>
            <div class="header-request-seals">
                <?php if( have_rows('go_hrs_seals', 'option') ): ?>

                    <div class="header-request-seal-wrapper">

                        <?php while( have_rows('go_hrs_seals', 'option') ): the_row(); ?>

                            <div class="header-request-seal-img">
                                <?php if( get_sub_field('link') ): ?>
                                    <a href="<?php echo get_sub_field('link')['url']; ?>" title="<?php echo get_sub_field('link')['title']; ?>">
                                        <img src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('image')['alt']; ?>">
                                    </a>
                                <?php else: ?>
                                    <img src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('image')['alt']; ?>">
                                <?php endif; ?>
                            </div>

                        <?php endwhile; ?>

                    </div>

                <?php endif; ?>
            </div>
            <div class="header-request-contact">
                <div class="header-request-phonenumber">
                    <div class="header-request-phonenumber-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 121 121" style="fill:#f07700;"><path d="M96.8 81L82.6 69.4c-.7-.6-2.2-1-3.1 0l-2.9 2.9 18.3 14.9 2.4-2.9c.5-1.2.3-2.6-.5-3.3zM55.2 65.7c-5-5.1-8.6-9.8-9.9-11.4-1.8-2.6-1.6-3.3-.7-4.9.6-1.2 1-1.7 1.6-2.4l-15-18.5c-1.4 1.5-3.3 4-4.8 6.7-1.6 2.9-2.9 6.2-3.1 8.4 3.1 8 11 22.2 21.4 32.6 10.4 10.4 24.6 18.3 32.6 21.4 2.2-.2 5.4-1.5 8.4-3.1 2.7-1.5 5.3-3.4 6.7-4.8l-18.5-15c-.7.6-1.3 1-2.4 1.6-1.7.9-2.4 1.1-4.9-.7-1.6-1.2-6.2-4.9-11.4-9.9zM40 24.2c-.7-.7-2.1-1-3.3-.5l-2.9 2.4 14.9 18.3 2.9-2.9c1-.9.6-2.3 0-3.1L40 24.2z"/><path d="M60.5 3C92.2 3 118 28.8 118 60.5S92.2 118 60.5 118 3 92.2 3 60.5 28.8 3 60.5 3m0-3C27.1 0 0 27.1 0 60.5S27.1 121 60.5 121 121 93.9 121 60.5 93.9 0 60.5 0z"/></svg>
                    </div>
                    <div class="header-request-phonenumber-txt">
                        <?php echo get_field( 'go_hrs_phone_number', 'option'); ?>
                    </div>
                </div>
                <div class="header-request-phonehours">
                    <?php echo get_field( 'go_hrs_phone_hours', 'option'); ?>
                </div>
            </div>
		</div>
	</header>

	<div id="content" class="site-content">
