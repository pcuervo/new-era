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

	if( ! taxonomy_exists('genero')){
        $labels = array(
            'name'              => 'Género',
            'singular_name'     => 'Género',
            'search_items'      => 'Buscar',
            'all_items'         => 'Todos',
            'edit_item'         => 'Editar género',
            'update_item'       => 'Actualizar género',
            'add_new_item'      => 'Nuevo género',
            'menu_name'         => 'Género'
        );
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'genero' ),
        );
        register_taxonomy( 'genero', 'product', $args );
    }

    if( ! taxonomy_exists('semuestraen')){
        $labels = array(
            'name'              => 'Se muestra en',
            'singular_name'     => 'Se muestra en',
            'search_items'      => 'Buscar',
            'all_items'         => 'Todos',
            'edit_item'         => 'Editar donde se muestra',
            'update_item'       => 'Actualizar donde se muestra',
            'add_new_item'      => 'Nuevo ',
            'menu_name'         => 'Se muestra en'
        );
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'semuestraen' ),
        );
        register_taxonomy( 'semuestraen', 'product', $args );
    }
    if( ! taxonomy_exists('silueta')){
        $labels = array(
            'name'              => 'Silueta',
            'singular_name'     => 'Silueta',
            'search_items'      => 'Buscar',
            'all_items'         => 'Todos',
            'edit_item'         => 'Editar Silueta',
            'update_item'       => 'Actualizar Silueta',
            'add_new_item'      => 'Nueva Silueta',
            'menu_name'         => 'Silueta'
        );
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'silueta' ),
        );
        register_taxonomy( 'silueta', 'product', $args );
    }

    if( ! taxonomy_exists('ajuste')){
        $labels = array(
            'name'              => 'Ajuste',
            'singular_name'     => 'Ajuste',
            'search_items'      => 'Buscar',
            'all_items'         => 'Todos',
            'edit_item'         => 'Editar Ajuste',
            'update_item'       => 'Actualizar Ajuste',
            'add_new_item'      => 'Nuevo Ajuste',
            'menu_name'         => 'Ajuste'
        );
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'ajuste' ),
        );
        register_taxonomy( 'ajuste', 'product', $args );
    }
    if( ! taxonomy_exists('vicera')){
        $labels = array(
            'name'              => 'Vicera',
            'singular_name'     => 'Vicera',
            'search_items'      => 'Buscar',
            'all_items'         => 'Todos',
            'edit_item'         => 'Editar Vicera',
            'update_item'       => 'Actualizar Vicera',
            'add_new_item'      => 'Nuevo Vicera',
            'menu_name'         => 'Vicera'
        );
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'vicera' ),
        );
        register_taxonomy( 'vicera', 'product', $args );
    }
    if( ! taxonomy_exists('equipo')){
        $labels = array(
            'name'              => 'Equipo',
            'singular_name'     => 'Equipo',
            'search_items'      => 'Buscar',
            'all_items'         => 'Todos',
            'edit_item'         => 'Editar Equipo',
            'update_item'       => 'Actualizar Equipo',
            'add_new_item'      => 'Nuevo Equipo',
            'menu_name'         => 'Equipo'
        );
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'equipo' ),
        );
        register_taxonomy( 'equipo', 'product', $args );
    }
    if( ! taxonomy_exists('coleccion')){
        $labels = array(
            'name'              => 'Colección',
            'singular_name'     => 'Colección',
            'search_items'      => 'Buscar',
            'all_items'         => 'Todos',
            'edit_item'         => 'Editar Colección',
            'update_item'       => 'Actualizar Colección',
            'add_new_item'      => 'Nuevo Colección',
            'menu_name'         => 'Colección'
        );
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'coleccion' ),
        );
        register_taxonomy( 'coleccion', 'product', $args );
    }

    // Taxonomy terms
    insert_muestra_taxonomy_terms();
    insert_genero_taxonomy_terms();
    insert_silueta_taxonomy_terms();
    insert_ajuste_taxonomy_terms();
    insert_vicera_taxonomy_terms();
    insert_equipo_taxonomy_terms();
    insert_coleccion_taxonomy_terms();

}// custom_taxonomies_callback


//Custom terms
wp_insert_term('9fifty', 'tipo');
wp_insert_term('9fifty', 'tipo');
wp_insert_term('9fifty', 'tipo');
wp_insert_term('9fifty', 'tipo');
wp_insert_term('9fifty', 'tipo');



function insert_muestra_taxonomy_terms(){
    $muestra = array( );
    foreach ( $muestra as $gen ) {
        $term = term_exists( $gen, 'semuestraen' );
        if ( FALSE !== $term && NULL !== $term ) continue;
        wp_insert_term( $gen, 'semuestraen' );
    }

}
function insert_genero_taxonomy_terms(){
    $genero = array( 'Hombre', 'Mujer');
    foreach ( $genero as $gen ) {
        $term = term_exists( $gen, 'genero' );
        if ( FALSE !== $term && NULL !== $term ) continue;
        wp_insert_term( $gen, 'genero' );
    }

}// insert_genero_taxonomy_terms
function insert_silueta_taxonomy_terms(){
    $silueta = array( '9Fifty', '59Fifty' );
    foreach ( $silueta as $car ) {
        $term = term_exists( $car, 'silueta' );
        if ( FALSE !== $term && NULL !== $term ) continue;
        wp_insert_term( $car, 'silueta' );
    }

}// insert_silueta_taxonomy_terms
function insert_ajuste_taxonomy_terms(){
    $ajuste = array( 'Snapback', 'Cerrada' );
    foreach ( $ajuste as $car ) {
        $term = term_exists( $car, 'ajuste' );
        if ( FALSE !== $term && NULL !== $term ) continue;
        wp_insert_term( $car, 'ajuste' );
    }

}// insert_ajuste_taxonomy_terms
function insert_vicera_taxonomy_terms(){
    $vicera = array( 'Plana');
    foreach ( $vicera as $gen ) {
        $term = term_exists( $gen, 'vicera' );
        if ( FALSE !== $term && NULL !== $term ) continue;
        wp_insert_term( $gen, 'vicera' );
    }

}// insert_vicera_taxonomy_terms
function insert_equipo_taxonomy_terms(){
    $equipo = array(  );
    foreach ( $equipo as $car ) {
        $term = term_exists( $car, 'equipo' );
        if ( FALSE !== $term && NULL !== $term ) continue;
        wp_insert_term( $car, 'equipo' );
    }

}// insert_silueta_taxonomy_terms
function insert_coleccion_taxonomy_terms(){
    $coleccion = array(  );
    foreach ( $coleccion as $car ) {
        $term = term_exists( $car, 'coleccion' );
        if ( FALSE !== $term && NULL !== $term ) continue;
        wp_insert_term( $car, 'coleccion' );
    }

}// insert_coleccion_taxonomy_terms


/*-----------------------------------------*\
    CUSTOM POST LIST'S CALLBACK FUNCTIONS
\*-----------------------------------------*/
add_filter( 'manage_product_posts_columns', 'my_edit_product_columns' );
function my_edit_product_columns( $columns ) {
    //var_dump($columns);
    unset($columns['taxonomy-semuestraen']);
    unset($columns['taxonomy-genero']);
    unset($columns['taxonomy-silueta']);
    unset($columns['taxonomy-vicera']);
    unset($columns['taxonomy-equipo']);
    unset($columns['taxonomy-ajuste']);
    unset($columns['taxonomy-coleccion']);
    return $columns;
}