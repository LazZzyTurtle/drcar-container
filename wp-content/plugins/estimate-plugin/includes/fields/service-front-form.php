<?php

$prefix = '_serice_estimate_';

$fields = [];

if ( is_admin() ) {
	$fields[10] = [
		'id'         => $prefix . 'service_names',
		'name'       => __( 'Service Names', 'estimate-plugin' ),
		'type'       => 'textarea',
		'attributes' => array(
			'disabled'  => true,
			'minlength' => 30,
		),
	];
	$fields[20] = [
		'id'         => $prefix . 'service_price',
		'name'       => __( 'Price', 'estimate-plugin' ),
		'type'       => 'text',
		'attributes' => array(
			'disabled'  => true,
			'minlength' => 30,
		),
	];
	$fields[40] = [
		'type' => 'heading',
		'name' => __( 'Contact Information', 'estimate-plugin' ),
	];
}

$fields[] = [
	'id'          => $prefix . 'name',
	'type'        => 'text',
	'required'    => true,
	'placeholder' => __( 'Your Name*', 'estimate-plugin' ),
];

$fields[] = [
	'id'          => $prefix . 'phone',
	'type'        => 'text',
	'required'    => true,
	'placeholder' => __( 'Your Phone*', 'estimate-plugin' ),
];

$fields[] = [
	'id'          => $prefix . 'email',
	'type'        => 'text',
	'required'    => true,
	'placeholder' => __( 'Your E-mail*', 'estimate-plugin' ),
];

$fields[] = [
	'id'          => $prefix . 'msg',
	'type'        => 'textarea',
	'required'    => true,
	'placeholder' => __( 'Additional questions or comments', 'estimate-plugin' ),
	'rows'        => 12,
	'cols'        => 30,

];

$fields[] = [
	'id'       => 'contact_check',
	'type'     => 'checkbox',
	'required' => true,
	'std'      => 0,
];


$fields = apply_filters( 'service_estimates_metabox_front_form', $fields );

ksort( $fields );

return [
	'id'         => 'service_estimate_contact_form',
	'title'      => __( 'Frontend Form', 'estimate-plugin' ),
	'post_types' => 'service-contact',
	'fields'     => $fields,
];
