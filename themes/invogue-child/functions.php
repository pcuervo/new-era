<?php
/**
 * THEME - InVogue
 * AUTHOR - HEROPLUGINS
 */

error_log('functions child');

#LOAD PARENT STYLE SHEET
add_action( 'wp_enqueue_scripts', 'htheme_child_enqueue_styles' );

#ENQUEUE CHILD STYLES
function htheme_child_enqueue_styles() {
	#VARIABLES
	$parent_style = 'invogue';
	#PARENT THEME STYLESHEET
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/htheme/assets/css/herotheme_theme_styles.css' );
	#CHILD THEME STYLESHEET
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/htheme/assets/css/herotheme_theme_styles.css',
		array( $parent_style )
	);

	#User Style
	if(is_page('encuentra-una-tienda')){
		wp_enqueue_style( 'map-style', get_stylesheet_directory_uri() . '/htheme/assets/css/style-map.css');
	}

	wp_enqueue_style( 'number-style', get_stylesheet_directory_uri() . '/htheme/assets/css/style-input-number.css');

	if(is_page( array('newsletter','form-newsletter'))){
		wp_enqueue_style( 'lightbox-externos-style', get_stylesheet_directory_uri() . '/htheme/assets/css/estilos-externos.css');
		wp_enqueue_style( 'lightbox-externos2-style', get_stylesheet_directory_uri() . '/htheme/assets/css/estilos-externos2.css');
		wp_enqueue_style( 'lightbox-style', get_stylesheet_directory_uri() . '/htheme/assets/css/lightbox.css');
		wp_enqueue_style( 'jquery-style-ui-style', get_stylesheet_directory_uri() . '/htheme/assets/js/tabs/jquery-ui.min.css');
	}

	if(is_page('gracias')){
		wp_enqueue_style( 'lightbox-externos2-style', get_stylesheet_directory_uri() . '/htheme/assets/css/estilos-externos2.css');
		wp_enqueue_style( 'gracias-style', get_stylesheet_directory_uri() . '/htheme/assets/css/gracias.css');
	}

	#user functions
	wp_enqueue_script( 'htheme-footer', get_stylesheet_directory_uri().'/htheme/assets/js/functions-footer.js', array( 'jquery' ) );

	if ( is_singular( 'product' ) ) {
		wp_enqueue_script( 'snipe', get_stylesheet_directory_uri().'/htheme/assets/js/snipe.js', array( 'jquery' ) );
	}

}


add_action( 'pre_get_posts', 'wpse223576_search_woocommerce_only' );
function wpse223576_search_woocommerce_only( $query ) {
  if( ! is_admin() && is_search() && $query->is_main_query() ) {
    $query->set( 'post_type', 'product' );
  }
}



/**
 * Product Summary Box.
 *
 * @see woocommerce_template_single_title()
 * @see woocommerce_template_single_rating()
 * @see woocommerce_template_single_price()
 * @see woocommerce_template_single_excerpt()
 * @see woocommerce_template_single_meta()
 * @see woocommerce_template_single_sharing()
 */

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 30 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );


/*------------------------------------*\
	#INCLUDES
\*------------------------------------*/

	require_once('inc/post-types.php');