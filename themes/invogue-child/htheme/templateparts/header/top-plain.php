<?php $htheme_meta_layout = get_post_meta( $post->ID, 'htheme_meta_layout', true ); ?>
<?php $htheme_meta_title = get_post_meta( $post->ID, 'htheme_meta_title', true ); ?>
<?php $htheme_meta_devider = get_post_meta( $post->ID, 'htheme_meta_title_devider', true ); ?>
<?php $htheme_meta_excerpt = get_post_meta( $post->ID, 'htheme_meta_sub', true ); ?>
<?php $htheme_meta_devider_color = get_post_meta( $post->ID, 'htheme_meta_title_devider_color', true ); ?>

<?php
$term_title = single_term_title('', false);
$term= get_term_by( 'name', $term_title, 'product_cat');
$term_ID = $term->term_id;
$cat_thumb_id = get_woocommerce_term_meta( $term_ID, 'thumbnail_id', true );
$cat_thumb_url = wp_get_attachment_image_src( $cat_thumb_id, 'full' );
?>

<?php if($htheme_meta_layout == '3' || !$htheme_meta_layout){ ?>
	<!-- ROW -->
	<?php if ( is_archive() ) { ?>
		<div class="htheme_row htheme_padding_bottom [ row_initial ]">
			<div class="htheme_container">
				<div class="htheme_inner_col">
					<!-- TITLE DEFAULT -->
						<div class="[ header-category ]" style="background-image: url(<?php echo $cat_thumb_url[0]; ?>)">
							<div class="[ bg-light--opacity ]">
								<h1><?php single_term_title(); ?></h1>
							</div>
						</div>
				</div>
			</div>
		</div>
	<?php } ?>
<?php } ?>