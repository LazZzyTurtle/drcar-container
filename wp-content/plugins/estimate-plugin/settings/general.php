<?php
return [
	'id'             => 'generals',
	'title'          => __( 'General Settings', 'estimate-plugin' ),
	'settings_pages' => 'service_estimates',
	'tab'            => 'general',
	'fields'         => [
		[
			'name' => __( 'Result Page Name', 'estimate-plugin' ),
			'id'   => 'rslt_page_name',
			'type' => 'text',
			'std'  => 'Your Repair Estimate',
		],
		[
			'name' => esc_html__( 'Payment Currency', 'estimate-plugin' ),
			'desc' => esc_html__( 'What Currency Payment', 'estimate-plugin' ),
			'id'   => 'currency',
			'type' => 'text',
		],
		[
			'name'    => esc_html__( 'Currency Position', 'estimate-plugin' ),
			'id'      => 'currency_position',
			'type'    => 'select_advanced',
			'options' => [
				'before'       => esc_html__( 'Before', 'estimate-plugin' ),
				'after'        => esc_html__( 'After', 'estimate-plugin' ),
				'before_space' => esc_html__( 'Before Space', 'estimate-plugin' ),
				'after_space'  => esc_html__( 'After Space', 'estimate-plugin' ),
			],
		],
		[
			'name'    => esc_html__( 'Show Price Range?', 'estimate-plugin' ),
			'id'      => 'est_price_range',
			'desc'    => esc_html__( 'If No Is Checked, Then The Lower Price Will Be Showed', 'estimate-plugin' ),
			'type'    => 'radio',
			'options' => array(
				'1' => esc_html__( 'Yes', 'estimate-plugin' ),
				'0' => esc_html__( 'No', 'estimate-plugin' ),
			),
			'std'     => '1',
			'inline'  => true,
		],
		[
			'name'    => esc_html__( 'Search Button on estimator search form?', 'estimate-plugin' ),
			'id'      => 'est_search_bt',
			'type'    => 'radio',
			'options' => array(
				'1' => esc_html__( 'Yes', 'estimate-plugin' ),
				'0' => esc_html__( 'No', 'estimate-plugin' ),
			),
			'std'     => '1',
			'inline'  => true,
		],
	],
];
