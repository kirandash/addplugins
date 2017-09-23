<?php
function tlgr_deactivate_plugin() {
	wp_clear_scheduled_hook( 'tlgr_daily_recipe_hook' ); // Clear scheduled events/cron jobs when plugin is deactivated
}
?>