<?php
// https://codex.wordpress.org/Plugin_API/Filter_Reference/manage_edit-post_type_columns
function add_new_recipe_columns( $columns ) {
	// Fn to change the custom post types table columns
	$new_columns 				= array();
	$new_columns['cb']			= '<input type="checkbox" />';
	$new_columns['title'] 		= __("Title", "tlg-recipe");
	$new_columns['author'] 		= __("Author", "tlg-recipe");
	$new_columns['categories'] 	= __("Categories", "tlg-recipe");
	$new_columns['count'] 		= __("Ratings Count", "tlg-recipe"); // Custom column
	$new_columns['rating'] 		= __("Average Rating", "tlg-recipe"); // Custom column
	$new_columns['date'] 		= __("Date", "tlg-recipe");

	return $new_columns;
}

function manage_recipe_columns( $column_name, $id ) {
	// switch case for custom column datas, default ones will be taken care by WordPress
	switch ( $column_name ) {
		case 'count':
			# code...
			$recipe_data	=	get_post_meta( $id, 'recipe_data', true );
			echo $recipe_data['rating_count'];
			break;
		case 'rating':
			$recipe_data	=	get_post_meta( $id, 'recipe_data', true );
			echo $recipe_data['rating'];
			break;
		default:
			# code...
			break;
	}
}
?>