<?php
/**
 * Implementation of cloudfront country redirect
 * https://gist.github.com/alexandermitsyk/67e9d2319d247ea635a90db9a1d0d428
 */

function audibene_get_cf_country_from_header( $header_name = null ) {

	$headervals="";
	$keys = array_keys($_SERVER);

	if (is_null($header_name)) {
		$headers = preg_grep("/^HTTP_(.*)/si", $keys);
	} else {
		$header_name_safe = str_replace("-", "_", strtoupper(preg_quote($header_name)));
		$headers = preg_grep("/^HTTP_${header_name_safe}$/si", $keys);
	}

	foreach( $headers as $header ) {

		if (is_null($header_name)) {
			$headervals[substr($header, 5) ] = $_SERVER[$header];
		} else {
			return $_SERVER[$header];
		}
	}

	return $headervals;
}

function audibene_geoip_redirect(){

	print_r( $_SERVER );
	print_r( $_SERVER['CloudFront-Viewer-Country'] );

	if (is_admin())
		return;

	// This condition prevents a redirect loop:
	// Redirect only if the home page is called. Change this condition to the specific page or URL you need.
	if (!is_home())
		return;

	$countryCode =  audibene_get_cf_country_from_header("CloudFront-Viewer-Country");

	echo $countryCode;

	if (!$countryCode)
		return;

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
