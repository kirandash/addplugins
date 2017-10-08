<?php
/*
* Trigger this file on plugin uninstallation
* @package Addkd Plugin
*/

// Security checkup - So that no body accidentally has access to this page
if( !defined( 'WP_UNINSTALL_PLUGIN' ) ){
	die; //destroy the execution
}

// Clear data stored in database
/*$books = get_posts( array( 'post_type'	=> 'book', 'numberposts'  => -1 ) ); // No need of WP_Query since we dont need to do anything with looping

foreach( $books as $book ) {
	wp_delete_posts( $book->ID, true ); // id and force delete(boolean), if set to true it will delete from trash also. if false it will delete only published posts
}*/
// The above data is fine if it is just one cpt, but if it is connected to multiple cases better to use wpdb instead of looping with default wp functions

// Access the database via SQL (BE CAREFUL)
global $wpdb;
$wpdb->query( "DELETE FROM ". $wpdb->prefix ."_posts WHERE post_type ='book'" );
$wpdb->query( "DELETE FROM ". $wpdb->prefix ."_postmeta WHERE post_id NOT IN (SELECT id FROM ". $wpdb->prefix ."_posts)" ); // Delete everything extra from _postmeta table whose ids are not in _posts table
$wpdb->query( "DELETE FROM ". $wpdb->prefix ."_term_relationships WHERE object_id NOT IN (SELECT id FROM ". $wpdb->prefix ."_posts)" );
?>