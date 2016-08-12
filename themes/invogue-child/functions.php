<?php
/**
 * THEME - InVogue
 * AUTHOR - HEROPLUGINS
 */

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
}