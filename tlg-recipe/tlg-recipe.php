<?php
/*
Plugin Name: TLG Recipe
Plugin URI:  https://bgwebagency.com
Description: Basic WordPress Plugin Header Comment
Version:     20160911
Author:      Kiran Dash
Author URI:  https://bgwebagency.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: tlg-recipe
Domain Path: /languages
*/

// Setup
if( !function_exists( 'add_action' ) ) {
	echo 'Not allowed';
	exit();	
}

define( 'RECIPE_PLUGIN_URL', __FILE__ ); // define path of plugin folder instead of dirname(__FILE__)

// Includes
include( 'includes/activate.php' );
include( 'includes/init.php' );
include( 'includes/admin/init.php' );
include( 'process/save-post.php' );
include( 'process/filter-content.php' );
include( 'includes/front/enqueue.php' );
include( 'process/rate-recipe.php' );

// Hooks
register_activation_hook( __FILE__ , 'tlgr_activate_plugin' ); // Fn will be called when plugin is activated

add_action( 'init', 'tlgr_recipe_init' );
add_action( 'admin_init', 'tlgr_recipe_admin_init' );
add_action( 'save_post_recipe', 'tlgr_save_post_admin', 10, 3 ); // default value is 10 which means the priority is high
add_filter( 'the_content', 'tlgr_filter_recipe_content' );
add_action( 'wp_enqueue_scripts', 'tlgr_front_enqueue', 9999 ); // change the priority from default value of 10 to 9999 to make sure that first theme loads and then plugin files
add_action( 'wp_ajax_tlgr_rate_recipe', 'tlgr_rate_recipe' ); // https://codex.wordpress.org/Plugin_API/Action_Reference/wp_ajax_(action)
add_action( 'wp_ajax_nopriv_tlgr_rate_recipe', 'tlgr_rate_recipe' ); // nopriv will accept request also from guest users and not just logged in users

// Shortcodes

?>