<?php

	#VARIABLES
	$image_details = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'full' );
	$col_style = 'htheme_col_10';

	#CHECK
	if($image_details[0] == ''){
		$col_style = 'htheme_col_11';
	}

	global $post, $product;

	#VARIABLES
	$price = get_post_meta( $post->ID, '_regular_price', true );
	$sale_price = get_post_meta( $post->ID, '_sale_price', true );

	#DATE
	$now = time(); // or your date as well
	$your_date = strtotime($post->post_date);
	$datediff = $now - $your_date;
	$days = floor($datediff/(60*60*24));

?>

<a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="htheme_search_row">
	<?php if($image_details[0] != ''){ ?>
	<div class="htheme_col_3 htheme_position htheme_search_image [ overflow--hidden ]">

		<div class="htheme_inner_col [  top--0--xs transform--0--xs ][ height--100p ]">
			<img class="[ width--100p min-height--100p ]" src="<?php echo esc_url($image_details[0]); ?>" alt="imagen de producto">
		</div>


		<?php if ( $product->is_on_sale() ) : ?>
			<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="htheme_onsale">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>
		<?php endif; ?>
		<?php
			#IF PRODUCT IS OLDER THAN 20 DAYS
			/*if($days <= 20){
				echo '<div class="htheme_product_list_new">'._e('NUEVO', 'invogue').'</div>';
			}

			#IF PRODUCT ON SALE SHOW TAG
			if($product->is_on_sale()){
				echo '<div class="htheme_product_list_percent">-' . round((($price - $sale_price ) / $price ) * 100) . '%</div>';
			}*/
		?>
	</div>
	<?php } ?>
	<div class="htheme_col_9 htheme_position">
		<div class="htheme_inner_col">
			<div class="htheme_row_content_wrap">
				<h4><?php echo esc_html($post->post_title); ?></h4>
				<?php if($post->post_excerpt){ ?>
					<p class="htheme_h4_sub"><?php echo rtrim(substr(esc_html($post->post_excerpt), 0, 90)); ?></p>
				<?php } ?>
				<p class="color-dark--all inline--all">
					<?php if ( $price_html = $product->get_price_html() ) : ?>
						<span class="price"><?php echo $price_html; ?></span>
					<?php endif; ?>
				</p>

				<!-- listones -->
				<div>
					<?php if (has_term( ( 'exclusivo-online' ), 'product_cat' )){ ?>
						<div class="htheme_product_list_new htheme_product_list_exclusivo-online [ inline-block ][ margin-right--small ]"><div></div>Exclusivo online</div>
					<?php } ?>
					<?php if (has_term( ( 'mas-vendido' ), 'product_cat' )){ ?>
						<div class="htheme_product_list_new htheme_product_list_mas-vendido [ inline-block ][ margin-right--small ]"><div></div>Más vendido</div>
					<?php } ?>
					<?php if (has_term( ( 'edicion-limitada' ), 'product_cat' )){ ?>
					<div class="htheme_product_list_new htheme_product_list_edicion-limitada [ inline-block ][ margin-right--small ]"><div></div>Edición limitada</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</a>