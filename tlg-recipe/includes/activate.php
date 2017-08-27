<?php
/**
Created by Kiran Dash
User: kirandash
Date: 27/08/2017
Time: 12:52 PM
**/

function tlgr_activate_plugin() {
	if( version_compare( get_bloginfo('version'), '4.6', '<') ){
		// If wp version is less than 4.2 than plugin won't be activated
		wp_die( __('You must update your WP installation to 4.8 or higher to use this plugin', 'tlg-recipe') );
	}
}
?>