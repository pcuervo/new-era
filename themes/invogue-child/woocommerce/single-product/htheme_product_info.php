<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<!-- ROW -->
<div class="htheme_row htheme_single_product_options htheme_no_padding [ hidden ]">
	<div class="htheme_container">
		<div class="htheme_inner_col">
			<div class="htheme_single_product_options_inner">
				<?php if($product->get_categories()){ ?>
					<span><?php echo $product->get_categories( ', ', '' . _n( 'Category:', '', -1, 'woocommerce' ) . ' ', '' ); ?> </span>
				<?php } ?>
				<?php if($product->get_sku()){ ?>
				<span class="[ hidden ]"> Product SKU: <a> <?php echo esc_html($product->get_sku()); ?> </a> </span>
				<?php } ?>
				<?php if($product->get_tags()){ ?>
					<span class="[ hidden ]"> Tags: <?php echo $product->get_tags( ', ', '' . _n( 'Tags:', '', -1, 'woocommerce' ) . ' ', '' ); ?> </span>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<!-- ROW -->

<!-- SILUETA -->

<div class="htheme_row">
	<div class="htheme_container">
		<div class="htheme_inner_col">
			<!-- TITLE SIDE BY SIDE ICON -->
			<div class="htheme_title_container" data-title-type="default">
				<div class="htheme_title"><h2 class="[ text-left ]">SILUETA 59FIFTY FITTED</h2></div>
			</div>
		</div>
	</div>
</div>
<div class="htheme_row">
	<div class="htheme_container">
		<!-- PRODUCT LIST -->
		<div class="htheme_product_list" data-type="htheme_contained_loader"> <!-- htheme_contained_loader, htheme_contained_carousel, htheme_full_carousel -->
			<div class="htheme_product_list_inner">
				<div class="htheme_col_4  htheme_product_list_item [ no-margin-bottom ]" data-hover-type="hover_product_list">
					<img src="http://localhost:8888/new-era/wp-content/uploads/2016/08/11360335-left.jpg" alt="silueta de producto">
					<h5>INTRODUCING THE 59FIFTY.</h5>
					<p>Contemporary and structured. The true fitted.</p>
				</div>
				<div class="htheme_col_4  htheme_product_list_item [ no-margin-bottom ]" data-hover-type="hover_product_list">
					<img src="http://localhost:8888/new-era/wp-content/uploads/2016/08/11360335-left.jpg" alt="silueta de producto">
					<h5>ORIGINATORS OF THE TRUE FITTED.</h5>
					<p>There are those that PLAY THE GAME, and then there are those that REDEFINE IT. No copies. No substitutes.</p>
				</div>
				<div class="htheme_col_4  htheme_product_list_item [ no-margin-bottom ]" data-hover-type="hover_product_list">
					<img src="http://localhost:8888/new-era/wp-content/uploads/2016/08/11360335-left.jpg" alt="silueta de producto">
					<h5>THE PINNACLE SILHOUETTE.</h5>
					<p>To the naked eye, the fitted cap has remained largely unchanged throughout the years. It's an enduring silhouette. A testament to the cap itself.</p>
				</div>
				</ul>
			</div>
		</div>
		<!-- PRODUCT LIST -->
	</div>
</div>