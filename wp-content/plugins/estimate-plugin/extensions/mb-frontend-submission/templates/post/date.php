<?php
/**
 * The template file for post date.
 *
 * @package    Meta Box
 * @subpackage MB Frontend Submission
 */

$default = $data->post_id ? get_post_field( 'post_date', $data->post_id ) : '';
$field = apply_filters( 'rwmb_frontend_post_date', array(
	'type' => 'datetime',
	'name' => esc_html__( 'Date', 'rwmb-frontend-submission' ),
	'id'   => 'post_date',
	'std'  => $default,
) );
$field = RWMB_Field::call( 'normalize', $field );
RWMB_Field::call( $field, 'admin_enqueue_scripts' );
RWMB_Field::call( 'show', $field, false, $data->post_id );
