<?php
vc_map(array(
    "name" => "Services",
    "base" => "car_repair_services",
    "icon" => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    "category" => 'Car Repair',
    "params" => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Posts Per Tab', 'car_repair_services'),
            'param_name' => 'limit_per_tab',
            'value' => 6
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Posts Per Page', 'car_repair_services'),
            'param_name' => 'per_page',
            'value' => 18
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Order by', 'car-repair-services-core'),
            'param_name' => 'orderby',
            'value' => array(
                'Date' => 'date',
                'ID' => 'ID',
                'Title' => 'title',
                'Name' => 'name',
                'Modified' => 'modified',
                'Author' => 'author',
                'Rand' => 'rand',
            ),
            'description' => __('Select order type.', 'car-repair-services-core'),
            "admin_label"=> true,
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Sort Order', 'car-repair-services-core'),
            'param_name' => 'order',
            'value' => array('Descending' => 'DESC', 'Ascending' => 'ASC'),
            'description' => __('Select sorting order.', 'car-repair-services-core'),
            "admin_label"=> true,
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Select Column', 'car_repair_services'),
            'param_name' => 'column',
            'value' => array(
                '3' => 3,
                '2' => 2,
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Show Services With Page', 'car_repair_services'),
            'param_name' => 'pagination',
            'value' => array(
                'Yes' => 1,
                'No' => 0,
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Show Details Link', 'car_repair_services'),
            'param_name' => 'showlink',
            'value' => array(
                'Yes' => 1,
                'No' => 0,
            )
        ),
		array(
            'type' => 'dropdown',
            'heading' => esc_html__('Show Link In Grid', 'car_repair_services'),
            'param_name' => 'fullpartlink',
            'value' => array(
				'No' => 0,
                'Yes' => 1,
                
            )
        ),


        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class', 'car_repair_services'),
            'param_name' => 'extra_class',
        )
    )
));
