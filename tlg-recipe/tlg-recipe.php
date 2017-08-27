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

// Hooks
register_activation_hook( __FILE__ , 'tlgr_activate_plugin' ); // Fn will be called when plugin is activated

add_action( 'init', 'tlgr_recipe_init' );
add_action( 'admin_init', 'tlgr_recipe_admin_init' );
add_action( 'save_post_recipe', 'tlgr_save_post_admin', 10, 3 );

// Shortcodes

?>