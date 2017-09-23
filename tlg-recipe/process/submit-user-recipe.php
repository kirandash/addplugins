<?php
function tlgr_submit_user_recipe() {
	$response = array( 'status'	=> 1 );

	if( empty($_POST['ingredients']) || empty($_POST['time']) || empty($_POST['utensils']) || empty($_POST['level']) || empty($_POST['meal_type']) || empty($_POST['title']) ) {
		wp_send_json( $response ); // send response and also kill the script
	}

	$title 							= sanitize_text_field( $_POST['title'] ); // Input sanitization
	$content 						= wp_kses_post( $_POST['content'] ); // For sanitization of html tags - better to go for _post since it is only for post and saves us time instead of using wp_kses
	// https://codex.wordpress.org/Function_Reference/wp_kses_post
	// https://codex.wordpress.org/Function_Reference/wp_kses
	$recipe_data					= array();
	$recipe_data['ingredients'] 	= sanitize_text_field( $_POST['ingredients'] );
	$recipe_data['time'] 			= sanitize_text_field( $_POST['time'] );
	$recipe_data['utensils'] 		= sanitize_text_field( $_POST['utensils'] );
	$recipe_data['level'] 			= sanitize_text_field( $_POST['level'] );
	$recipe_data['meal_type'] 		= sanitize_text_field( $_POST['meal_type'] );
	$recipe_data['rating'] 			= 0;
	$recipe_data['rating_count'] 	= 0;

	$post_id						= wp_insert_post(array(
		'post_content'	=>	$content,
		'post_name'		=>	$title, // slug
		'post_title'	=>	$title, // title of post
		'post_status'	=>	'pending', // default draft
		'post_type'		=>	'recipe', // Default 'post'
	));

	update_post_meta( $post_id, 'recipe_data', $recipe_data );
	$response['status']	= 2;
	wp_send_json($response);
}
?>