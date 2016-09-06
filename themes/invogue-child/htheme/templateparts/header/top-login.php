<?php global $woocommerce,$sitepress;; ?>

<?php

	#VARIABLES
	$htheme_is_logged = false;
	$htheme_current_user = '';
	$htheme_social_items =  $GLOBALS['htheme_global_object']['settings']['header']['socialItems'];
	$htheme_show_account =  $GLOBALS['htheme_global_object']['settings']['header']['optionAccount'];
	$htheme_show_social =  $GLOBALS['htheme_global_object']['settings']['header']['socialIcons'];

	#CHECK LOGIN
	if ( is_user_logged_in() && class_exists( 'WooCommerce' ) ) {

		#GET CURRENT USER DETAILS
		$htheme_current_user = wp_get_current_user();

		#SET LOGGED TO TRUE
		$htheme_is_logged = true;

	}

?>

<!-- search -->
<div class="htheme_account_holder">
	<form class="border-bottom--dark" action="<?php echo home_url( '/' ); ?>" method="get">
			<input class="[ min-width--170 ][ inline-block ][ middle ][ search-header ]" placeholder="Búsqueda" type="text" value="<?php esc_attr(get_search_query()); ?>" name="s" id="s">
			<div class="htheme_icon_search_btn [ inline-block ][ middle ][ position-initial ][ height--30 ][ width--20 ]">
				<img class="relative top---16" src="<?php echo get_stylesheet_directory_uri(); ?>/htheme/assets/images/icons/search.png" alt="icono carrito">
			</div>
	</form>
</div>

<div class="htheme_account_holder">
	<a href="<?php echo site_url('blog'); ?>">Blog</a>
</div>
<div class="htheme_account_holder">
	<a href="<?php echo site_url('contactanos'); ?>">Contáctanos</a>
</div>

<!-- IF LOGGED IN -->
<?php if( is_user_logged_in() && class_exists( 'WooCommerce' ) && $htheme_show_account == 'true' ) { ?>
	<div class="htheme_account_holder">
		<a href="<?php echo site_url('mi-cuenta'); ?>">Mi cuenta</a>
	</div>
<?php } else if( !is_user_logged_in() && class_exists( 'WooCommerce' ) ){ ?>
	<div class="htheme_account_holder htheme_no_border_right">
		<a href="<?php echo site_url('mi-cuenta'); ?>">Ingresa / Registrate</a>
	</div>
<?php } ?>

<!-- cart -->
<div class="htheme_account_holder">
	<div class="htheme_box_toggle htheme_cart_box" data-toggle="open">
		<span class="vc_icon_element-icon fa fa-shopping-bag"></span>
		<a class="htheme_icon_nav_cart">
			<img class="[ middle inline-block ]" src="<?php echo get_stylesheet_directory_uri(); ?>/htheme/assets/images/icons/shop.png" alt="icono carrito">
			<span class="[ middle inline-block ]"><!-- LOAD CART COUNT --></span>
		</a>
		<div class="htheme_large_white_box htheme_white_box">
			<div class="htheme_box_inner">
				<div class="htheme_box_item" data-id="1">
					<div class="htheme_box_heading"><?php esc_html_e('CARRITO', 'invogue'); ?></div>
				</div>
				<div class="htheme_box_line"></div>
				<div class="htheme_box_item htheme_no_items" data-id="2">
					<?php esc_html_e('You currently don\'t have any items in your cart.', 'invogue'); ?>
				</div>
				<div class="htheme_box_item htheme_has_items" data-id="2">
					<div class="htheme_box_cart_items">
						<!-- LOAD CART ITEMS -->
					</div>
				</div>
				<div class="htheme_box_line htheme_has_items"></div>
				<div class="htheme_box_item htheme_has_items" data-id="3">
					<div class="htheme_box_price"><!-- SHOW TOTAL --></div>
				</div>
				<div class="htheme_box_line htheme_has_items"></div>
				<div class="htheme_box_item htheme_has_items" data-id="4">
					<div class="htheme_button_holder">
						<a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="htheme_button_container">
							<?php esc_html_e('VER CARRITO', 'invogue'); ?>
						</a>
						<a href="<?php echo esc_url($woocommerce->cart->get_checkout_url()); ?>" class="htheme_button_container [ margin-top--small ]">
							<?php esc_html_e('FINALIZAR COMPRA', 'invogue'); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- DO COUNT -->
<?php
	$social_count = 0;
	foreach($htheme_social_items as $social){
		if($social['status'] == 'true'){
			$social_count++;
		}
	}
?>
<?php if($social_count > 0 && $htheme_show_social == 'true'){ ?>
<div class="htheme_share htheme_box_toggle" data-toggle="open">
	<?php esc_html_e('SOCIAL', 'invogue'); ?>
	<div class="htheme_small_white_box htheme_white_box">
		<div class="htheme_box_inner">
			<?php
				$count = 1;
				foreach($htheme_social_items as $social){
					if($social['status'] == 'true'){
			?>
					<a href="<?php echo esc_url($social['url']); ?>" target="<?php echo esc_attr($social['target']); ?>" class="htheme_box_item htheme_icon_social_<?php echo esc_attr($social['label']); ?>" data-id="<?php echo esc_attr($count); ?>"></a>
			<?php
						$count++;
					}
				}
			?>
		</div>
	</div>
</div>
<?php } ?>

<?php

?>
<?php #WPML CODE
if ( function_exists('icl_object_id') ) {
	$wpml_languages = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
	if(1 < count($wpml_languages)){ ?>
	<div class="htheme_language htheme_box_toggle" data-toggle="open">
		<?php
			if(isset($_GET['lang'])){
				echo esc_html($_GET['lang']);
			} else {
				echo $sitepress->get_default_language();
			}
		?>
		<div class="htheme_small_white_box htheme_white_box">
			<div class="htheme_box_inner">
				<?php
				$count = 1;
				foreach($wpml_languages as $lang){
					?>
					<a href="<?php echo esc_url($lang['url']); ?>" class="htheme_box_item" data-id="<?php echo esc_attr($count); ?>">
						<?php echo esc_html($lang['language_code']); ?>
					</a>
					<?php
					$count++;
				}
				?>
			</div>
		</div>
	</div>
<?php }} ?>
