<?php

function tlgr_recipe_admin_init() {
	include( 'create-metaboxes.php' );
	include( 'recipe-options.php' );
	include( 'enqueue.php' );
	include( 'columns.php' );

	// https://developer.wordpress.org/reference/hooks/add_meta_boxes_post_type/
	add_action( 'add_meta_boxes_recipe', 'tlgr_create_metaboxes' ); // add_meta_boxes_cptslug
	add_action( 'admin_enqueue_scripts', 'tlgr_admin_enqueue' ); // enqueue scripts for admin
	
	add_action( 'manage_edit-recipe_columns', 'add_new_recipe_columns' );// manage_edit-posttype_columns
	// https://codex.wordpress.org/Plugin_API/Filter_Reference/manage_edit-post_type_columns
	add_action( 'manage_recipe_posts_custom_column', 'manage_recipe_columns', 10, 2 ); // priority is 10 and number of arguments are 2.
	// manage_posttype_posts_custom_column 
	// https://codex.wordpress.org/Plugin_API/Filter_Reference/manage_$post_type_posts_columns
}