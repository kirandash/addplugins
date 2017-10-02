<?php 
/*
* @package Addkd Plugin
*/
/*
Plugin Name: Addkd Plugin
Plugin URI: http://www.bgwebagency.com
Description: This is a custom WP plugin.
Version: 1.0.0
Author: Kiran Kumar Dash
Author URI: http://www.kirandash.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: addkd-plugin
*/

/*if( !defined( 'ABSPATH' ) ) : // constant variable created by wp during init // If the variable is not created it means someone is trying to execute the code from outside of WordPress installation 
	die; // or use exit
endif;
*/
// defined( 'ABSPATH' ) or die( 'Hey! You can not see this file!' );

if( ! function_exists( 'add_action' ) ) {
	exit;
}

class AddkdPlugin
{
	/*function __construct(string $arg) { // construct will run when class is initialized and through this we can pass some arguments to our class - like procedural code for funciton calling
		echo $arg;
	}*/
	/*function __construct() { // construct will run when class is initialized and through this we can pass some arguments to our class - like procedural code for funciton calling
		
	}
	// methods
	function method1(){

	}

	function method2(){

	}*/
	function activate(){ // No need for unique names since this method is not publicly accessible
		// echo 'The plugin was activated successfully'; // This will create header already sent error
		// generate a CPT
		// flush rewrite rules
	}
	function deactivate(){
		// echo 'The plugin was deactivated successfully'; 
		// flush rewrite rules
	}
	function uninstall(){
		// delete CPT
		// delete all the plugin data from the DB
	}
}

if( class_exists( 'AddkdPlugin' ) ) { // Security checkup to see if a class exists
	// $addkdPlugin = new AddkdPlugin( 'Addkd Plugins initialized!' ); // Store the initialization in a variable to use its instance in different places
	$addkdPlugin = new AddkdPlugin(  );
}

/*function customFunction($arg) {
	echo $arg;
}

customFunction('this is the argument to echo'); // Procedural code / functional programming in PHP*/

// On activation
register_activation_hook( __FILE__ , array($addkdPlugin, 'activate')); // instead of function name we are accessing a fn from a class thus an array with instance of that class and then the function name is passed

// On deactivation
register_deactivation_hook( __FILE__ , array($addkdPlugin, 'deactivate')); 

// On uninstall

?>