## 1 Plugin Development Intro & Header Requirements

Turn WP_DEBUG true

Check unique plugin name

Plugin - file name should match the folder name. 

## Security Checkups

A. Have index.php - to avoid access to other folders via url - so create a blank index.php page


B. if( !defined( 'ABSPATH' ) ) : 
	die;
endif;

OR

defined( 'ABSPATH' ) or die( 'Hey! You can not see this file!' );

OR

if( ! function_exists( 'add_action' ) ) {
	exit;
}

## WordPress Load Order

1. Configuration file is loaded wp-config.php
2. Functions and classes are loaded
3. Plugins are loaded
4. Process all codes & repeats
5. Load Translations
6. Load Theme
7. Load Page content

## jQuery Rating Plugin
https://github.com/gjunge/rateit.js