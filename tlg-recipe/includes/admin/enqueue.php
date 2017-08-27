<?php
function tlgr_admin_enqueue(){
	global $typenow; // global variable that stores current post type - only in admin side

	if( $typenow !== 'recipe' ){
		return; // Enqueue the styles only for recipe cpt
	}

	// https://codex.wordpress.org/Function_Reference/plugins_url
	wp_register_style( 'tlgr_bootstrap', plugins_url( '/assets/bootstrap/css/bootstrap.css', RECIPE_PLUGIN_URL ) );
	wp_enqueue_style( 'tlgr_bootstrap' );
}