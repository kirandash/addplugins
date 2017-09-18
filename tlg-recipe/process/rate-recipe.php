<?php 
function tlgr_rate_recipe() {
	/*print_r($_POST);
	die();*/
	global $wpdb;

	$response		= array( 'status'	=> 1 ); // failure status
	$post_id 		= absint($_POST['rid']);
	$rating		 	= round($_POST['rating'], 1);
	$user_ip		= $_SERVER['REMOTE_ADDR']; // get user's ip. This is optional but used for security purposes

	$rating_count = $wpdb->get_var("SELECT COUNT(*) FROM `" . $wpdb->prefix . "recipe_ratings` WHERE recipe_id='". $post_id ."' AND user_ip='".$user_ip."'");

	if($rating_count > 0){
		wp_send_json($response);
	} // Insert rating only once

	// Insert Rating
	$wpdb->insert(
		$wpdb->prefix . 'recipe_ratings', // table name
		array(
			'recipe_id'	=>	$post_id,
			'rating'	=>  $rating,
			'user_ip'	=>	$user_ip
		), // values
		array(
			'%d', '%f', '%s'
		)  // formats ( %s string, %d integer, %f float )
	);

	// Grab meta data
	$recipe_data	= get_post_meta( $post_id, 'recipe_data', true );
	$recipe_data['rating_count']++;
	$recipe_data['rating']	= round($wpdb->get_var("SELECT AVG(`rating`) FROM `" . $wpdb->prefix . "recipe_ratings` WHERE recipe_id='". $post_id ."'"), 1);

	// Update meta data
	update_post_meta( $post_id, 'recipe_data', $recipe_data );

	$response['status']		= 2; // success status 
	// echo $response['status'];

	// die();
	wp_send_json( $response );
}