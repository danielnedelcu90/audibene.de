<?php
/**
 * Implementation of cloudfront country redirect
 */

function audibene_cloudfront_country_redirect(){

	if (is_admin() || is_user_logged_in())
		return;

	// This condition prevents a redirect loop:
	// Redirect only if the home page is called. Change this condition to the specific page or URL you need.
	if (!is_front_page())
		return;

	if ( isset( $_SERVER['HTTP_CLOUDFRONT_VIEWER_COUNTRY'] ) == false && get_blog_option( get_current_blog_id(), 'audibene_hreflang_iso_code' ) == false )
		return;

	$url = false;
	if ( isset( $_SERVER['HTTP_CLOUDFRONT_VIEWER_COUNTRY'] ) ) {

		$cf_viewer_country = $_SERVER['HTTP_CLOUDFRONT_VIEWER_COUNTRY'];
		$iso_code = get_blog_option( get_current_blog_id(), 'audibene_hreflang_iso_code');

		if ( $cf_viewer_country == 'CA' && $iso_code !== 'en-ca' ) {
			$url = 'https://www.hear.com/ca/';
		} elseif ( $cf_viewer_country == 'KR' && $iso_code !== 'ko-kr' ) {
			$url = 'https://www.hear.com/kr/';
		} elseif ( $cf_viewer_country == 'MY' && $iso_code !== 'en-my' ) {
			$url = 'https://www.hear.com/my/';
		} elseif ( $cf_viewer_country == 'IN' && $iso_code !== 'en-in' ) {
			$url = 'https://www.hear.com/in/';
		}

		if ( $url ) {
			wp_redirect( $url,302 );
			exit;
		}

	}

}
add_action('template_redirect', 'audibene_cloudfront_country_redirect', 5);
