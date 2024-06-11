<?php
add_action( 'init', 'register_carrepair_gallery_postype' );

function register_carrepair_gallery_postype() {
	$labels = array(
		'name'               => __( 'Gallery', 'car-repair-services-core' ),
		'singular_name'      => __( 'Gallery', 'car-repair-services-core' ),
		'add_new'            => __( 'Add New', 'car-repair-services-core' ),
		'add_new_item'       => __( 'Add New Gallery', 'car-repair-services-core' ),
		'edit_item'          => __( 'Edit Gallery', 'car-repair-services-core' ),
		'new_item'           => __( 'New Gallery', 'car-repair-services-core' ),
		'view_item'          => __( 'View Gallery', 'car-repair-services-core' ),
		'search_items'       => __( 'Search Gallery', 'car-repair-services-core' ),
		'not_found'          => __( 'No Gallery found', 'car-repair-services-core' ),
		'not_found_in_trash' => __( 'No Gallery found in Trash', 'car-repair-services-core' ),
		'parent_item_colon'  => '',
	);

	register_post_type(
		'gallery',
		array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'query_var'          => true,
			'rewrite'            => true,
			'capability_type'    => 'post',
			'hierarchical'       => false,
			'menu_position'      => 10,
			'supports'           => array( 'title', 'editor', 'thumbnail' ),
			'rewrite'            => array( 'slug' => __( 'gallery', 'car-repair-services-core' ) ),
		)
	);

	$labels = array(
		'name'              => _x( 'Gallery Categories', 'portfolio categories', 'car-repair-services-core' ),
		'singular_name'     => _x( 'Gallery Category', 'portfolio category', 'car-repair-services-core' ),
		'search_items'      => __( 'Search Gallery Categories', 'car-repair-services-core' ),
		'all_items'         => __( 'All Gallery Categories', 'car-repair-services-core' ),
		'parent_item'       => __( 'Parent Gallery Category', 'car-repair-services-core' ),
		'parent_item_colon' => __( 'Parent Gallery Category:', 'car-repair-services-core' ),
		'edit_item'         => __( 'Edit Gallery Category', 'car-repair-services-core' ),
		'update_item'       => __( 'Update Gallery Category', 'car-repair-services-core' ),
		'add_new_item'      => __( 'Add New Gallery Category', 'car-repair-services-core' ),
		'new_item_name'     => __( 'New Gallery Category Name', 'car-repair-services-core' ),
		'menu_name'         => __( 'Gallery Category', 'car-repair-services-core' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'gallery-cat' ),
	);
	register_taxonomy( 'gallery-cat', array( 'gallery' ), $args );

}

/**
 * Display a Gallery
 *
 * @param  int    $post_per_page  The number of Gallerys you want to display
 * @param  string $orderby  The order by setting  https://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters
 * @param  array  $Gallery_id  The ID or IDs of the Gallery(s), comma separated
 *
 * @return  string  Formatted HTML
 */
function get_gallery( $posts_per_page = 1, $orderby = 'none', $gallery_id = null, $title = '' ) {
	$args = array(
		'posts_per_page' => (int) $posts_per_page,
		'post_type'      => 'gallery',
		'orderby'        => $orderby,
		'no_found_rows'  => true,
	);
	if ( $gallery_id ) {
		$args['post__in'] = array( $gallery_id );
	}

	$query = new WP_Query( $args );
	 $rand = rand( 000000, 999999 );
	 ob_start();
	if ( $query->have_posts() ) {
		$cats = get_terms(
			array(
				'taxonomy' => 'gallery-cat',
				'orderby'  => 'name',
				'order'    => 'ASC',
			)
		);
		?>
		<div class="filters-by-category">
			<ul class="option-set" data-option-key="filter">
				<li><a href="#filter" data-option-value="*" class="selected"><?php esc_html_e( 'All', 'car-repair-services-core' ); ?></a></li>
				<?php
				if ( ! empty( $cats ) && ! is_wp_error( $cats ) ) {
					foreach ( $cats as $cat ) {
						?>
				<li><a href="#filter" data-option-value=".<?php echo esc_attr( $cat->slug ); ?>" class=""><?php echo esc_html( $cat->name ); ?></a></li>
				<?php } ?>
				<?php } ?>
				
			</ul>
		</div>

		<?php

		echo '<div class="gallery gallery-isotope" id="gallery-' . $rand . '">';

		while ( $query->have_posts() ) :
			$query->the_post();
			$post_id      = get_the_ID();
			$categories   = wp_get_post_terms( $post_id, 'gallery-cat' );
			$client_image = get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'img-responsive-inline' ) );
			$image_url    = wp_get_attachment_url( get_post_thumbnail_id() );
			$cats_str     = '';
			if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
				foreach ( $categories as $k => $category ) {
					if ( $k > 0 ) {
						$cats_str .= ' ';
					}
					$cats_str .= $category->slug;
				}
			}
			?>
					<div class="gallery-item<?php echo esc_attr( $cats_str ); ?>">
						<div class="gallery-item-image">
					<?php echo $client_image; ?>
							<a class="hover" href="<?php echo esc_url( $image_url ); ?>">
								<span class="view">
								<span class="icon icon-search"></span>
								</span>
								<span class="tags">
								<span class="pull-left"><?php the_title(); ?></span>
								</span>
							</a>
						</div>
					</div>
					<?php
				endwhile;

		echo '</div>';

		wp_reset_postdata();
	}

	return ob_get_clean();
}
