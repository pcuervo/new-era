<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

//if ( ! $post->post_excerpt ) {
//	return;
//}

global $product;
$id = $product->id;
?>

<div itemprop="description" class="htheme_single_product_excerpt htheme_default_content">
	<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
</div>
<div class="[ margin-bottom--large ]">
	<?php echo $product->get_categories( ', ', '<span class="htheme_single_product_category htheme_h2_sub ">' . _n( 'Category:', '', 'woocommerce' ) . ' ', '</span>' ); ?>
</div>
<!--<p>ID: <?php echo $id; ?></p>-->
<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
		<span class="sku_wrapper [ font-weight--200 ][ block margin-bottom ]"><?php esc_html_e( 'ID:', 'woocommerce' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>
<?php endif; ?>

<!-- link a guía de tallas -->
<a href="<?php echo site_url('/'); ?>/guia-de-tallas" class="[ line-height--50 ][ margin-bottom ] htheme_btn_style_1 btn-primary">Conoce tu talla</a>

