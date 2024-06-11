<?php
return [
	'id'             => 'contact_setup',
	'title'          => __( 'Contact Setup', 'estimate-plugin' ),
	'settings_pages' => 'service_estimates',
	'tab'            => 'contact',
	'fields'         => [
		[
			'name' => __( 'Terms Link URL', 'estimate-plugin' ),
			'desc' => __( 'Link url for terms and conditions in result page', 'estimate-plugin' ),
			'id'   => 'terms_link_url',
			'type' => 'text',
			'std'  => '#',
		],

	],
];
