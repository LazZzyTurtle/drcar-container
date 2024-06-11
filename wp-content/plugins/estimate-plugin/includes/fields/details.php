<?php
$prefix = '_serice_estimate_';
$fields = [];


$fields[] = [
	'name'        => __( 'Parts', 'estimate-plugin' ),
	'id'          => $prefix . 'parts_service',
	'type'        => 'taxonomy_advanced',
	'taxonomy'    => 'service-part',
	'field_type'  => 'select_advanced',
	'placeholder' => 'Select Parts',
	'multiple'    => true,
];

$fields[] = [
	'name'        => __( 'Service Category', 'estimate-plugin' ),
	'id'          => $prefix . 'category',
	'type'        => 'taxonomy_advanced',
	'taxonomy'    => 'service-cat',
	'field_type'  => 'select_advanced',
	'placeholder' => 'Select Category',
	'multiple'    => false,
];

$fields[] = [
	'name'            => __( 'Years', 'estimate-plugin' ),
	'id'              => $prefix . 'years_service',
	'type'            => 'taxonomy_advanced',
	'taxonomy'        => 'model-year',
	'field_type'      => 'select_advanced',
	'placeholder'     => 'Select Years',
	'select_all_none' => true,
	'multiple'        => true,
];

$fields[] = [
	'name' => 'Maximum Price',
	'id'   => $prefix . 'labour_min_price',
	'type' => 'number',
];

$fields[] = [
	'name' => 'Maximum Price',
	'id'   => $prefix . 'labour_max_price',
	'type' => 'number',
];

ksort( $fields );

return [
	'id'         => $prefix . 'details',
	'title'      => __( 'Details', 'estimate-plugin' ),
	'post_types' => 'service-estimate',
	'fields'     => $fields,
];
