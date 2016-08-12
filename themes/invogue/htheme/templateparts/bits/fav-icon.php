<?php
#VARIABLES
$htheme_favIcon = $GLOBALS['htheme_global_object']['settings']['general']['favIcon'];
if(!function_exists('wp_site_icon')){
if($htheme_favIcon || $htheme_favIcon != ''): ?>
<link rel="shortcut icon" href="<?php echo esc_url($htheme_favIcon); ?>" />
<?php endif; } ?>

