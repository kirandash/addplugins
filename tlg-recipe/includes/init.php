<?php 
function tlgr_recipe_init() {
	$labels = array(
		'name'               => _x( 'Recipes', 'post type general name', 'tlg-recipe' ), // _x is same as __ , but with additional parameter of context to help with translation of same word in 2 different contexts
		'singular_name'      => _x( 'Recipe', 'post type singular name', 'tlg-recipe' ),
		'menu_name'          => _x( 'Recipes', 'admin menu', 'tlg-recipe' ),
		'name_admin_bar'     => _x( 'Recipe', 'add new on admin bar', 'tlg-recipe' ),
		'add_new'            => _x( 'Add New', 'recipe', 'tlg-recipe' ),
		'add_new_item'       => __( 'Add New Recipe', 'tlg-recipe' ),
		'new_item'           => __( 'New Recipe', 'tlg-recipe' ),
		'edit_item'          => __( 'Edit Recipe', 'tlg-recipe' ),
		'view_item'          => __( 'View Recipe', 'tlg-recipe' ),
		'all_items'          => __( 'All Recipes', 'tlg-recipe' ),
		'search_items'       => __( 'Search Recipes', 'tlg-recipe' ),
		'parent_item_colon'  => __( 'Parent Recipes:', 'tlg-recipe' ),
		'not_found'          => __( 'No recipes found.', 'tlg-recipe' ),
		'not_found_in_trash' => __( 'No recipes found in Trash.', 'tlg-recipe' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'A custom post type for recipes', 'tlg-recipe' ),
		'public'             => true, // content in this cpt will be public
		'publicly_queryable' => true, // if this can be queryable in url
		'show_ui'            => true, // if wp should generate the ui for it
		'show_in_menu'       => true, // if it should appear in wp admin menu
		'query_var'          => true, // if publicly queryable in backend
		'rewrite'            => array( 'slug' => 'recipe' ), // slug
		'capability_type'    => 'post', // who can see this - admin users
		'has_archive'        => true, // if post type will have archive
		'hierarchical'       => false, // if parent - child categorization is needed
		'menu_position'      => 20, // location of this menu item will be placed
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ), // supported components
		'taxonomies'		 => array( 'category', 'post_tag' ), // use default wp categories and tags
		'menu_icon'			 => 'dashicons-clipboard'
	);

	register_post_type( 'recipe', $args );
}
?>