<?php
function tlgr_front_enqueue(){
	// https://codex.wordpress.org/Function_Reference/plugins_url
	wp_register_style( 'tlgr_rateit', plugins_url( '/assets/rateit/rateit.css', RECIPE_PLUGIN_URL ) );
	wp_enqueue_style( 'tlgr_rateit' );

	wp_register_script( 'tlgr_rateit', plugins_url( '/assets/rateit/jquery.rateit.min.js', RECIPE_PLUGIN_URL ), array(), '1.0.0', true );
	wp_register_script( 'tlgr_main', plugins_url( '/assets/scripts/main.js', RECIPE_PLUGIN_URL ), array(), '1.0.0', true );
	wp_enqueue_script( 'tlgr_rateit' );
	wp_enqueue_script( 'tlgr_main' );
}