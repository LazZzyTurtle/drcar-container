<?php
/**
 * The main class that handles frontend forms.
 *
 * @package    Meta Box
 * @subpackage MB Frontend Form Submission
 */

/**
 * Frontend form class.
 */
class MB_Frontend_Form {
	/**
	 * Meta box object.
	 *
	 * @var array
	 */
	public $meta_boxes;

	/**
	 * The object model that meta box is for. Default is post.
	 *
	 * @var MB_Frontend_Object_Model
	 */
	public $object;

	/**
	 * Form configuration.
	 *
	 * @var array
	 */
	public $config;

	/**
	 * Constructor.
	 *
	 * @param array                    $meta_boxes Meta box array.
	 * @param MB_Frontend_Object_Model $object     Object model where the custom fields belong to.
	 * @param array                    $config     Form configuration.
	 */
	public function __construct( $meta_boxes, MB_Frontend_Object_Model $object, $config ) {
		$this->meta_boxes = array_filter( $meta_boxes, array( $this, 'is_meta_box_visible' ) );
		$this->object     = $object;
		$this->config     = $config;
	}

	/**
	 * Output the form.
	 */
	public function render() {
		if ( empty( $this->meta_boxes ) ) {
			return;
		}

		$this->enqueue();

		if ( $this->is_processed() ) {
			do_action( 'rwmb_frontend_before_display_confirmation', $this->config );
			$this->display_confirmation();
			do_action( 'rwmb_frontend_after_display_confirmation', $this->config );

			return;
		}

		do_action( 'rwmb_frontend_before_form', $this->config );

		echo '<form class="rwmb-form" method="post" enctype="multipart/form-data" encoding="multipart/form-data">';
		$this->render_hidden_fields();

		// Register wp color picker scripts for frontend.
		$this->register_scripts();
		wp_localize_jquery_ui_datepicker();

		$this->object->render();

		foreach ( $this->meta_boxes as $meta_box ) {
			$meta_box->enqueue();
			$meta_box->show();
		}

		do_action( 'rwmb_frontend_before_submit_button', $this->config );
		echo '<div class="rwmb-field rwmb-button-wrapper rwmb-form-submit"><button class="rwmb-button" name="rwmb_submit" value="1">', esc_html( $this->config['submit_button'] ), '</button></div>';
		do_action( 'rwmb_frontend_after_submit_button', $this->config );

		echo '</form>';

		do_action( 'rwmb_frontend_after_form', $this->config );
	}

	/**
	 * Check if a meta box is visible.
	 * @param  \RW_Meta_Box $meta_box Meta Box object.
	 * @return bool
	 */
	public function is_meta_box_visible( $meta_box ) {
		if ( empty( $meta_box ) ) {
			return false;
		}
		if ( is_callable( $meta_box, 'is_shown' ) ) {
			return $meta_box->is_shown();
		}
		$show = apply_filters( 'rwmb_show', true, $meta_box->meta_box );
		return apply_filters( "rwmb_show_{$meta_box->id}", $show, $meta_box->meta_box );
	}

	/**
	 * Process the form.
	 * Meta box auto hooks to 'save_post' action to save its data, so we only need to save the post.
	 */
	public function process() {
		$is_valid = true;
		foreach ( $this->meta_boxes as $meta_box ) {
			$is_valid = $is_valid && $meta_box->validate();
		}

		$is_valid  = apply_filters( 'rwmb_frontend_validate', $is_valid, $this->config );
		$object_id = false;

		if ( $is_valid ) {
			do_action( 'rwmb_frontend_before_process', $this->config );
			$object_id             = $this->object->save();
			$this->object->post_id = $object_id;
			do_action( 'rwmb_frontend_after_process', $this->config, $object_id );
		}
		return $object_id;
	}

	/**
	 * Register scripts.
	 */
	private function register_scripts() {
		if ( wp_script_is( 'iris', 'registered' ) ) {
			return;
		}
		wp_register_script( 'iris', admin_url( 'js/iris.min.js' ), array(
			'jquery-ui-draggable',
			'jquery-ui-slider',
			'jquery-touch-punch',
		), '1.0.7', true );
		wp_register_script( 'wp-color-picker', admin_url( 'js/color-picker.min.js' ), array( 'iris' ), '', true );

		wp_localize_script( 'wp-color-picker', 'wpColorPickerL10n', array(
			'clear'         => __( 'Clear', 'mb-frontend-submission' ),
			'defaultString' => __( 'Default', 'mb-frontend-submission' ),
			'pick'          => __( 'Select Color', 'mb-frontend-submission' ),
			'current'       => __( 'Current Color', 'mb-frontend-submission' ),
		) );
	}

	/**
	 * Enqueue scripts and styles for the forms.
	 */
	private function enqueue() {
		wp_enqueue_style( 'mb-frontend-form', MB_FRONTEND_SUBMISSION_URL . 'css/style.css', '', '1.0' );

		wp_enqueue_script( 'mb-frontend-form', MB_FRONTEND_SUBMISSION_URL . 'js/script.js', array(), '1.0', true );
		wp_localize_script( 'mb-frontend-form', 'mbFrontendForm', array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		) );
	}

	/**
	 * Render hidden fields for form configuration.
	 */
	private function render_hidden_fields() {
		foreach ( $this->config as $key => $value ) {
			echo '<input type="hidden" name="rwmb_form_config[', esc_attr( $key ), ']" value="', esc_attr( $value ), '">';
		}
	}

	/**
	 * Check if the form is processed and process it if necessary.
	 *
	 * @return bool True if the form has been processed, false otherwise.
	 */
	private function is_processed() {
		$id = array();
		foreach ( $this->meta_boxes as $meta_box ) {
			$id[] = $meta_box->id;
		}
		$id = implode( ',', $id );

		return filter_input( INPUT_GET, 'rwmb-form-submitted' ) === $id;
	}

	/**
	 * Display confirmation message.
	 */
	private function display_confirmation() {
		MB_Frontend_Helpers::load_template( 'confirmation', '', $this->config );
	}
}
