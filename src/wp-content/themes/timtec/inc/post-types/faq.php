<?php

function faq_post_type() {

    $labels = array(
        'name'                => _x( 'FAQ', 'Post Type General Name', 'portal-timtec' ),
        'singular_name'       => _x( 'FAQ', 'Post Type Singular Name', 'portal-timtec' ),
        'menu_name'           => __( 'FAQ', 'portal-timtec' ),
        'name_admin_bar'      => __( 'FAQ', 'portal-timtec' ),
        'parent_item_colon'   => __( 'Parent FAQ:', 'portal-timtec' ),
        'all_items'           => __( 'All FAQ', 'portal-timtec' ),
        'add_new_item'        => __( 'Add New FAQ', 'portal-timtec' ),
        'add_new'             => __( 'Add New', 'portal-timtec' ),
        'new_item'            => __( 'New FAQ', 'portal-timtec' ),
        'edit_item'           => __( 'Edit FAQ', 'portal-timtec' ),
        'update_item'         => __( 'Update FAQ', 'portal-timtec' ),
        'view_item'           => __( 'View FAQ', 'portal-timtec' ),
        'search_items'        => __( 'Search FAQ', 'portal-timtec' ),
        'not_found'           => __( 'Not found', 'portal-timtec' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'portal-timtec' ),
    );
    $args = array(
        'label'               => __( 'FAQ', 'portal-timtec' ),
        'description'         => __( 'FAQ', 'portal-timtec' ),
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
    register_post_type( 'faq', $args );

}

// Hook into the 'init' action
add_action( 'init', 'faq_post_type', 0 );