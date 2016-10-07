<?php

/*------------------------------------*\
	CUSTOM POST TYPES
\*------------------------------------*/

add_action('init', function(){

	// Siluetas
	$labels = array(
		'name'          => 'Siluetas',
		'singular_name' => 'Siluetas',
		'add_new'       => 'Nuevo Silueta',
		'add_new_item'  => 'Nuevo Silueta',
		'edit_item'     => 'Editar Silueta',
		'new_item'      => 'Nuevo Silueta',
		'all_items'     => 'Todos',
		'view_item'     => 'Ver Silueta',
		'search_items'  => 'Buscar Siluetas',
		'not_found'     => 'No se encontró',
		'menu_name'     => 'Siluetas'
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'silueta' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);
	register_post_type( 'silueta', $args );

});