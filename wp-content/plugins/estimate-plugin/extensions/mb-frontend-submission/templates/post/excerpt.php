<?php
/**
 * The template file for post excerpt.
 *
 * @package    Meta Box
 * @subpackage MB Frontend Submission
 */

$excerpt = $data->post_id ? get_post_field( 'post_excerpt', $data->post_id ) : '';
$field   = apply_filters( 'rwmb_frontend_post_excerpt', array(
	'type' => 'textarea',
	'name' => esc_html__( 'Excerpt', 'rwmb-frontend-submission' ),
	'id'   => 'post_excerpt',
	'std'  => $excerpt,
) );
$field = RWMB_Field::call( 'normalize', $field );
RWMB_Field::call( $field, 'admin_enqueue_scripts' );
RWMB_Field::call( 'show', $field, false, $data->post_id );
