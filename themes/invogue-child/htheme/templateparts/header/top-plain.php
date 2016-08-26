<?php $htheme_meta_layout = get_post_meta( $post->ID, 'htheme_meta_layout', true ); ?>
<?php $htheme_meta_title = get_post_meta( $post->ID, 'htheme_meta_title', true ); ?>
<?php $htheme_meta_devider = get_post_meta( $post->ID, 'htheme_meta_title_devider', true ); ?>
<?php $htheme_meta_excerpt = get_post_meta( $post->ID, 'htheme_meta_sub', true ); ?>
<?php $htheme_meta_devider_color = get_post_meta( $post->ID, 'htheme_meta_title_devider_color', true ); ?>
<?php if($htheme_meta_layout == '3' || !$htheme_meta_layout){ ?>
	<!-- ROW -->
<?php if ( is_page('mi-cuenta') || is_archive() ) { ?>
	<div class="htheme_row htheme_padding_bottom">
		<div class="htheme_container">
			<div class="htheme_inner_col">
				<!-- TITLE DEFAULT -->
					<div class="[ header-category ]">
						<h1><?php single_term_title() ?></h1>
					</div>
			</div>
		</div>
	</div>
<?php } ?>

	<!-- ROW -->
<?php } ?>