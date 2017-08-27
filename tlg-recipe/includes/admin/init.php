<?php

function tlgr_recipe_admin_init() {
	include( 'create-metaboxes.php' );
	include( 'recipe-options.php' );
	include( 'enqueue.php' );

	// https://developer.wordpress.org/reference/hooks/add_meta_boxes_post_type/
	add_action( 'add_meta_boxes_recipe', 'tlgr_create_metaboxes' ); // add_meta_boxes_cptslug
	add_action( 'admin_enqueue_scripts', 'tlgr_admin_enqueue' ); // enqueue scripts for admin
}