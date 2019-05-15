<?php
/**
 * Implementation of acf functions
 */

if( function_exists('acf_add_options_page') ) {

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Header Settings',
        'menu_title'	=> 'Header'
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Footer Settings',
        'menu_title'	=> 'Footer'
    ));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Request Settings',
		'menu_title'	=> 'Header Request'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Request Settings',
		'menu_title'	=> 'Footer Request'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Forms',
		'menu_title'	=> 'Forms'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Related Category Teaser',
		'menu_title'	=> 'Related Category Teaser'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> '404 Page',
		'menu_title'	=> '404 Page'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'PushEngage',
		'menu_title'	=> 'PushEngage'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'SessionLayer',
		'menu_title'	=> 'SessionLayer'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Trustpilot',
		'menu_title'	=> 'Trustpilot'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'SuccessPage',
		'menu_title'	=> 'SuccessPage'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'LegalConsent',
		'menu_title'	=> 'LegalConsent'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Cookie Bar',
		'menu_title'	=> 'Cookie Bar'
	));

}

/**
 * Dynamically form field from option
 * https://www.advancedcustomfields.com/resources/dynamically-populate-a-select-fields-choices/
 */

function acf_load_go_form_script_field_choices( $field ) {

	// reset choices
	$field['choices'] = array();


	// if has rows
	if( have_rows('forms', 'option') ) {

		// while has rows
		while( have_rows('forms', 'option') ) {

			// instantiate row
			the_row();


			// vars
			$value = get_sub_field('unique_id');
			$label = get_sub_field('title');


			// append to choices
			$field['choices'][ $value ] = $label;

		}

	}


	// return the field
	return $field;

}
add_filter('acf/load_field/name=go_form_script', 'acf_load_go_form_script_field_choices');

function acf_load_go_related_category_teaser_field_choices( $field ) {

	// reset choices
	$field['choices'] = array();


	// if has rows
	if( have_rows('related_category_teaser', 'option') ) {

		// while has rows
		while( have_rows('related_category_teaser', 'option') ) {

			// instantiate row
			the_row();


			// vars
			$value = get_sub_field('unique_id');
			$label = get_sub_field('title');


			// append to choices
			$field['choices'][ $value ] = $label;

		}

	}


	// return the field
	return $field;

}
add_filter('acf/load_field/name=go_related_category_teaser', 'acf_load_go_related_category_teaser_field_choices');

/**
 * ACF saving and loading local json
 * https://www.advancedcustomfields.com/resources/local-json/
 */

function audibene_acf_json_save_point( $path ) {

    // update path
    $path = get_stylesheet_directory() . '/acf-json';


    // return
    return $path;

}
add_filter('acf/settings/save_json', 'audibene_acf_json_save_point');

function audibene_acf_json_load_point( $paths ) {

    // remove original path (optional)
    unset($paths[0]);


    // append path
    $paths[] = get_stylesheet_directory() . '/acf-json';


    // return
    return $paths;

}

add_filter('acf/settings/load_json', 'audibene_acf_json_load_point');

add_action('acf/register_fields', 'my_register_fields');

function bidirectional_acf_update_value( $value, $post_id, $field  ) {

	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;


	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;


	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;


	// loop over selected posts and add this $post_id
	if( is_array($value) ) {

		foreach( $value as $post_id2 ) {

			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);


			// allow for selected posts to not contain a value
			if( empty($value2) ) {

				$value2 = array();

			}


			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;


			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;


			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);

		}

	}


	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);

	if( is_array($old_value) ) {

		foreach( $old_value as $post_id2 ) {

			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;


			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);


			// bail early if no value
			if( empty($value2) ) continue;


			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);


			// remove
			unset( $value2[ $pos] );


			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);

		}

	}


	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;


	// return
	return $value;

}

add_filter('acf/update_value/name=related_posts', 'bidirectional_acf_update_value', 10, 3);


function displayClass() {
	if (get_sub_field('display_md')) {
		if (get_sub_field('display_md') == 'mobile') {
	        echo 'hide--desktop';
	    } else if (get_sub_field('display_md') == 'desktop') {
	        echo 'hide--mobile';
	    }
	}
}