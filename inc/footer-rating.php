<?php
/**
 * Rating
 *
 * @package audibene
 */

function audibene_rating_fields(){
	global $pagenow;

	if( 'site-info.php' == $pagenow || 'site-new.php' == $pagenow ) {

		if (ctype_digit($_GET['id'])) {
			$blog_id = $_GET['id'];
		} else {
			$blog_id = false;
		}

		?><table><tr id="audibene_rating_1_star">
				<th scope="row">Rating 1 Star</th>
				<td><input type="number" name="blog[audibene_rating_1_star]" value="<? echo (get_blog_option( $blog_id, 'audibene_rating_1_star', false ) ? get_blog_option( $blog_id, 'audibene_rating_1_star', false ) : false); ?>"/></td>
			</tr></table>
		<table><tr id="audibene_rating_2_stars">
				<th scope="row">Rating 2 Stars</th>
				<td><input type="number" name="blog[audibene_rating_2_stars]" value="<? echo (get_blog_option( $blog_id, 'audibene_rating_2_stars', false ) ? get_blog_option( $blog_id, 'audibene_rating_2_stars', false ) : false); ?>"/></td>
			</tr></table>
		<table><tr id="audibene_rating_3_stars">
				<th scope="row">Rating 3 Stars</th>
				<td><input type="number" name="blog[audibene_rating_3_stars]" value="<? echo (get_blog_option( $blog_id, 'audibene_rating_3_stars', false ) ? get_blog_option( $blog_id, 'audibene_rating_3_stars', false ) : false); ?>"/></td>
			</tr></table>
		<table><tr id="audibene_rating_4_stars">
				<th scope="row">Rating 4 Stars</th>
				<td><input type="number" name="blog[audibene_rating_4_stars]" value="<? echo (get_blog_option( $blog_id, 'audibene_rating_4_stars', false ) ? get_blog_option( $blog_id, 'audibene_rating_4_stars', false ) : false); ?>"/></td>
			</tr></table>
		<table><tr id="audibene_rating_5_stars">
				<th scope="row">Rating 5 Stars</th>
				<td><input type="number" name="blog[audibene_rating_5_stars]" value="<? echo (get_blog_option( $blog_id, 'audibene_rating_5_stars', false ) ? get_blog_option( $blog_id, 'audibene_rating_5_stars', false ) : false); ?>"/></td>
			</tr></table>
		<script>jQuery(function($){
                $('.form-table tbody').append($('#audibene_rating_1_star'));
               $('.form-table tbody').append($('#audibene_rating_2_stars'));
               $('.form-table tbody').append($('#audibene_rating_3_stars'));
               $('.form-table tbody').append($('#audibene_rating_4_stars'));
               $('.form-table tbody').append($('#audibene_rating_5_stars'));
            });</script><?php
	}
}
add_action('admin_footer', 'audibene_rating_fields');

function audibene_rating_save(){
	global $pagenow;
	if( 'site-info.php' == $pagenow && isset($_REQUEST['action']) && 'update-site' == $_REQUEST['action'] )
	{
		if ( isset( $_POST['blog']['audibene_rating_1_star'] ) ) {
			$new_field_value = $_POST['blog']['audibene_rating_1_star'];

			if( $new_field_value ){
				update_blog_option( $_POST['id'], 'audibene_rating_1_star', $new_field_value );
			}
		}

		if ( isset( $_POST['blog']['audibene_rating_2_stars'] ) ) {
			$new_field_value = $_POST['blog']['audibene_rating_2_stars'];

			if( $new_field_value ){
				update_blog_option( $_POST['id'], 'audibene_rating_2_stars', $new_field_value );
			}
		}

		if ( isset( $_POST['blog']['audibene_rating_3_stars'] ) ) {
			$new_field_value = $_POST['blog']['audibene_rating_3_stars'];

			if( $new_field_value ){
				update_blog_option( $_POST['id'], 'audibene_rating_3_stars', $new_field_value );
			}
		}

		if ( isset( $_POST['blog']['audibene_rating_4_stars'] ) ) {
			$new_field_value = $_POST['blog']['audibene_rating_4_stars'];

			if( $new_field_value ){
				update_blog_option( $_POST['id'], 'audibene_rating_4_stars', $new_field_value );
			}
		}

		if ( isset( $_POST['blog']['audibene_rating_5_stars'] ) ) {
			$new_field_value = $_POST['blog']['audibene_rating_5_stars'];

			if( $new_field_value ){
				update_blog_option( $_POST['id'], 'audibene_rating_5_stars', $new_field_value );
			}
		}
	}
}
add_action('admin_init', 'audibene_rating_save');

function rating_ajax_request() {
	global $wpdb;

	if ( isset($_REQUEST) ) {

		$rating = $_REQUEST['rating'];

		if ( $rating ) {

			$blog_id = get_current_blog_id();

			if ( $rating == 1 ) {

				$current_rating = get_blog_option( $blog_id, 'audibene_rating_1_star', false );
				update_blog_option( $blog_id, 'audibene_rating_1_star', $current_rating+1 );

			} else {

				$current_rating = get_blog_option( $blog_id, 'audibene_rating_' . $rating . '_stars', false );
				update_blog_option( $blog_id, 'audibene_rating_' . $rating . '_stars', $current_rating+1 );

			}

		}

		$blog_id = get_current_blog_id();

		$star_1 = get_blog_option( $blog_id, 'audibene_rating_1_star', false );
		$star_2 = get_blog_option( $blog_id, 'audibene_rating_2_stars', false );
		$star_3 = get_blog_option( $blog_id, 'audibene_rating_3_stars', false );
		$star_4 = get_blog_option( $blog_id, 'audibene_rating_4_stars', false );
		$star_5 = get_blog_option( $blog_id, 'audibene_rating_5_stars', false );

		$ratings = ($star_1+$star_2+$star_3+$star_4+$star_5);
		$rating = number_format((float)(1*$star_1+2*$star_2+3*$star_3+4*$star_4+5*$star_5) / ($star_1+$star_2+$star_3+$star_4+$star_5), 2, '.', '');

		$rating_result = array(
			'ratings'  => $ratings,
			'rating'       => $rating
		);

		wp_send_json($rating_result);

	}

	// Always die in functions echoing ajax content
	die();
}
add_action( 'wp_ajax_rating_ajax_request', 'rating_ajax_request' );
add_action( 'wp_ajax_nopriv_rating_ajax_request', 'rating_ajax_request' );
