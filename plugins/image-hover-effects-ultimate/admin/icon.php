<?php
 if ( ! defined( 'ABSPATH' ) ) exit;
function add_iseb_hov_menu_icons_styles(){
?>
 
<style>
#adminmenu .menu-icon-iheb-oxi-hov div.wp-menu-image:before {
content: "\f168";
}
</style>
 
<?php
}
add_action( 'admin_head', 'add_iseb_hov_menu_icons_styles' );
?>