<?php

	#VARIABLES
	$image_details = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'full' );
	$col_style = 'htheme_col_10';

	#CHECK
	if($image_details[0] == ''){
		$col_style = 'htheme_col_11';
	}

	global $post, $product;

?>

<a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="htheme_search_row">
	<?php if($image_details[0] != ''){ ?>
	<div class="htheme_col_3 htheme_position htheme_search_image" style="background-image:url(<?php echo esc_url($image_details[0]); ?>)">
		<div class="htheme_inner_col"></div>
		<?php if ( $product->is_on_sale() ) : ?>
			<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="htheme_onsale">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>
		<?php endif; ?>
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
			</div>
		</div>
	</div>
</a>