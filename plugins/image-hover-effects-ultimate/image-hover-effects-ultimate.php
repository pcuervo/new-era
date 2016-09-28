<?php
/*
Plugin Name: Image Hover Effects Ultimate
Plugin URI: http://www.oxilab.org
Description: Image Hover Effects Ultimate is an impressive, lightweight, responsive Image hover effects. Use modern and elegant CSS hover effects and animations.  
Author: Biplob Adhikari
Author URI: http://www.oxilab.org/
Version: 4.1
*/
if ( ! defined( 'ABSPATH' ) ) exit;

//Loading CSS filefunction
 function iheb_oxi_style() {
	wp_enqueue_style('iheb_oxi_style', plugins_url( '/admin/style.css' , __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'iheb_oxi_style' );


// added widgets filters
add_filter('widget_text', 'do_shortcode');

// VAF Framework Loading
if(!class_exists('VP_IHEB_OXI_AutoLoader')){
defined( 'VP_IHEB_OXI_VERSION' ) or define( 'VP_IHEB_OXI_VERSION', '2.0' );
defined( 'VP_IHEB_OXI_URL' )     or define( 'VP_IHEB_OXI_URL', plugin_dir_url( __FILE__ ) );
defined( 'VP_IHEB_OXI_DIR' )     or define( 'VP_IHEB_OXI_DIR', plugin_dir_path( __FILE__ ) );
defined( 'VP_IHEB_OXI_FILE' )    or define( 'VP_IHEB_OXI_FILE', __FILE__ );

// Looding Bootstrap framework
require 'framework/bootstrap.php';


}

// Register Custom Post
function iheb_oxi_custom_post_calling(){
	register_post_type('iheb-oxi-hov', array(
	'labels' => array(
			'name' => __( 'Image Effects' ),
			'singular_name' => __( 'Image Hover Effect' ),
			'add_new_item' => __( 'Add New Item' )
	),
	'public' => true,
	'supports' => array('title'),
	'has_archive' => true,
	'rewrite' => array('slug' => 'iheb-hover-effects'),
	'menu_icon' => '',
	));
}
add_action('init','iheb_oxi_custom_post_calling');

require (VP_IHEB_OXI_DIR.'admin/icon.php');

// Loading Option Framework Main Metaboxes 
new VP_Metabox(array
(
			'id'          => 'iheb_oxi_meta',
			'types'       => array('iheb-oxi-hov'),
			'title'       => __('Image Hover Effects ', 'vp_textdomain'),
			'priority'    => 'high',
			'template' => VP_IHEB_OXI_DIR . '/admin/metabox.php'
));
// calling shortcode
require (VP_IHEB_OXI_DIR.'admin/views.php');
require (VP_IHEB_OXI_DIR.'admin/shortcode.php');

?>
