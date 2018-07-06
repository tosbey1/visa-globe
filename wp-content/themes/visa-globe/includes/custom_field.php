<?php 
function create_libdot_cpt() {
  // Register Custom Post Type Star
	$star_labels = array(
		'name' => __( 'Stars', 'Post Type General Name' ),
		'singular_name' => __( 'Star', 'Post Type Singular Name' ),
		'menu_name' => __( 'Stars' ),
		'name_admin_bar' => __( 'Star' ),
		'archives' => __( 'Star Archives' ),
		'attributes' => __( 'Star Attributes' ),
		'parent_item_colon' => __( 'Parent Star:' ),
		'all_items' => __( 'All Stars' ),
		'add_new_item' => __( 'Add New Star' ),
		'add_new' => __( 'Add New' ),
		'new_item' => __( 'New Star' ),
		'edit_item' => __( 'Edit Star' ),
		'update_item' => __( 'Update Star' ),
		'view_item' => __( 'View Star' ),
		'view_items' => __( 'View Stars' ),
		'search_items' => __( 'Search Star' ),
		'not_found' => __( 'Not found' ),
		'not_found_in_trash' => __( 'Not found in Trash' ),
		'featured_image' => __( 'Featured Image' ),
		'set_featured_image' => __( 'Set featured image' ),
		'remove_featured_image' => __( 'Remove featured image' ),
		'use_featured_image' => __( 'Use as featured image' ),
		'insert_into_item' => __( 'Insert into Star' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Star' ),
		'items_list' => __( 'Stars list' ),
		'items_list_navigation' => __( 'Stars list navigation' ),
		'filter_items_list' => __( 'Filter Stars list' ),
	);
	$star_args = array(
		'label' => __( 'Star' ),
		'description' => __( '' ),
		'labels' => $star_labels,
		'menu_icon' => 'dashicons-star-empty',
		'supports' => array('title'),
		'public' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'featured_image' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'Star', $star_args ); 
}
add_action( 'init', 'create_libdot_cpt', 0 );
?>