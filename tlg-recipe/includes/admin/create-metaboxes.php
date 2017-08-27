<?php
function tlgr_create_metaboxes() {
	add_meta_box(
		'tlgr_recipe_options_mb', // Meta box ID
		__( 'Recipe Options', 'tlg-recipe' ), // Title of the meta box
		'tlgr_recipe_options_mb', // Function that fills the box with the desired content. The function should echo its output.
		'recipe', // The screen or screens on which to show the box
		'normal', // The context within the screen where the boxes should display. 
		'high' // The priority within the context where the boxes should show 
	);
}