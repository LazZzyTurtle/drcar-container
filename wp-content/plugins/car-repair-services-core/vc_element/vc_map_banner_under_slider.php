<?php
vc_map(
    array(
        "name" => "Banner Under Slider",
        "description" => __("The banner for all services page to represent Trust Our Products", ULTIMA_NAME),
        "base" => "car_repair_services_banner_under_slider",
        "class" => "",
        "category" => "Car Repair",
        "icon" => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
        "params" => array( 
            array(
                "type" => "textfield",
                "heading" => __("Title", ULTIMA_NAME),
                "param_name" => "title",
                "value" => "After Hours",
                "admin_label" => true,
            ), 
            array(
                "type" => "textfield",
                "heading" => __("Title2", ULTIMA_NAME),
                "param_name" => "title2",
                "value" => "Drop-OFF",
                "admin_label" => true,
            ),              
            array(
                'type' => 'attach_image',
                'heading' => __('Key Image', 'js_composer'),
                'param_name' => 'image',
                'value' => '',
                'description' => __('Select image from media library.', 'js_composer'),
                'admin_label' => true,
            ),
            array(
                "type" => "vc_link",
                "holder" => "div",
                "heading" => "Action Link",
                "param_name" => "action_link",
            ),
            array(
                "type" => "textfield",
                "heading" => __("Add Extra Class", ULTIMA_NAME),
                "param_name" => "extra_class",
                "admin_label" => true,
             ),
            array(
               "type" => "textarea_html",
               "holder" => "div",
               "class" => "",
               "heading" => __( "Content", ULTIMA_NAME ),
               "param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
               "value" => __( "<p>We realize that you lead a busy life, so we've made it easy for you to drop off your vehicle 24/7.</p>", ULTIMA_NAME ),
               "description" => __( "Enter your content.", ULTIMA_NAME )
            )
        ),
    )
);
