<?php
function tlgr_activate_plugin() {
	if( version_compare( get_bloginfo('version'), '4.6', '<') ){
		// If wp version is less than 4.2 than plugin won't be activated
		wp_die( __('You must update your WP installation to 4.8 or higher to use this plugin', 'tlg-recipe') );
	}

	// Create Table for ratings in db while activation
	global $wpdb;
	$createSQL = "
		CREATE TABLE `". $wpdb->prefix ."recipe_ratings` (
		  `id` bigint(20) NOT NULL,
		  `recipe_id` bigint(20) NOT NULL,
		  `rating` float NOT NULL,
		  `user_ip` varchar(32) NOT NULL,
		  PRIMARY KEY  (id)
		) ENGINE=InnoDB ". $wpdb->get_charset_collate() .";
		";

	require( ABSPATH . '/wp-admin/includes/upgrade.php' ); // to include dbDelta fn which allows us to modify the wp database
	dbDelta( $createSQL );
	// use exit(); at end of dbDelta fn in /wp-admin/includes/upgrade.php for debugging

	// WP Cron Jobs
	wp_schedule_event( time(), 'daily', 'tlgr_daily_recipe_hook' ); // startng time, run each time, hook
	// wp_schedule_event(time(), 'hourly', 'my_schedule_hook', $args);
	// https://codex.wordpress.org/Function_Reference/wp_schedule_event
}
?>