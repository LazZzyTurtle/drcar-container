<?php
// Silence is golden.
add_action(
	'elementor/init',
	function() {
			\Elementor\Plugin::$instance->elements_manager->add_category(
				'car-repair-services',
				array(
					'title' => __( 'Car Repair', 'car-repair-services-core' ),
					'icon'  => 'fa fa-plug',
				),
				1
			);
	}
);

function car_repair_post_thumbnail_image( $size = 'full' ) {
	$car_repair_featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'car_galleries_home' );
	?>
	<picture>
		<source type="image/jpeg" srcset="<?php echo esc_url( $car_repair_featured_image_url ); ?>">
		<img src="<?php echo esc_url( $car_repair_featured_image_url ); ?>" alt="<?php esc_attr_e( 'Img', 'car-repair-services-core' ); ?>">
	</picture>
	<?php
}

if ( ! function_exists( 'car_custom_icon' ) ) {
	function car_custom_icon( $array ) {
		$plugin_url = plugins_url();
		return array(
			'custom-icon' => array(
				'name'          => 'custom-icon',
				'label'         => 'Car Icon',
				'url'           => '',
				'enqueue'       => array(
					$plugin_url . '/car-repair-services-core/car-repair-addons/iconfont/style.css',
				),
				'prefix'        => '',
				'displayPrefix' => '',
				'labelIcon'     => 'fab fa-font-awesome-alt',
				'ver'           => '5.9.0',
				'fetchJson'     => $plugin_url . '/car-repair-services-core/car-repair-addons/assets/js/icon.js',
				'native'        => 1,
			),
		);
	}
}
add_filter( 'elementor/icons_manager/additional_tabs', 'car_custom_icon' );

if ( ! function_exists( 'get_contact_form_7_posts' ) ) :

	function get_contact_form_7_posts() {

		$args = array(
			'post_type'      => 'wpcf7_contact_form',
			'posts_per_page' => -1,
		);

		$catlist = array();

		if ( $categories = get_posts( $args ) ) {
			foreach ( $categories as $category ) {
				(int) $catlist[ $category->ID ] = $category->post_title;
			}
		} else {
			(int) $catlist['0'] = esc_html__( 'No contect From 7 form found', 'void' );
		}
		return $catlist;
	}

  endif;

function get_elementor_library() {
	$pageslist = get_posts(
		array(
			'post_type'      => 'elementor_library',
			'posts_per_page' => -1,
		)
	);
	$pagearray = array();
	if ( ! empty( $pageslist ) ) {
		foreach ( $pageslist as $page ) {
			$pagearray[ $page->ID ] = $page->post_title;
		}
	}
	return $pagearray;
}

function get_all_post() {

	$options           = array();
	$post_types        = get_post_types();
	$post_type_not__in = array( 'attachment', 'revision', 'nav_menu_item', 'custom_css', 'customize_changeset', 'elementor_library' );
	foreach ( $post_type_not__in as $post_type_not ) {
		unset( $post_types[ $post_type_not ] );
	}
	$post_type = array_values( $post_types );
	$all_posts = get_posts(
		array(
			'post_type' => $post_type,
		)
	);

	if ( ! empty( $all_posts ) && ! is_wp_error( $all_posts ) ) {
		foreach ( $all_posts as $post ) {
			$this->options[ $post->ID ] = strlen( $post->post_title ) > 20 ? substr( $post->post_title, 0, 20 ) . '...' : $post->post_title;
		}
	}
	return $this->options;
}

if ( ! function_exists( 'get_contact_widget' ) ) :

	function get_contact_widget() {
		global $wp_registered_sidebars;
		if ( $wp_registered_sidebars ) {
			foreach ( $wp_registered_sidebars as $cform ) {
				$id                   = $cform['id'];
				$name                 = $cform['name'];
				$contact_forms[ $id ] = $name;
			}
		} else {
			$contact_forms[ __( 'No contact forms found', 'car-repair-services-core' ) ] = 0;
		}
		return $contact_forms;
	}

endif;


function getContactFormId() {

	$contact_forms = array();
	$cf7           = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
	if ( $cf7 ) {
		foreach ( $cf7 as $cform ) {
			$contact_forms[ $cform->ID ] = $cform->post_title;
		}
	} else {
		$contact_forms[ __( 'No contact forms found', 'car-repair-services-core' ) ] = 0;
	}
	return $contact_forms;
}

if ( ! function_exists( 'get_contact_form_7_posts' ) ) :

	function get_contact_form_7_posts() {
		$args    = array(
			'post_type'      => 'wpcf7_contact_form',
			'posts_per_page' => -1,
		);
		$catlist = array();
		if ( $categories = get_posts( $args ) ) {
			foreach ( $categories as $category ) {
				(int) $catlist[ $category->ID ] = $category->post_title;
			}
		} else {
			(int) $catlist['0'] = esc_html__( 'No contect From 7 form found', 'void' );
		}
		return $catlist;
	}

endif;

if ( ! function_exists( 'get_all_pages' ) ) :

	function get_all_pages() {
		$args    = array(
			'post_type'      => 'page',
			'posts_per_page' => -1,
		);
		$catlist = array();
		if ( $categories = get_posts( $args ) ) {
			foreach ( $categories as $category ) {
				(int) $catlist[ $category->ID ] = $category->post_title;
			}
		} else {
			(int) $catlist['0'] = esc_html__( 'No Pages Found!', 'void' );
		}
		return $catlist;
	}
endif;


/**
 * Strip all the tags except allowed html tags
 *
 * The name is based on inline editing toolbar name
 *
 * @param  string $string
 * @return string
 */
function car_kses_basic( $string = '' ) {
	return wp_kses( $string, car_get_allowed_html_tags( 'basic' ) );
}

/**
 * Strip all the tags except allowed html tags
 *
 * The name is based on inline editing toolbar name
 *
 * @param  string $string
 * @return string
 */
function car_kses_intermediate( $string = '' ) {
	return wp_kses( $string, car_get_allowed_html_tags( 'intermediate' ) );
}

function car_get_allowed_html_tags( $level = 'basic' ) {
	$allowed_html = array(
		'b'      => array(),
		'i'      => array(),
		'u'      => array(),
		'em'     => array(),
		'br'     => array(),
		'abbr'   => array(
			'title' => array(),
		),
		'span'   => array(
			'class' => array(),
		),
		'strong' => array(),
	);

	if ( $level === 'intermediate' ) {
		$allowed_html['a'] = array(
			'href'  => array(),
			'title' => array(),
			'class' => array(),
			'id'    => array(),
		);
	}

	return $allowed_html;
}
