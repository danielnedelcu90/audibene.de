<?php
/**
 * Rating
 *
 * @package audibene
 */

function audibene_rating_custom_box( $post ) {

	add_meta_box(
		'rating', // ID, should be a string.
		'Rating', // Meta Box Title.
		'audibene_rating_meta_box', // Your call back function, this is where your form field will go.
		'page', // The post type you want this to show up on, can be post, page, or custom post type.
		'side' // The placement of your meta box, can be normal or side.
	);

}
add_action( 'add_meta_boxes', 'audibene_rating_custom_box' );

function audibene_rating_meta_box( $post ) {

	wp_nonce_field( 'audibene_rating_nonce', 'rating_nonce' );
	$checkboxMeta = get_post_meta( $post->ID, 'audibene_rating_status', true );

	if ( $checkboxMeta == '' ) {
		$checkboxMeta = 'yes';
    }
	?>

    <p>
        <table>
            <tr>
                <td><input type="checkbox" name="audibene_rating_status" id="audibene_rating_status" value="yes" <?php if ( $checkboxMeta !== false ) checked( $checkboxMeta, 'yes' ); ?> /></td>
                <td width="3"></td>
                <td>Show Rating</td>
            </tr>
        </table>
    </p>
    <!--
    <p>
        <table>
            <tr>
                <td><label class="post-attributes-label" style="white-space: nowrap;">1 Star</label></td>
                <td width="9"></td>
                <td><input type="number" name="audibene_rating_1_star" id="audibene_rating_1_star" value="<?php echo get_post_meta( $post->ID, 'audibene_rating_1_star', true ); ?>" /></td>
            </tr>
            <tr>
                <td><label class="post-attributes-label" style="white-space: nowrap;">2 Stars</label></td>
                <td width="9"></td>
                <td><input type="number" name="audibene_rating_2_stars" id="audibene_rating_2_stars" value="<?php echo get_post_meta( $post->ID, 'audibene_rating_2_stars', true ); ?>" /></td>
            </tr>
            <tr>
                <td><label class="post-attributes-label" style="white-space: nowrap;">3 Stars</label></td>
                <td width="9"></td>
                <td><input type="number" name="audibene_rating_3_stars" id="audibene_rating_3_stars" value="<?php echo get_post_meta( $post->ID, 'audibene_rating_3_stars', true ); ?>" /></td>
            </tr>
            <tr>
                <td><label class="post-attributes-label" style="white-space: nowrap;">4 Stars</label></td>
                <td width="9"></td>
                <td><input type="number" name="audibene_rating_4_stars" id="audibene_rating_5_stars" value="<?php echo get_post_meta( $post->ID, 'audibene_rating_4_stars', true ); ?>" /></td>
            </tr>
            <tr>
                <td><label class="post-attributes-label" style="white-space: nowrap;">5 Stars</label></td>
                <td width="9"></td>
                <td><input type="number" name="audibene_rating_5_stars" id="audibene_rating_5_stars" value="<?php echo get_post_meta( $post->ID, 'audibene_rating_5_stars', true ); ?>" /></td>
            </tr>
        </table>
    </p>
    -->


<?php }


add_action( 'save_post', 'save_services_checkboxes' );
function save_services_checkboxes( $post_id ) {

	// Do nothing during a bulk edit
	if ( isset( $_REQUEST['bulk_edit'] ) )
		return;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	if ( ( isset ( $_POST['audibene_rating_nonce'] ) ) && ( ! wp_verify_nonce( $_POST['audibene_rating_nonce'], plugin_basename( __FILE__ ) ) ) )
		return;

	if ( ( isset ( $_POST['post_type'] ) ) && ( 'page' == $_POST['post_type'] )  ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

	}

	if( isset( $_POST[ 'audibene_rating_status' ] ) ) {

		update_post_meta( $post_id, 'audibene_rating_status', 'yes' );

	} else {

		update_post_meta( $post_id, 'audibene_rating_status', 'no' );

	}

//	update_post_meta( $post_id, 'audibene_rating_1_star', $_POST[ 'audibene_rating_1_star' ] );
//	update_post_meta( $post_id, 'audibene_rating_2_stars', $_POST[ 'audibene_rating_2_stars' ] );
//	update_post_meta( $post_id, 'audibene_rating_3_stars', $_POST[ 'audibene_rating_3_stars' ] );
//	update_post_meta( $post_id, 'audibene_rating_4_stars', $_POST[ 'audibene_rating_4_stars' ] );
//	update_post_meta( $post_id, 'audibene_rating_5_stars', $_POST[ 'audibene_rating_5_stars' ] );


}

function rating_ajax_request() {

	if ( isset($_REQUEST) ) {

		$rating = $_REQUEST['rating'];
		$post_id = $_REQUEST['post_id'];

		if ( $rating ) {

			if ( $rating == 1 ) {

				$current_rating = (int) get_post_meta( $post_id, 'audibene_rating_1_star', true );

				if ( $current_rating ) {
					update_post_meta( $post_id, 'audibene_rating_1_star', $current_rating+1 );
                } else {
					update_post_meta( $post_id, 'audibene_rating_1_star', 1 );
                }

			} else {

				$current_rating = (int) get_post_meta( $post_id, 'audibene_rating_' . $rating . '_stars', true );

				if ( $current_rating ) {
					update_post_meta( $post_id, 'audibene_rating_' . $rating . '_stars', $current_rating+1 );
				} else {
					update_post_meta( $post_id, 'audibene_rating_' . $rating . '_stars', 1 );
				}

			}

		}

		$star_1 = (int) get_post_meta( $post_id, 'audibene_rating_1_star', true  );
		$star_2 = (int) get_post_meta( $post_id, 'audibene_rating_2_stars', true  );
		$star_3 = (int) get_post_meta( $post_id, 'audibene_rating_3_stars', true  );
		$star_4 = (int) get_post_meta( $post_id, 'audibene_rating_4_stars', true  );
		$star_5 = (int) get_post_meta( $post_id, 'audibene_rating_5_stars', true  );

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
