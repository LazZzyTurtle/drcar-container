<?php
vc_map(array(
    "name" => "Blog Posts",
    "base" => "car_repair_services_post_loop",
    "icon" => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    "category" => 'Car Repair',
    "params" => array(
        array(
            "type" => "loop",
            "class" => "",
            "heading" => esc_html__("Select post loop", "car-repair-services"),
            "param_name" => "post_loop",
			"settings" => NULL,
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Layout', 'car-repair-services'),
            'param_name' => 'layout',
            'value' => array(
                'Default' => '',
                'Card view' => 'card',
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Pagination', 'car-repair-services'),
            'param_name' => 'is_pagination',
            'value' => array(
                'No pagination or post navigation' => '',
                'Post Navigation' => 'navigation',
                'Post Ajax load mote' => 'ajax-load',
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class', 'car-repair-services'),
            'param_name' => 'extra_class',
        ),
    )
));

if (class_exists('WPBakeryShortCodePost')) {

    class WPBakeryShortCode_Car_Repair_Services_Post_Loop extends WPBakeryShortCodePost {
        
    }

}