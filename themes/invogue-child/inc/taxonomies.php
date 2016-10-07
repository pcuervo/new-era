<?php

/*------------------------------------*\
	TAXONOMIES
\*------------------------------------*/

add_action( 'init', 'custom_taxonomies_callback', 0 );
function custom_taxonomies_callback(){

	// Tipo
	if( ! taxonomy_exists('tipo')){

		$labels = array(
			'name'              => 'Tipo',
			'singular_name'     => 'Tipo',
			'search_items'      => 'Buscar',
			'all_items'         => 'Todos',
			'edit_item'         => 'Editar Tipo',
			'update_item'       => 'Actualizar Tipo',
			'add_new_item'      => 'Nuevo Tipo',
			'new_item_name'     => 'Nombre nuevo Tipo',
			'menu_name'         => 'Tipo'
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'tipo' ),
		);
		register_taxonomy( 'tipo', array('silueta'), $args );
	}

}// custom_taxonomies_callback


//Custom terms
wp_insert_term('9fifty', 'tipo');
wp_insert_term('9fifty', 'tipo');
wp_insert_term('9fifty', 'tipo');
wp_insert_term('9fifty', 'tipo');
wp_insert_term('9fifty', 'tipo');