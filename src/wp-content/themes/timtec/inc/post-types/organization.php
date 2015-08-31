<?php

function organization_post_type() {

	$labels = array(
		'name'                => _x( 'Organization', 'Post Type General Name', 'portal-timtec' ),
		'singular_name'       => _x( 'Organization', 'Post Type Singular Name', 'portal-timtec' ),
		'menu_name'           => __( 'Organizations', 'portal-timtec' ),
		'name_admin_bar'      => __( 'Organizations', 'portal-timtec' ),
		'parent_item_colon'   => __( 'Parent Organization:', 'portal-timtec' ),
		'all_items'           => __( 'All Organizations', 'portal-timtec' ),
		'add_new_item'        => __( 'Add New Organization', 'portal-timtec' ),
		'add_new'             => __( 'Add New', 'portal-timtec' ),
		'new_item'            => __( 'New Organization', 'portal-timtec' ),
		'edit_item'           => __( 'Edit Organization', 'portal-timtec' ),
		'update_item'         => __( 'Update Organization', 'portal-timtec' ),
		'view_item'           => __( 'View Organization', 'portal-timtec' ),
		'search_items'        => __( 'Search Organization', 'portal-timtec' ),
		'not_found'           => __( 'Not found', 'portal-timtec' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'portal-timtec' ),
	);
	$args = array(
		'label'               => __( 'Organization', 'portal-timtec' ),
		'description'         => __( 'Organization', 'portal-timtec' ),
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
	register_post_type( 'Organization', $args );

}

// Hook into the 'init' action
add_action( 'init', 'organization_post_type', 0 );