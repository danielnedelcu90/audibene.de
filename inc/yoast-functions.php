<?php
/**
 * Implementation of yoast functions
 */

function audibene_yst_wpseo_change_og_locale( $locale ) {

	$iso_code = get_blog_option( get_current_blog_id(), 'audibene_hreflang_iso_code');

	if ( $iso_code == 'de-de' ) {
		$locale = 'de_DE';
	} elseif ( $iso_code == 'de-ch' ) {
		$locale = 'de_CH';
	} elseif ( $iso_code == 'fr-fr' ) {
		$locale = 'fr_FR';
	} elseif ( $iso_code == 'nl-nl' ) {
		$locale = 'nl_NL';
	} elseif ( $iso_code == 'fr-ch' ) {
		$locale = 'fr_CH';
	} elseif ( $iso_code == 'en-US' ) {
		$locale = 'en_US';
	} elseif ( $iso_code == 'en-ca' ) {
		$locale = 'en_CA';
	} elseif ( $iso_code == 'ko-kr' ) {
		$locale = 'ko_KR';
	} elseif ( $iso_code == 'en-my' ) {
		$locale = 'en_MY';
	} elseif ( $iso_code == 'en-in' ) {
		$locale = 'en_IN';
	}

	return $locale;
}
add_filter( 'wpseo_locale', 'audibene_yst_wpseo_change_og_locale' );