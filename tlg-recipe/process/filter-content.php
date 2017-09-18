<?php 
function tlgr_filter_recipe_content( $content ) {
	
	// https://codex.wordpress.org/Function_Reference/is_singular
	if( !is_singular('recipe') ){
		return $content;
	}

	global $post, $wpdb;
	$recipe_data = get_post_meta( $post->ID, 'recipe_data', true );
	$recipe_html = file_get_contents( 'recipe-template.php', true );
	$recipe_html = str_replace("INGREDIENTS_PH", $recipe_data['ingredients'], $recipe_html);
	$recipe_html = str_replace("COOKING_TIME_PH", $recipe_data['time'], $recipe_html);
	$recipe_html = str_replace("UTENSILS_PH", $recipe_data['utensils'], $recipe_html);
	$recipe_html = str_replace("LEVEL_PH", $recipe_data['level'], $recipe_html);
	$recipe_html = str_replace("TYPE_PH", $recipe_data['meal_type'], $recipe_html);

	$recipe_html = str_replace("INGREDIENTS_I18N", __('Ingredients', 'tlg-recipe'), $recipe_html);
	$recipe_html = str_replace("COOKING_TIME_I18N", __('Cooking Time', 'tlg-recipe'), $recipe_html);
	$recipe_html = str_replace("UTENSILS_I18N", __('Utensils', 'tlg-recipe'), $recipe_html);
	$recipe_html = str_replace("LEVEL_I18N", __('Level', 'tlg-recipe'), $recipe_html);
	$recipe_html = str_replace("TYPE_I18N", __('Type', 'tlg-recipe'), $recipe_html);
	$recipe_html = str_replace("RATE_I18N", __('Rate', 'tlg-recipe'), $recipe_html);
	$recipe_html = str_replace("RECIPE_ID", $post->ID, $recipe_html);
	$recipe_html = str_replace("RECIPE_RATING", $recipe_data['rating'], $recipe_html);

	$user_ip		= $_SERVER['REMOTE_ADDR']; // get user's ip. This is optional but used for security purposes

	$rating_count = $wpdb->get_var("SELECT COUNT(*) FROM `" . $wpdb->prefix . "recipe_ratings` WHERE recipe_id='". $post->ID ."' AND user_ip='".$user_ip."'");

	if($rating_count > 0){
		$recipe_html	= str_replace( 'READONLY_PLACEHOLDER', 'data-rateit-readonly="true"', $recipe_html );
	} // Make the rating read only if count is > 0
	else {
		$recipe_html	= str_replace( 'READONLY_PLACEHOLDER', '', $recipe_html );
	} // Else keep the rating as input

	return $recipe_html . $content . $recipe_data['rating'];
}
?>