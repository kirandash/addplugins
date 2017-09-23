<?php
class TLGR_Daily_Recipe_Widget extends WP_Widget{
	function __construct() {
		// Instantiate the parent object (setting up the widget)
		parent::__construct( false, 'Recipe of the day' );
	}

	function widget( $args, $instance ) {
		// Widget output 
		// echo 'Recipe of the day!';
		extract( $args ); // use extract fn to convert array into single variables
		extract( $instance );

		$title = apply_filters( 'widget_title', $title );
		echo $before_widget;
		echo $before_title . $title . $after_title;

		$recipe_id 	= get_transient( 'tlgr_daily_recipe' ); // the transient will take effect only after deactivating and reactivating the plugin
		?>
		<a href="<?php echo get_permalink( $recipe_id ); ?>"><?php echo get_the_title( $recipe_id ); ?></a>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
		$instance 	= array();
		$instance['title']	= strip_tags( $new_instance['title'] ); // sanitize by stripping all tags from input
		return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form
		$default 	= array('title'	=>	'Recipe of the day');
		$instance 	= wp_parse_args( (array) $instance, $default );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
					name="<?php echo $this->get_field_name('title'); ?>"
					value="<?php echo esc_attr($instance['title']); ?>"
					> <!-- Let wordpress take care of name attribute -->
		</p>
		<?php
	}	
}
?>