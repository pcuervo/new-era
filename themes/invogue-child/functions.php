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

	#user functions
	wp_enqueue_script( 'htheme-footer', get_stylesheet_directory_uri().'/htheme/assets/js/footer-fixed.js', array( 'jquery' ) );
	// wp_enqueue_script( 'htheme-input', get_stylesheet_directory_uri().'/htheme/assets/js/input/jquery-ui.js', array( 'jquery' ) );
	#Map
	// if(is_page('encuentra-una-tienda')){
	// 	wp_enqueue_script( 'htheme-underscore', get_stylesheet_directory_uri().'/htheme/assets/js/map/underscore.js', array( 'jquery' ) );
	// 	wp_enqueue_script( 'htheme-main', get_stylesheet_directory_uri().'/htheme/assets/js/map/main.js', array( 'jquery' ) );
	// 	wp_enqueue_script( 'htheme-jscoord', get_stylesheet_directory_uri().'/htheme/assets/js/map/jscoord-1.1.1.js', array( 'jquery' ) );
	// 	wp_enqueue_script( 'htheme-google-map', get_stylesheet_directory_uri().'/htheme/assets/js/map/map-google.js', array( 'jquery' ) );
	// }
}