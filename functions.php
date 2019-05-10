<?php
/**
 * audibene functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package audibene
 */

if ( ! function_exists( 'audibene_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function audibene_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on audibene, use a find and replace
		 * to change 'audibene' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'audibene', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
//		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
//		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header' => esc_html__( 'Primary', 'audibene' ),
        ) );
	}
endif;
add_action( 'after_setup_theme', 'audibene_setup' );

/**
 * Enqueue scripts and styles.
 */
function audibene_scripts() {
    wp_enqueue_style( 'audibene-style', get_stylesheet_uri(), array(), filemtime( get_stylesheet_directory() . '/style.css' ), 'all' );
//    wp_enqueue_script( 'audibene-session-layer', 'https://session.cdn.audibene.net/sessionLayer.js' );
    wp_enqueue_script( 'audibene-jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), '3.3.1', true );
    wp_enqueue_script( 'audibene-default', get_template_directory_uri() . '/js/default.min.js', array(), filemtime( get_stylesheet_directory() . '/js/default.min.js' ), true );

	wp_localize_script( 'audibene-default', 'audibene', array(
		'post_id' => get_the_ID(),
		'network_site_url' => get_site_url(),
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'rating_alert' => __('You have already submitted a rating.','audibene'),
		'rating_success' => __('Thank you for your rating.','audibene')
	) );

}
add_action( 'wp_enqueue_scripts', 'audibene_scripts' );

/**
 * Add script loader tags.
 */
//function audibene_script_attributes( $tag, $handle, $src ) {
////    if ( 'audibene-session-layer' === $handle ) {
////        $tag = '<script src="' . esc_url( $src ) . '" id="SessionLayer" data-locale="de_DE" data-gtmid="GTM-TD2WTW7"></script>';
////    }
////
////    return $tag;
////}
////add_filter( 'script_loader_tag', 'audibene_script_attributes', 10, 3 );

/**
 * Add legalconsent script to footer.
 */
function audibene_legalconsent_script() {

	$legalConsent = get_field( 'go_legalconsent_content', 'option');
	if ( $legalConsent['script'] ) {
		?>
		<script type="text/javascript">
			<?php echo $legalConsent['script']; ?>
		</script>
		<?php
	}
}
add_action( 'wp_footer', 'audibene_legalconsent_script' );

/**
 * Add successpage script to footer.
 */
function audibene_successpage_script() {

	$successPage = get_field( 'go_successpage_content', 'option');
	if ( $successPage['script'] ) {
		?>
		<script type="text/javascript">
            <?php echo $successPage['script']; ?>
		</script>
		<?php
	}
}
add_action( 'wp_footer', 'audibene_successpage_script' );



/**
 * Remove custom css from theme customize
 */
function audibene_customize_register( $wp_customize )
{
    $wp_customize->remove_section('custom_css');
}
add_action( 'customize_register', 'audibene_customize_register' );

/**
 * Enable pagination for author page
 */
function modify_product_cat_query( $query ) {
	if ( $query->is_main_query() && $query->is_author() ) {
		$query->set( 'posts_per_page', 15 );
		$query->set( 'post_type', 'page' );
	}
}
add_action( 'pre_get_posts', 'modify_product_cat_query' );

/**
 * Add class to pagination links
 * https://css-tricks.com/snippets/wordpress/add-class-to-links-generated-by-next_posts_link-and-previous_posts_link/
 */
function audibene_pagination_prev() {
	return 'class="pagination-prev"';
}
add_filter('previous_posts_link_attributes', 'audibene_pagination_prev');

function audibene_pagination_next() {
	return 'class="pagination-next"';
}
add_filter('next_posts_link_attributes', 'audibene_pagination_next');

/**
 * Implement coudfront country redirect.
 */
//require get_template_directory() . '/inc/cloudfront-country-redirect.php';

/**
 * Implement site rating.
 */
require get_template_directory() . '/inc/rating.php';

/**
 * Implement nav walker.
 */
require get_template_directory() . '/inc/nav-walker-sm.php';
require get_template_directory() . '/inc/nav-walker-md.php';

/**
 * Implement remove scripts from head functions.
 */
require get_template_directory() . '/inc/wp-remove-scripts.php';

/**
 * Implement the admin functions.
 */
require get_template_directory() . '/inc/wp-backend-config.php';

/**
 * Implement the admin functions.
 */
require get_template_directory() . '/inc/admin-functions.php';

/**
 * Implement the acf functions.
 */
require get_template_directory() . '/inc/acf-functions.php';

/**
 * Implement the yoast functions.
 */
//require get_template_directory() . '/inc/yoast-functions.php';

/**
 * Implement breadcrumb.
 */
require get_template_directory() . '/inc/breadcrumb.php';

//echo '<pre>';
//print_r($field_rating_count);
//echo '</pre>';