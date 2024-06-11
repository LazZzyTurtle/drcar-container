<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function service_estimate_options( $option, $default = false ) {
	$options = get_option( 'service_estimate_options' );
	$return  = isset( $options[ $option ] ) ? $options[ $option ] : $default;
	return $return;
}

function service_estimate_meta( $meta, $post_id = 0 ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$meta_key = '_serice_estimate_' . $meta;

	$data = get_post_meta( $post_id, $meta_key, true );
	return $data;
}

add_filter( 'query_vars', 'add_query_vars' );
function add_query_vars( $vars ) {
	$vars[] = 'estimateresult';
	return $vars;
}

add_action( 'init', 'pmg_rewrite_add_rewrites' );
function pmg_rewrite_add_rewrites() {
	add_rewrite_endpoint( 'estimateresult', EP_ALL );
}
add_action( 'template_redirect', 'pmg_rewrite_catch_form' );
function pmg_rewrite_catch_form() {
	if ( get_query_var( 'estimateresult' ) && ! isset( $_POST['rwmb_form_config'] ) ) {

		do_action( 'estimate_loop_page' );

	}

}

function estimate_price_before() {
	$currency          = service_estimate_options( 'currency', '$' );
	$currency_position = service_estimate_options( 'currency_position', 'before' );
	if ( $currency_position == 'before' ) {
		echo $currency;
	} elseif ( $currency_position == 'before_space' ) {
		echo $currency . ' ';
	}
}

function estimate_price_after() {
	$currency          = service_estimate_options( 'currency', '$' );
	$currency_position = service_estimate_options( 'currency_position', 'before' );
	if ( $currency_position == 'after' ) {
		echo $currency;
	} elseif ( $currency_position == 'after_space' ) {
		echo ' ' . $currency;
	}

}

function service_item_remove() {
	$calcData['sdta']  = $_POST['stDta'];
	$calcData['minpr'] = $_POST['nmin'];
	$calcData['maxpr'] = $_POST['nmax'];

	echo json_encode( $calcData );
	exit();
}
add_action( 'wp_ajax_service_item_remove', 'service_item_remove' );
add_action( 'wp_ajax_nopriv_service_item_remove', 'service_item_remove' );

