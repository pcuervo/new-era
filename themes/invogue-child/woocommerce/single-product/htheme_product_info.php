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
 * @see 	http://docs.woothemes.com/document/template-structure/
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
				<span class="[ hidden ]">Product SKU: <a> <?php echo esc_html($product->get_sku()); ?> </a> </span>
				<?php } ?>
				<?php if($product->get_tags()){ ?>
					<span class="[ hidden ]">Tags: <?php echo $product->get_tags( ', ', '' . _n( 'Tags:', '', -1, 'woocommerce' ) . ' ', '' ); ?> </span>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<!-- ROW -->

<!-- SILUETA -->

<?php
	$taxSiluetas = array(
		'silueta',
	);

	$termsSiluetas = get_terms($taxSiluetas);
	$siluetas = $termsSiluetas[1];
	$siluetaSlug = $siluetas->slug;
	$siluetaName = $siluetas->name;

?>

<div class="htheme_row">
	<div class="htheme_container">
		<div class="htheme_inner_col">
			<!-- TITLE SIDE BY SIDE ICON -->
			<div class="htheme_title_container" data-title-type="default">
				<div class="htheme_title"><h2 class="[ text-left ]">Silueta <?php echo $siluetaName; ?></h2></div>
			</div>
		</div>
	</div>
</div>

<?php
$siluetaArgs = array(
	'post_type' => 'silueta',
	'tax_query' => array(
		array(
			'taxonomy' => 'tipo',
			'field'    => 'slug',
			'terms'    => $siluetaSlug
		),
	),
);
$siluetaQuery = new WP_Query( $siluetaArgs );
if( $siluetaQuery->have_posts() ) : while( $siluetaQuery->have_posts() ) : $siluetaQuery->the_post(); ?>
	<div class="htheme_row">
		<div class="htheme_container">
			<!-- PRODUCT LIST -->
			<div class="htheme_product_list" data-type="htheme_contained_loader"> <!-- htheme_contained_loader, htheme_contained_carousel, htheme_full_carousel -->
				<div class="htheme_product_list_inner">
					<?php the_content(); ?>
				</div>
			</div>
			<!-- PRODUCT LIST -->
		</div>
	</div>
<?php endwhile; endif; wp_reset_postdata(); ?>