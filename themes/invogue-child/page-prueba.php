<?php get_header(); ?>
<section class="[ container ][ text-center ][ product-menu ]">
	<?php
	$taxonomy     = 'product_cat';
	$orderby      = 'name';
	$show_count   = 0;      // 1 for yes, 0 for no
	$pad_counts   = 0;      // 1 for yes, 0 for no
	$hierarchical = 1;      // 1 for yes, 0 for no
	$title        = '';
	$empty        = 1;

	$args = array(
		'taxonomy'     => $taxonomy,
		'orderby'      => $orderby,
		'show_count'   => $show_count,
		'pad_counts'   => $pad_counts,
		'hierarchical' => $hierarchical,
		'title_li'     => $title,
		'hide_empty'   => $empty
	);
	$all_categories = get_categories( $args );
	foreach ($all_categories as $cat) {
		$hasChildren = get_term_children($cat->term_id, $taxonomy);
		if($cat->category_parent == 0) {
			$category_id = $cat->term_id;
			if( $hasChildren ) {
				echo '<a class="[ dropdown-button btn ]" href="#" data-activates="'.$cat->slug.'">'. $cat->name .'</a>';
			} else {
				echo '<a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';
			}

			$args2 = array(
			    'taxonomy'     => $taxonomy,
			    'child_of'     => 0,
			    'parent'       => $category_id,
			    'orderby'      => $orderby,
			    'show_count'   => $show_count,
			    'pad_counts'   => $pad_counts,
			    'hierarchical' => $hierarchical,
			    'title_li'     => $title,
			    'hide_empty'   => $empty
	        );
	        $sub_cats = get_categories( $args2 );
	        if($sub_cats) { ?>
	        	<ul id="<?php echo $cat->slug; ?>" class="dropdown-content">
	            <?php foreach($sub_cats as $sub_category) {
					echo '<li><a href="'. get_term_link($sub_category->slug, 'product_cat') .'">'. $sub_category->name .'</a></li>';
	            } ?>
	            </ul>
	        <?php }
	    }
	}
	?>
</section>

<?php get_footer(); ?>
