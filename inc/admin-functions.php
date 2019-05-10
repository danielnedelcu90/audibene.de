<?php
/**
 * Implementation of admin functions
 */

/*
 * Edit user roles
 */

/**
 * Enable unfiltered_html capability for Editors.
 *
 * @param  array  $caps    The user's capabilities.
 * @param  string $cap     Capability name.
 * @param  int    $user_id The user ID.
 * @return array  $caps    The user's capabilities, with 'unfiltered_html' potentially added.
 */
function audibene_add_unfiltered_html_capability_to_roles( $caps, $cap, $user_id ) {
	if ( 'unfiltered_html' === $cap && user_can( $user_id, 'wpseo_manager' ) ) {

		$caps = array( 'unfiltered_html' );

	} elseif ( 'unfiltered_html' === $cap && user_can( $user_id, 'editor' ) ) {

		$caps = array( 'unfiltered_html' );

	}
	return $caps;
}
add_filter( 'map_meta_cap', 'audibene_add_unfiltered_html_capability_to_roles', 1, 3 );
