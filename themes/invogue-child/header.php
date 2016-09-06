<?php
/**
 * THEME - InVogue
 * AUTHOR - HEROPLUGINS
 * DISPLAY - The template for displaying the header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<!-- META -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Facebook, Twitter metas -->
	<meta property="og:title" content="New era">
	<meta property="og:type" content="article" />
	<meta name="og:url" content="<?php echo get_the_permalink(); ?>" />
	<meta name="og:description" content="<?php bloginfo('description'); ?>" />
	<meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/htheme/assets/images/new-era-share.png" alt="logo de new era">
	<meta property="og:image:width" content="210" />
	<meta property="og:image:height" content="110" />
	<meta property="fb:app_id" content="149936212117170" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@NewEraMX" />
	<meta name="twitter:title" content="New Era México" />
	<meta name="twitter:description" content="<?php bloginfo('description'); ?>" />
	<meta name="twitter:image" content="<?php echo get_stylesheet_directory_uri(); ?>/htheme/assets/images/new-era-share.png" alt="logo de new era" />
	<!-- Compatibility -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="cleartype" content="on">
	<!-- Sitemap Google Verify -->
	<meta name="google-site-verification" content="4Bt7KHVG0kzwetxi_LnrYR8QUCkKFdSNGA4PU2hpaDs" />

	<!-- GET TEMPLATE PART - FAV ICON -->
	<?php get_template_part( 'htheme/templateparts/bits/fav', 'icon' ); ?>
	<!-- LINK -->
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- WP_HEAD -->
	<?php wp_head(); ?>

	<!-- Typekiy -->
	<script src="https://use.typekit.net/fss2wri.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>

</head>
<?php

	#GLOBALS
	global $post, $woocommerce, $product;
	setup_postdata( $post );

	#IS ADMIN BAR ACTIVE
	$htheme_margin_top = 0;
	if(is_admin_bar_showing()){
		$htheme_margin_top = '32px';
	}

?>
<body <?php body_class(); ?>>

<!-- Facebook, Twitter metas -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '149936212117170',
      xfbml      : true,
      version    : 'v2.7'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<?php
	#GET TEMPLATE PART - NAVIGATION
	get_template_part( 'htheme/templateparts/bits/popup', 'overlay' );
?>

<?php

	#GET PAGE META VARAIBLES
	if ( class_exists( 'WooCommerce' ) ){
		if(is_shop() || is_product_category() || is_product_tag()){
			$post = get_post(get_option('woocommerce_shop_page_id'));
		}
	}

	$htheme_meta_layout = 3;
	$htheme_meta_fullscreen = false;

	if(isset($post)){
		$htheme_meta_layout = get_post_meta( $post->ID, 'htheme_meta_layout', true );
		$htheme_meta_fullscreen = get_post_meta( $post->ID, 'htheme_meta_fullscreen', true );
	}

	$htheme_is_top_image = true;

	#DO CHECK
	if(is_front_page() || is_page_template( 'templates/template.home.php' )){
		$htheme_front_top_style = '';
	} else if(isset($post) && ($post->post_type == 'post' || is_search() || is_archive())){
		$htheme_front_top_style = 'htheme_content_top';
	} else if(isset($post) && $post->post_type == 'people'){
		$htheme_front_top_style = '';
	} else {
		if($htheme_meta_layout == 1){
			$htheme_front_top_style = '';
			if($htheme_meta_fullscreen){
				$htheme_front_top_style = 'htheme_is_fullscreen';
			}
		} else if($htheme_meta_layout == 2){
			$htheme_front_top_style = 'htheme_content_top_small';
		} else if($htheme_meta_layout == 3){
			$htheme_front_top_style = 'htheme_content_top';
			$htheme_is_top_image = false;
		} else {
			$htheme_front_top_style = 'htheme_content_top';
			$htheme_is_top_image = false;
		}
	}

?>

<!-- TOP HOLDER -->
<div class="htheme_top_holder <?php echo esc_attr($htheme_front_top_style); ?>">

<?php

	#GET TEMPLATE PART - NAVIGATION
	get_template_part( 'htheme/templateparts/header/top', 'navigation' );

	#GET TEMPLATE PART - SLIDER
	if(is_front_page() || is_page_template( 'templates/template.home.php' )){
		get_template_part( 'htheme/templateparts/header/top', 'home-slider' );
	} else if(isset($post) && ($post->post_type == 'post' || is_search() || is_archive() || is_404())){
		#NONE
	} else if(isset($post) && ($post->post_type) == 'people'){
		get_template_part( 'htheme/templateparts/header/top', 'people' );
	} else if(isset($post) && ($htheme_is_top_image)) {
		get_template_part( 'htheme/templateparts/header/top', 'content-image' );
	}

?>

</div>
<!-- TOP HOLDER -->

<!-- LOADER -->
<div class="htheme_page_loader">
	<div class="htheme_spinner">
		<div class="htheme_double_bounce1"></div><div class="htheme_double_bounce2"></div>
	</div>
</div>
<!-- LOADER -->

<div class="[ main-body ]">
