<?php
function teacher_post_type() {

	$labels = array(
		'name'                => _x( 'Teachers', 'Post Type General Name', 'portal-timtec' ),
		'singular_name'       => _x( 'Teacher', 'Post Type Singular Name', 'portal-timtec' ),
		'menu_name'           => __( 'Teachers', 'portal-timtec' ),
		'name_admin_bar'      => __( 'Teachers', 'portal-timtec' ),
		'parent_item_colon'   => __( 'Parent Teacher:', 'portal-timtec' ),
		'all_items'           => __( 'All Teachers', 'portal-timtec' ),
		'add_new_item'        => __( 'Add New Teacher', 'portal-timtec' ),
		'add_new'             => __( 'Add New', 'portal-timtec' ),
		'new_item'            => __( 'New Teacher', 'portal-timtec' ),
		'edit_item'           => __( 'Edit Teacher', 'portal-timtec' ),
		'update_item'         => __( 'Update Teacher', 'portal-timtec' ),
		'view_item'           => __( 'View Teacher', 'portal-timtec' ),
		'search_items'        => __( 'Search Teacher', 'portal-timtec' ),
		'not_found'           => __( 'Not found', 'portal-timtec' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'portal-timtec' ),
	);
	$args = array(
		'label'               => __( 'teacher', 'portal-timtec' ),
		'description'         => __( 'Course Teacher', 'portal-timtec' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'taxonomies'          => array( 'discipline' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'teacher', $args );

}

// Hook into the 'init' action
add_action( 'init', 'teacher_post_type', 0 );