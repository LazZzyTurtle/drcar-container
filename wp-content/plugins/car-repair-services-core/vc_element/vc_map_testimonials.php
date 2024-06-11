<?php
vc_map(
    array(
        "name" => "Testimonials",
        "description" => __("Testimonials will work for small devices", ULTIMA_NAME),
        "base" => "car_repair_services_testimonials",
        "class" => "",
        "category" => "Car Repair",
        "icon" => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
        "params" => array(
            array(
                'type' => 'dropdown',
                'heading' => __('Style', ULTIMA_NAME),
                'param_name' => 'style',
                'value' => array(
                    'Slider' => 'slider',
                    'Grid' => 'grid'
                ),
                "admin_label" => true,
            ),
            array(
                "type" => "textfield",
                "heading" => __("Posts Per Page", ULTIMA_NAME),
                "param_name" => "per_page",
                "admin_label" => true,
            ),
            array(
                "type" => "textfield",
                "heading" => __("How many Slides to show?", ULTIMA_NAME),
                "param_name" => "slides_to_show",
                'group' => __( 'Slider Settings'),
                "admin_label" => true,
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Do the Slides scroll?", ULTIMA_NAME),
                "param_name" => "slides_to_scroll",
                'value' => array(
                    'Yes' => 'true',
                    'No' => 'false',
                ),
                'group' => __( 'Slider Settings'),
                "admin_label" => true,
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Is infinite?", ULTIMA_NAME),
                "param_name" => "infinite",
                'value' => array(
                    'Yes' => 'true',
                    'No' => 'false',
                ),
                'group' => __( 'Slider Settings'),
                "admin_label" => true,
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Enable autoplay", ULTIMA_NAME),
                "param_name" => "autoplay",
                'value' => array(
                    'Yes' => 'true',
                    'No' => 'false',
                ),
                'group' => __( 'Slider Settings'),
                "admin_label" => true,
            ),
            array(
                "type" => "textfield",
                "heading" => __("Autoplay Speed", ULTIMA_NAME),
                "param_name" => "autoplay_speed",
                'group' => __( 'Slider Settings'),
                "admin_label" => true,
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Enable Arrows", ULTIMA_NAME),
                "param_name" => "arrows",
                'value' => array(
                    'Yes' => 'true',
                    'No' => 'false',
                ),
                'group' => __( 'Slider Settings'),
                "admin_label" => true,
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Enable Dots", ULTIMA_NAME),
                "param_name" => "dots",
                'value' => array(
                    'Yes' => 'true',
                    'No' => 'false',
                ),
                'group' => __( 'Slider Settings'),
                "admin_label" => true,
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Enable Fading?", ULTIMA_NAME),
                "param_name" => "fade",
                'value' => array(
                    'Yes' => 'true',
                    'No' => 'false',
                ),
                'group' => __( 'Slider Settings'),
                "admin_label" => true,
            ),
            array(
                "type" => "textfield",
                "heading" => __("Add Extra Class", ULTIMA_NAME),
                "param_name" => "extra_class",
                "admin_label" => true,
             ),
        ),
    )
);
