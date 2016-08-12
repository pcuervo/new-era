<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
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

global $product, $woocommerce_loop;

$upsells = $product->get_upsells();

if ( sizeof( $upsells ) === 0 ) {
	return;
}

$meta_query = WC()->query->get_meta_query();

$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => $posts_per_page,
	'orderby'             => $orderby,
	'post__in'            => $upsells,
	'post__not_in'        => array( $product->id ),
	'meta_query'          => $meta_query
);

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>

	<!-- ROW -->
	<div class="htheme_row">
		<div class="htheme_container">
			<div class="htheme_inner_col">
				<!-- TITLE SIDE BY SIDE ICON -->
				<div class="htheme_title_container" data-title-type="default">
					<div class="htheme_title"><h2><?php esc_html_e( 'You may also like&hellip;', 'woocommerce' ) ?></h2></div>
				</div>
			</div>
		</div>
	</div>
	<!-- ROW -->

	<!-- ROW -->
	<div class="htheme_row">
		<div class="htheme_container">
			<!-- PRODUCT LIST -->
			<div class="htheme_product_list" data-type="htheme_contained_loader"> <!-- htheme_contained_loader, htheme_contained_carousel, htheme_full_carousel -->
				<div class="htheme_product_list_inner">

					<?php woocommerce_product_loop_start(); ?>

					<?php while ( $products->have_posts() ) : $products->the_post(); ?>

						<?php wc_get_template_part( 'content', 'product' ); ?>

					<?php endwhile; // end of the loop. ?>

					<?php woocommerce_product_loop_end(); ?>

				</div>
			</div>
			<!-- PRODUCT LIST -->
		</div>
	</div>
	<!-- ROW -->

	<!-- GREY LINE -->
	<div class="htheme_row htheme_no_padding">
		<div class="htheme_container">
			<div class="htheme_inner_col">
				<div class="htheme_grey_line_separator"></div>
			</div>
		</div>
	</div>
	<!-- GREY LINE -->

<?php endif;

wp_reset_postdata();
