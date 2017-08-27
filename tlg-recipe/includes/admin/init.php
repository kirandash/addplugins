<?php

function tlgr_recipe_admin_init() {
	include( 'create-metaboxes.php' );
	include( 'recipe-options.php' );
	// https://developer.wordpress.org/reference/hooks/add_meta_boxes_post_type/
	add_action( 'add_meta_boxes_recipe', 'tlgr_create_metaboxes' ); // add_meta_boxes_cptslug
}