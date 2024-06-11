<?php

class ContactForm
{


	public function __construct()
	{
		add_shortcode('service_estimate_contact_form', array($this, 'contact_form_shortcode'));
		add_action('rwmb_frontend_before_submit_button', array($this, 'listing_fields'));
		add_filter('rwmb_frontend_insert_post_data', array($this, 'post_data'), 10, 2);
		add_action('rwmb_frontend_after_save_post', array($this, 'add_service_data'));
		// add_action( 'rwmb_frontend_after_save_post', [ $this, 'send_notification' ] );
	}

	public function contact_form_shortcode()
	{
		$shortcode = "[mb_frontend_form id='service_estimate_contact_form' submit_button='" . __('Send Message', 'estimate-plugin') . "']";
		return do_shortcode($shortcode);
	}

	function service_estimate_options( $option, $default = false ) {
		$options = get_option( 'service_estimate_options' );
		$return  = isset( $options[ $option ] ) ? $options[ $option ] : $default;
		return $return;
	}

	public function listing_fields( $config ) {
		if ( 'service_estimate_contact_form' !== $config['id'] ) {
			return;
		}
		$termsmake = get_terms(
			array(
				'taxonomy'   => 'make-brand',
				'number'     => 9,
				'include'    => isset($_GET['make']) ? sanitize_text_field($_GET['make']) : '',
				'hide_empty' => false,
			)
		);
		$termsmdel = get_terms(
			array(
				'taxonomy'   => 'model-car',
				'number'     => 9,
				'include'    => isset($_GET['model']) ? sanitize_text_field($_GET['model']) : '',
				'hide_empty' => false,
			)
		);
		$termsyear = get_terms(
			array(
				'taxonomy'   => 'model-year',
				'number'     => 9,
				'include'    => isset($_GET['the_year']) ? sanitize_text_field($_GET['the_year']) : '',
				'hide_empty' => false,
			)
		);
		$serviceestimatekey = isset($_GET['serviceestimatekey']) ? sanitize_text_field($_GET['serviceestimatekey']) : '';
		$loop        = '';

		if (!empty($_GET['serviceestimate'])) {
			$argsservice = array(
				'post__in'  => $_GET['serviceestimate'], // ID of a page, post, or custom type
				'post_type' => 'service-estimate',
			);
			$loop        = new WP_Query($argsservice);
		} elseif (!empty($serviceestimatekey)) {
			$argsservice = array(
				's'         => $serviceestimatekey, // ID of a page, post, or custom type
				'post_type' => 'service-estimate',
			);
			$loop        = new WP_Query($argsservice);
		}


		$priceminglobal = array();
		$pricemaxglobal = array();
		$labMinGlobal   = array();
		$labMaxGlobal   = array();
		if (is_object($loop)) {
			if ($loop->have_posts()) {

				$countservice = 1;

				$servicenames = '';

				while ($loop->have_posts()) :
					$loop->the_post();
					$servicenames .= $countservice . '/ ' . get_the_title() . "\n";
					$countservice++;
					$metaparts      = service_estimate_meta('parts_service');
					$labMinGlobal[] = service_estimate_meta('labour_min_price');
					$labMaxGlobal[] = service_estimate_meta('labour_max_price');

					if (!empty($metaparts)) {
						$partArray = explode(',', $metaparts);

						$series = get_terms(
							array(
								'taxonomy'   => 'service-part',
								'number'     => 9,
								'include'    => $partArray,
								'hide_empty' => false,
							)
						);

						$keycount = 0;
						foreach ($series as $termid) {
							$keyid = get_the_ID();
							$key   = $keyid . '_' . $keycount;

							$partsname[$key] = $termid->name;

							$priceminglobal[] = rwmb_meta('min_price', array('object_type' => 'term'), $termid->term_id);
							$pricemaxglobal[] = rwmb_meta('max_price', array('object_type' => 'term'), $termid->term_id);
						}
					}
				endwhile;
			}
		}


		$summinglobal    = array_sum($priceminglobal);
		$sumLabMinGlobal = array_sum($labMinGlobal);
		$totMinGlobal    = $summinglobal + $sumLabMinGlobal;
		$summaxglobal    = array_sum($pricemaxglobal);
		$sumLabMaxGlobal = array_sum($labMaxGlobal);
		$totMaxGlobal    = $summaxglobal + $sumLabMaxGlobal;
		$currency         = service_estimate_options( 'currency', '$' );

		echo '<input type="hidden" name="service_car" value="' . $termsyear[0]->name . ' ' . $termsmake[0]->name . ' ' . $termsmdel[0]->name . '">';

		if (!empty($servicenames)) {
			echo '<input type="hidden" name="service_names" value="' . $servicenames . '">';
		}

		echo '<input type="hidden" name="service_price" value="' . '$' . $totMinGlobal . ' - $' . $totMaxGlobal . '">';
	}

	public function post_data($data, $config)
	{
		if ('service_estimate_contact_form' !== $config['id']) {
			return $data;
		}
		$service_car = filter_input(INPUT_POST, 'service_car');

		$data['post_title'] = sprintf(__('Service on %s', 'estimate-plugin'), $service_car);
		return $data;
	}

	public function add_service_data($enquiry)
	{
		if ('service_estimate_contact_form' !== $enquiry->config['id']) {
			return;
		}

		$serviceNames = filter_input(INPUT_POST, 'service_names');
		$servicePrice = filter_input(INPUT_POST, 'service_price');
		if (!$serviceNames) {
			return;
		}
		// $listing_title  = get_the_title( $listing_id );
		// $listing_seller = auto_listings_meta( 'seller', $listing_id );
		update_post_meta($enquiry->post_id, '_serice_estimate_service_names', $serviceNames);
		update_post_meta($enquiry->post_id, '_serice_estimate_service_price', $servicePrice);
		// update_post_meta( $enquiry->post_id, '_serice_estimate_listing_seller', $listing_seller );
	}

	// public function send_notification( $enquiry ) {
	// if ( 'service_estimate_contact_form' !== $enquiry->config['id'] ) {
	// return;
	// }
	// $listing_id = get_post_meta( $enquiry->post_id, '_serice_estimate_listing_id', true );

	// $to      = $this->recipient( $listing_id );
	// $subject = $this->replace_placeholders( $this->subject(), $listing_id, $enquiry->post_id );
	// $message = $this->replace_placeholders( $this->message(), $listing_id, $enquiry->post_id );
	// $headers = $this->headers( get_post_meta( $enquiry->post_id, '_serice_estimate_email', true ) );

	// wp_mail( $to, $subject, $message, $headers );
	// $enquiries   = get_post_meta( $listing_id, '_serice_estimate_enquiries', true );
	// $enquiries = empty( $enquiries ) || ! is_array( $enquiries ) ? [] : $enquiries;
	// $enquiries[] = $enquiry->post_id;
	// update_post_meta( $listing_id, '_serice_estimate_enquiries', $enquiries );
	// }

	// protected function recipient( $listing_id ) {
	// $seller_id    = auto_listings_meta( 'seller', $listing_id );
	// $seller_email = get_the_author_meta( 'email', $seller_id ) ? get_the_author_meta( 'email', $seller_id ) : get_bloginfo( 'admin_email' );
	// return apply_filters( 'service_estimate_contact_form_recipient', sanitize_email( $seller_email ) );
	// }

	// protected function subject() {
	// $subject = auto_listings_option( 'contact_form_subject' );
	// if ( ! isset( $subject ) || empty( $subject ) ) {
	// $subject = __( 'New enquiry on listing #{listing_id}', 'estimate-plugin' );
	// }
	// return apply_filters( 'service_estimate_contact_form_subject', $subject );
	// }

	// protected function message() {
	// $message = auto_listings_option( 'contact_form_message' );
	// if ( ! isset( $message ) || empty( $message ) ) {
	// $message = __( 'Hi {seller_name},', 'estimate-plugin' ) . "\r\n" .
	// __( 'There has been a new enquiry on <strong>{listing_title}</strong>', 'estimate-plugin' ) . "\r\n" .
	// __( 'Name: {enquiry_name}', 'estimate-plugin' ) . "\r\n" .
	// __( 'Email: {enquiry_email}', 'estimate-plugin' ) . "\r\n" .
	// __( 'Phone: {enquiry_phone}', 'estimate-plugin' ) . "\r\n" .
	// __( 'Message: {enquiry_message}', 'estimate-plugin' ) . "\r\n";
	// }
	// return apply_filters( 'service_estimate_contact_form_message', wpautop( wp_kses_post( $message ) ) );
	// }

	// protected function headers( $enquiry_email ) {
	// $headers[] = 'From: ' . $this->email_from();
	// $headers[] = 'Reply-To: ' . $enquiry_email;
	// if ( $this->cc() ) {
	// $headers[] = 'Cc: ' . $this->cc();
	// }
	// if ( $this->bcc() ) {
	// $headers[] = 'Bcc: ' . $this->bcc();
	// }
	// $headers[] = 'Content-type: ' . $this->content_type();
	// return apply_filters( 'service_estimate_contact_form_headers', $headers );
	// }

	// protected function email_from() {
	// $from_email = auto_listings_option( 'email_from' ) ? auto_listings_option( 'email_from' ) : get_bloginfo( 'admin_email' );
	// $from_name  = auto_listings_option( 'email_from_name' ) ? auto_listings_option( 'email_from_name' ) : get_bloginfo( 'name' );
	// return apply_filters( 'auto_listings_email_from', wp_specialchars_decode( esc_html( $from_name ), ENT_QUOTES ) . ' <' . sanitize_email( $from_email ) . '>' );
	// }

	// protected function cc() {
	// $return = auto_listings_option( 'contact_form_cc' );
	// return apply_filters( 'service_estimate_contact_form_cc', $return );
	// }

	// protected function bcc() {
	// $return = auto_listings_option( 'contact_form_bcc' );
	// return apply_filters( 'service_estimate_contact_form_bcc', $return );
	// }

	// protected function content_type() {
	// $type = auto_listings_option( 'contact_form_email_type' );
	// return 'html_email' === $type ? 'text/html' : 'text/html';
	// }

	// protected function replace_placeholders( $string, $listing_id, $enquiry_id ) {
	// return str_replace( $this->placeholders(), $this->replacements( $listing_id, $enquiry_id ), __( $string ) );
	// }

	// protected function placeholders() {
	// $find                    = [];
	// $find['seller_name']     = '{seller_name}';
	// $find['listing_title']   = '{listing_title}';
	// $find['listing_id']      = '{listing_id}';
	// $find['enquiry_name']    = '{enquiry_name}';
	// $find['enquiry_email']   = '{enquiry_email}';
	// $find['enquiry_phone']   = '{enquiry_phone}';
	// $find['enquiry_message'] = '{enquiry_message}';
	// return apply_filters( 'service_estimate_contact_form_find', $find );
	// }

	// protected function replacements( $listing_id, $enquiry_id ) {
	// $replace                    = [];
	// $replace['seller_name']     = get_the_author_meta( 'display_name', get_post_meta( $enquiry_id, '_serice_estimate_listing_seller', true ) );
	// $replace['listing_title']   = get_the_title( $listing_id );
	// $replace['listing_id']      = $listing_id;
	// $replace['enquiry_name']    = get_post_meta( $enquiry_id, '_serice_estimate_name', true );
	// $replace['enquiry_email']   = get_post_meta( $enquiry_id, '_serice_estimate_email', true );
	// $replace['enquiry_phone']   = get_post_meta( $enquiry_id, '_serice_estimate_phone', true );
	// $replace['enquiry_message'] = get_post_meta( $enquiry_id, '_serice_estimate_message', true );
	// return apply_filters( 'service_estimate_contact_form_replace', $replace );
	// }
}

new ContactForm();
