<?php

function course_post_type() {

	$labels = array(
		'name'                => _x( 'Courses', 'Post Type General Name', 'portal-timtec' ),
		'singular_name'       => _x( 'Course', 'Post Type Singular Name', 'portal-timtec' ),
		'menu_name'           => __( 'Courses', 'portal-timtec' ),
		'name_admin_bar'      => __( 'Courses', 'portal-timtec' ),
		'parent_item_colon'   => __( 'Parent Course:', 'portal-timtec' ),
		'all_items'           => __( 'All Courses', 'portal-timtec' ),
		'add_new_item'        => __( 'Add New Course', 'portal-timtec' ),
		'add_new'             => __( 'Add New', 'portal-timtec' ),
		'new_item'            => __( 'New Course', 'portal-timtec' ),
		'edit_item'           => __( 'Edit Course', 'portal-timtec' ),
		'update_item'         => __( 'Update Course', 'portal-timtec' ),
		'view_item'           => __( 'View Course', 'portal-timtec' ),
		'search_items'        => __( 'Search Course', 'portal-timtec' ),
		'not_found'           => __( 'Not found', 'portal-timtec' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'portal-timtec' ),
	);
	$args = array(
		'label'               => __( 'course', 'portal-timtec' ),
		'description'         => __( 'Course', 'portal-timtec' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
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
	register_post_type( 'course', $args );

}

// Hook into the 'init' action
add_action( 'init', 'course_post_type', 0 );