<?php
/**
 * Implementation of plugin geoip detect
 */

function audibene_geoip_redirect(){

	if ( function_exists('geoip_detect2_get_info_from_current_ip') ) {
		$userInfo = geoip_detect2_get_info_from_current_ip();
		$countryCode = $userInfo->country->isoCode;

		echo $countryCode;
	}

	if (is_admin() || !function_exists('geoip_detect2_get_info_from_current_ip'))
		return;

	// This condition prevents a redirect loop:
	// Redirect only if the home page is called. Change this condition to the specific page or URL you need.
	if (!is_home())
		return;

	if (!function_exists('geoip_detect2_get_info_from_current_ip'))
		return;

	$userInfo = geoip_detect2_get_info_from_current_ip();
	$countryCode = $userInfo->country->isoCode;

	switch ($countryCode) {
		case 'DE':
			$url = 'https://www.audibene.de';
			break;
		case 'CH':
			$url = 'https://www.audibene.ch';
			break;
		case 'FR':
			$url = 'https://www.audibene.fr';
			break;
		case 'NL':
			$url = 'https://www.audibene.nl';
			break;
		case 'US':
			$url = 'https://www.hear.com';
			break;
		case 'CA':
			$url = 'https://www.hear.com/ca/';
			break;
		case 'KR':
			$url = 'https://www.hear.com/kr/';
			break;
		case 'MY':
			$url = 'https://www.hear.com/my/';
			break;
		case 'IN':
			$url = 'https://www.hear.com/in/';
			break;
		default:
			$url = get_site_url();
	}
	if ($url) {
		wp_redirect($url);
		exit;
	}
}
add_action('template_redirect', 'audibene_geoip_redirect', 5);