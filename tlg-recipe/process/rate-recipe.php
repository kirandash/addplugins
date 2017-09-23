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

	// https://codex.wordpress.org/Plugin_API
	// https://developer.wordpress.org/reference/functions/do_action/
	do_action( 'recipe_rating', array(
		'id'		=> $post_id,
		'rating'	=> $rating,
		'ip'		=> $user_ip
	)); // Now any one can use add_action fn to hook into this hook

	$response['status']		= 2; // success status 
	// echo $response['status'];

	// die();
	wp_send_json( $response );
}