<?php

class AdminColumns {
	public $filter_fields = [
		'name'           => 'names',
		'email'          => 'emails',
	];

	public function __construct() {
		add_filter( 'manage_service-contact_posts_columns', [ $this, 'columns' ] );
		add_action( 'manage_service-contact_posts_custom_column', [ $this, 'show' ], 10, 2 );

		// sorting
		add_filter( 'manage_edit-service-contact_sortable_columns', [ $this, 'sortable_columns' ] );
		add_filter( 'request', [ $this, 'orderby_listing' ] );
		add_filter( 'request', [ $this, 'orderby_seller' ] );
		add_filter( 'request', [ $this, 'orderby_name' ] );
		add_filter( 'request', [ $this, 'orderby_email' ] );

		// filtering
		add_action( 'restrict_manage_posts', [ $this, 'show_filters' ] );
		add_action( 'parse_query', [ $this, 'filter' ] );
	}

	public function columns( $columns ) {
		$post_type = sanitize_text_field( $_GET['post_type'] );

		print_r($post_type);

		// die();

		/* Get taxonomies that should appear in the manage posts table. */
		$taxonomies = get_object_taxonomies( $post_type, 'objects' );
		$taxonomies = wp_filter_object_list( $taxonomies, [ 'show_admin_column' => true ], 'and', 'name' );

		/* Allow to filter the taxonomy columns. */
		$taxonomies = apply_filters( "manage_taxonomies_for_service_estimates_{$post_type}_columns", $taxonomies, $post_type );
		$taxonomies = array_filter( $taxonomies, 'taxonomy_exists' );

		/* Loop through each taxonomy and add it as a column. */
		foreach ( $taxonomies as $taxonomy ) {
			$columns[ 'taxonomy-' . $taxonomy ] = get_taxonomy( $taxonomy )->labels->name;
		}

		$columns['name']    = __( 'From Name', 'auto-listings' );
		$columns['email']   = __( 'From Email', 'auto-listings' );

		return $columns;
	}

	public function show( $column_name, $post_id ) {
		


		if ( $column_name == 'name' ) {
			$name = service_estimate_meta( 'name', $post_id );
			if ( ! $name ) {
				return;
			}

			echo esc_html( $name );
		}

		if ( $column_name == 'email' ) {
			$email = service_estimate_meta( 'email', $post_id );
			if ( ! $email ) {
				return;
			}

			echo esc_html( $email );
		}
	}

	public function sortable_columns( $columns ) {
		$columns['listing'] = 'listing_title';
		$columns['seller']  = 'listing_seller';
		$columns['name']    = 'name';
		$columns['email']   = 'email';
		return $columns;
	}

	public function orderby_listing( $vars ) {
		if ( isset( $vars['orderby'] ) && 'listing' == $vars['orderby'] ) {
			$vars = array_merge( $vars, [
				'meta_key' => '_serice_estimate_listing_title',
				'orderby'  => 'meta_value',
			] );
		}
		return $vars;
	}

	public function orderby_seller( $vars ) {
		if ( isset( $vars['orderby'] ) && 'seller' == $vars['orderby'] ) {
			$vars = array_merge( $vars, [
				'meta_key' => '_serice_estimate_listing_seller',
				'orderby'  => 'meta_value',
			] );
		}
		return $vars;
	}

	public function orderby_name( $vars ) {
		if ( isset( $vars['orderby'] ) && 'name' == $vars['orderby'] ) {
			$vars = array_merge( $vars, [
				'meta_key' => '_serice_estimate_name',
				'orderby'  => 'meta_value',
			] );
		}
		return $vars;
	}

	public function orderby_email( $vars ) {
		if ( isset( $vars['orderby'] ) && 'email' == $vars['orderby'] ) {
			$vars = array_merge( $vars, [
				'meta_key' => '_serice_estimate_email',
				'orderby'  => 'meta_value',
			] );
		}
		return $vars;
	}

	public function show_filters() {
		global $pagenow;
		$type = get_post_type() ? get_post_type() : 'service-contact';
		if ( isset( $_GET['post_type'] ) ) {
			$type = sanitize_text_field( $_GET['post_type'] );
		}

		//only add filter to post type you want
		if ( 'service-contact' == $type && is_admin() && $pagenow == 'edit.php' ) {

			$fields = $this->build_fields();

			if ( $fields ) {

				foreach ( $fields as $field => $values ) {
					asort( $values ); // sort our values
					$values = array_unique( $values ); // make them unique

					?>
					<select name='<?php echo esc_attr( $field ); ?>' id='<?php echo esc_attr( $field ); ?>' class='postform'>

						<option value=''><?php printf( __( 'Show all %s', 'auto-listings' ), $field ) ?></option>

						<?php foreach ( $values as $val => $text ) {
							$text = $field == 'sellers' ? get_the_author_meta( 'display_name', $val ) : $text;
							if ( empty( $val ) ) {
								continue;
							}
							?>
							<option value="<?php echo esc_attr( $val ) ?>" <?php if ( isset( $_GET[ $field ] ) ) selected( $_GET[ $field ], $val ); ?>><?php echo esc_html( $text ) ?></option>

							<?php
						} ?>

					</select>

					<?php
					reset( $values );
				}
			}
		}
	}

	private function build_fields() {
		$fields = '';

		// The Query args
		$args = [
			'post_type'      => 'service-contact',
			'posts_per_page' => '-1',
			'post_status'    => 'publish',
		];

		$listings = query_posts( $args );

		if ( $listings ) {
			$fields = [];
			foreach ( $listings as $listing ) {
				foreach ( $this->filter_fields as $field => $text ) {
					$val                     = service_estimate_meta( $field, $listing->ID );
					$fields[ $text ][ $val ] = $val;
				}
			}
		}

		/* Restore original Post Data */
		wp_reset_query();
		return $fields;
	}

	public function filter( $query ) {
		global $pagenow;
		$type = get_post_type() ? get_post_type() : 'service-contact';
		if ( isset( $_GET['post_type'] ) ) {
			$type = sanitize_text_field( $_GET['post_type'] );
		}
		if ( 'service-contact' !== $type || ! is_admin() || $pagenow !== 'edit.php' ) {
			return;
		}

		foreach ( $this->filter_fields as $field => $text ) {
			if ( isset( $_GET[ $text ] ) && $_GET[ $text ] != '' ) {
				$query->query_vars['meta_key']   = '_serice_estimate_' . $field;
				$query->query_vars['meta_value'] = sanitize_text_field( $_GET[ $text ] );
			}
		}
	}
}

new AdminColumns();
