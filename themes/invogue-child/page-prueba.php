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



<?php
$args = array(
    'number'     => $number,
    'orderby'    => 'title',
    'order'      => 'ASC',
    'hide_empty' => $hide_empty,
    'include'    => $ids
);
$product_categories = get_terms( 'product_cat', $args );
$count = count($product_categories);
if ( $count > 0 ){
    foreach ( $product_categories as $product_category ) {
        echo '<h4><a href="' . get_term_link( $product_category ) . '">' . $product_category->name . '</a></h4>';
        $args = array(
            'posts_per_page' => -1,
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    // 'terms' => 'white-wines'
                    'terms' => $product_category->slug
                )
            ),
            'post_type' => 'product',
            'orderby' => 'title,'
        );
        $products = new WP_Query( $args );
        echo "<ul>";
        while ( $products->have_posts() ) {
            $products->the_post();
            ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </li>
            <?php
        }
        echo "</ul>";
    }
}
?>



<?php get_footer(); ?>
