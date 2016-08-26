<?php
/*
Template Name: inVogue - FAQ Template
*/

get_header(); ?>

<!-- CONTENT HOLDER -->
<div class="htheme_content_holder">

	<!-- SET HEADER IF ON IS NOT SELECTED -->
	<?php get_template_part( 'htheme/templateparts/header/top', 'plain' ); ?>

	<?php

	#ARGS
	$args = array(
		'post_type' => 'faq',
		'posts_per_page' => -1,
		'orderby'=> 'menu_order',
		'order' => 'ASC',
		'offset' => 0
	);

	#GET POSTS
	query_posts($args);

	?>
	<?php if ( have_posts() ) : ?>
	<!-- ROW -->
	<div class="htheme_row_margin_top_bottom htheme_vc_row_contained">
		<div class="wpb_column vc_column_container vc_col-sm-12">
			<div class="vc_column-inner ">
				<div class="wpb_wrapper">
					<!-- ROW -->
					<div class="htheme_row">
						<div class="htheme_container">
							<div class="htheme_inner_col">
								<!-- TITLE DOUBLE TOP BOTTOM -->
								<div class="htheme_title_container" data-title-type="top_bottom">
									<div class="htheme_title">
										<h2>Preguntas frecuentes</h2>
									</div>
								</div>
							</div>
						</div>
					</div><!-- ROW -->
				</div>
			</div>
		</div>
	</div>
	<div class="htheme_row [ no-padding-top ]">
		<div class="htheme_container">
			<div class="htheme_inner_col">
				<div class="htheme_faq_holder">
					<?php while ( have_posts() ) : the_post(); ?>
						<!-- FAQ ITEM -->
						<div class="htheme_faq_item" data-toggle="open">
							<div class="htheme_faq_heading htheme_icon_faq">
								<div class="htheme_faq_heading_inner">
									<h4><?php esc_html(the_title()); ?></h4>
								</div>
							</div>
							<div class="htheme_faq_content">
								<div class="htheme_faq_content_inner htheme_default_content">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
						<!-- FAQ ITEM -->
					<?php endwhile; // end of the loop. ?>
				</div>
			</div>
		</div>
	</div>
	<!-- ROW -->
	<?php endif; ?>

	<!-- RESET QUERY -->
	<?php wp_reset_query(); ?>

	<!-- OUTPUT OTHER CONTENT -->
	<?php get_template_part( 'htheme/templateparts/content/the', 'content' ); ?>

</div>
<!-- CONTENT HOLDER -->

<?php get_footer(); ?>
