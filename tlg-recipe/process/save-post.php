<?php 
function tlgr_save_post_admin( $post_id, $post, $update ) {
	if( !$update ){
		return; // dont do anything if post is being updated
	}
	/*echo '<pre>';
	print_r($_POST);
	die();*/

	$recipe_data = array();
	$recipe_data['ingredients'] = sanitize_text_field( $_POST['tlgr_inputIngredients'] );
	$recipe_data['time'] = sanitize_text_field( $_POST['tlgr_inputCookingTime'] );
	$recipe_data['utensils'] = sanitize_text_field( $_POST['tlgr_inputCookingUtensils'] );
	$recipe_data['level'] = sanitize_text_field( $_POST['tlgr_inputLevel'] );
	$recipe_data['meal_type'] = sanitize_text_field( $_POST['tlgr_inputMealType'] );

	$recipe_data['rating'] = 0;
	$recipe_data['rating_count'] = 0;

	update_post_meta( $post_id, 'recipe_data', $recipe_data ); // can use add_post_meta but update_post_meta is better
	// https://codex.wordpress.org/Function_Reference/update_post_meta
}
?>