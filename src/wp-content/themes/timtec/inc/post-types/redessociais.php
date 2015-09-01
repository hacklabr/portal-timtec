<?php
// Register Custom Post Type
function rede_social_post_type() {

	$labels = array(
		'name'                => _x( 'Rede Social', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Rede Social', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Rede Social', 'text_domain' ),
		'name_admin_bar'      => __( 'Rede Social', 'text_domain' ),
		'parent_item_colon'   => __( 'Rede Social Pai:', 'text_domain' ),
		'all_items'           => __( 'Todas Rede Sociais', 'text_domain' ),
		'add_new_item'        => __( 'Adicionar Nova Rede Social', 'text_domain' ),
		'add_new'             => __( 'Adicionar Nova', 'text_domain' ),
		'new_item'            => __( 'Nova Rede Social', 'text_domain' ),
		'edit_item'           => __( 'Editar Rede Social', 'text_domain' ),
		'update_item'         => __( 'Atualizar Rede Social', 'text_domain' ),
		'view_item'           => __( 'Ver Rede Social', 'text_domain' ),
		'search_items'        => __( 'Procurar Rede Social', 'text_domain' ),
		'not_found'           => __( 'Não Encontrada', 'text_domain' ),
		'not_found_in_trash'  => __( 'Não Encontrada na Lixeira', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Redes Sociais', 'text_domain' ),
		'description'         => __( 'Redes Sociais associadas com o site', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail'),
		'taxonomies'          => array( 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'rede_social', $args );

}

// Hook into the 'init' action
add_action( 'init', 'rede_social_post_type', 0 );
