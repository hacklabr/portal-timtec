<?php

function conselho_post_type() {

    $labels = array(
        'name'                => _x( 'Conselheiros', 'Post Type General Name', 'portal-timtec' ),
        'singular_name'       => _x( 'Conselho', 'Post Type Singular Name', 'portal-timtec' ),
        'menu_name'           => __( 'Conselheiros', 'portal-timtec' ),
        'name_admin_bar'      => __( 'Conselheiros', 'portal-timtec' ),
        'parent_item_colon'   => __( 'Parent Conselho:', 'portal-timtec' ),
        'all_items'           => __( 'All Conselheiros', 'portal-timtec' ),
        'add_new_item'        => __( 'Add New Conselho', 'portal-timtec' ),
        'add_new'             => __( 'Add New', 'portal-timtec' ),
        'new_item'            => __( 'New Conselho', 'portal-timtec' ),
        'edit_item'           => __( 'Edit Conselho', 'portal-timtec' ),
        'update_item'         => __( 'Update Conselho', 'portal-timtec' ),
        'view_item'           => __( 'View Conselho', 'portal-timtec' ),
        'search_items'        => __( 'Search Conselho', 'portal-timtec' ),
        'not_found'           => __( 'Not found', 'portal-timtec' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'portal-timtec' ),
    );
    $args = array(
        'label'               => __( 'Conselho', 'portal-timtec' ),
        'description'         => __( 'Conselho', 'portal-timtec' ),
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
    register_post_type( 'conselho', $args );

}

// Hook into the 'init' action
add_action( 'init', 'conselho_post_type', 0 );