<?php
/**
 * Register form shortcode.
 *
 * @package    Meta Box
 * @subpackage MB Frontend Form Submission
 */

/**
 * Shortcode class.
 */
class MB_Frontend_Form_Shortcode {
	/**
	 * Initialization.
	 */
	public function init() {
		add_shortcode( 'mb_frontend_form', array( $this, 'shortcode' ) );
		if ( filter_input( INPUT_POST, 'rwmb_submit', FILTER_SANITIZE_STRING ) ) {
			add_action( 'template_redirect', array( $this, 'process' ) );
		}
	}

	/**
	 * Output the submission form in the frontend.
	 *
	 * @param array $atts Form parameters.
	 *
	 * @return string
	 */
	public function shortcode( $atts ) {
		$form = $this->get_form( $atts );
		if ( false === $form ) {
			return '';
		}
		ob_start();
		$form->render();

		return ob_get_clean();
	}

	/**
	 * Handle the form submit.
	 */
	public function process() {
		// @codingStandardsIgnoreLine
		$config = isset( $_POST['rwmb_form_config'] ) ? $_POST['rwmb_form_config'] : '';
		if ( empty( $config ) ) {
			return;
		}
		$form = $this->get_form( $config );
		if ( false === $form ) {
			return;
		}

		// Make sure to include the WordPress media uploader functions to process uploaded files.
		if ( ! function_exists( 'media_handle_upload' ) ) {
			require_once ABSPATH . 'wp-admin/includes/image.php';
			require_once ABSPATH . 'wp-admin/includes/file.php';
			require_once ABSPATH . 'wp-admin/includes/media.php';
		}

		$config['post_id'] = $form->process();
		$array_config      = array_filter( explode( ',', $config['id'] . ',' ) );
		$config_submit     = implode( ',', $array_config );

		$redirect = add_query_arg( 'rwmb-form-submitted', $config_submit );
		$redirect = apply_filters( 'rwmb_frontend_redirect', $redirect, $config );

		wp_safe_redirect( $redirect );
		die;
	}

	/**
	 * Get the form.
	 *
	 * @param array $args Form configuration.
	 *
	 * @return bool|MB_Frontend_Form Form object or false.
	 */
	private function get_form( $args ) {
		$args = shortcode_atts( array(
			// Meta Box ID.
			'id'            => '',

			// Post fields.
			'post_type'     => '',
			'post_id'       => 0,
			'post_status'   => 'publish',
			'post_fields'   => '',

			// Appearance options.
			'submit_button' => __( 'Submit', 'mb-frontend-submission' ),
			'confirmation'  => __( 'Your post has been successfully submitted. Thank you.', 'mb-frontend-submission' ),
		), $args );

		// Quick set the current post ID.
		if ( 'current' === $args['post_id'] ) {
			$args['post_id'] = get_the_ID();
		}

		// Allows developers to dynamically populate shortcode params via query string.
		$this->populate_via_query_string( $args );

		// Allows developers to dynamically populate shortcode params via hooks.
		$this->populate_via_hooks( $args );

		$meta_boxes   = array();
		$meta_box_ids = array_filter( explode( ',', $args['id'] . ',' ) );

		foreach ( $meta_box_ids as $meta_box_id ) {
			$meta_boxes[] = rwmb_get_registry( 'meta_box' )->get( $meta_box_id );
		}
		$meta_boxes = array_filter( $meta_boxes );
		if ( ! $meta_boxes ) {
			return false;
		}

		$meta_box_ids = array();
		foreach ( $meta_boxes as $meta_box ) {
			$meta_box->set_object_id( $args['post_id'] );
			if ( ! $args['post_type'] ) {
				$post_types        = $meta_box->post_types;
				$args['post_type'] = reset( $post_types );
			}
			$meta_box_ids[] = $meta_box->id;
		}

		$args['id'] = implode( ',', $meta_box_ids );

		$post = new MB_Frontend_Post( $args['post_type'], $args['post_id'], $args );

		return new MB_Frontend_Form( $meta_boxes, $post, $args );
	}

	/**
	 * Allows developers to dynamically populate shortcode params via query string.
	 *
	 * @param array $args Shortcode params.
	 */
	private function populate_via_query_string( &$args ) {
		foreach ( $args as $key => $value ) {
			$dynamic_value = filter_input( INPUT_GET, "rwmb_frontend_field_$key", FILTER_SANITIZE_STRING );
			if ( $dynamic_value ) {
				$args[ $key ] = $dynamic_value;
			}
		}
	}

	/**
	 * Allows developers to dynamically populate shortcode params via hooks.
	 *
	 * @param array $args Shortcode params.
	 */
	private function populate_via_hooks( &$args ) {
		foreach ( $args as $key => $value ) {
			$args[ $key ] = apply_filters( "rwmb_frontend_field_value_{$key}", $value, $args );
		}
	}
}
