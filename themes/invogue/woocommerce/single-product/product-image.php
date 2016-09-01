<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.6.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;


#VARIABLES
$image_src_array = array();
$variations = '';
if($product->product_type == 'variable'){
	$variations = $product->get_available_variations();
}

#BUILD IMAGE ARRAY
$image_src = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'full' );

#PUSH FIRST IMAGE INTO ARRAY
array_push($image_src_array, array('image'=> $image_src[0], 'type' => 'normal', 'variation' => ''));

#PUSH GALLERY IMAGES INTO ARRAY
foreach($product->get_gallery_attachment_ids() as $image_id){
	$img = wp_get_attachment_image_src( $image_id, 'full' );
	array_push($image_src_array, array('image'=> $img[0], 'type' => 'normal', 'variation' => ''));
}

#PUSH VARIATION IMAGES
if(isset($variations) && $variations != ''){
	foreach($variations as $var){
		array_push($image_src_array, array('image'=> $var['image_link'], 'type' => 'variation', 'variation' => $var['variation_id']));
	}
}

#HEIGHT
$htheme_height_change = '';
if(!$image_src_array[0]['image']){
	$htheme_height_change = 'htheme_height_change';
}

?>

<div class="htheme_single_product_image_container htheme_gallery_container <?php echo esc_attr($htheme_height_change); ?>">

	<?php if($image_src_array[0]['image']){ ?>
		<div class="htheme_single_product_thumbs">
			<?php

			#THUMBNAILS
			$htheme_thumb = 0;
			$htmeme_small_thumb = '';
			if(count($image_src_array) > 6){
				$htmeme_small_thumb = 'htmeme_small_thumb';
			}
			foreach($image_src_array as $img){
				$image = '';
				$variation_style = '';
				if($img['image']){
					$image = 'style="background-image:url('.esc_url($img['image']).');"';
				}
				if($img['type'] == 'variation'){
					$variation_style = 'htheme_hide_element';
				}
				if($img['image']){
					$htheme_thumb++;
				}
				?>
				<div class="htheme_single_product_thumb_item htheme_gallery_item <?php echo esc_attr($variation_style); ?> <?php echo esc_attr($htmeme_small_thumb); ?>" <?php if($img['variation']){ echo 'data-variation-img-link="'.$img['variation'].'"'; } ?> data-id="<?php echo esc_attr($htheme_thumb); ?>" data-gallery-src="<?php echo esc_url($img['image']); ?>" <?php echo $image; ?>></div>
				<?php

			}

			?>
		</div>

		<div class="htheme_single_product_featured">
			<!-- listones -->
			<?php if (has_term( ( 'exclusivo-online' ), 'product_cat' )){ ?>
				<div class="htheme_product_list_new htheme_product_list_exclusivo-online"><div></div>Exclusivo online</div>
			<?php } ?>
			<?php if (has_term( ( 'mas-vendido' ), 'product_cat' )){ ?>
				<div class="htheme_product_list_new htheme_product_list_mas-vendido"><div></div>Más vendido</div>
			<?php } ?>
			<?php if (has_term( ( 'edicion-limitada' ), 'product_cat' )){ ?>
			<div class="htheme_product_list_new htheme_product_list_edicion-limitada"><div></div>Edición limitada</div>
			<?php } ?>

			<div class="htheme_icon_single_product_featured_zoom htheme_activate_zoom" data-zoom-id="1"></div>
			<?php
			#MAIN IMAGE
			$htheme_main = 0;
			foreach($image_src_array as $img){
				$image = '';
				if($img['image']){
					$image = 'style="background-image:url('.esc_url($img['image']).');"';
					$htheme_no_img = '';
					$htheme_main++;
				?>
					<div class="htheme_single_product_featured_item" data-gallery-id="<?php echo esc_attr($htheme_main); ?>" <?php echo $image; ?>></div>
				<?php

				}
			}
			?>
		</div>
	<?php } ?>

</div>

