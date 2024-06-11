<?php
vc_map(
        array(
            "name" => __("Banner", ULTIMA_NAME),
            "description" => __("Set banners here", ULTIMA_NAME),
            "base" => "car_repair_services_banner",
            "class" => "",
            "icon" => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
            "weight" => 1000,
            "controls" => "full",
            "category" => __('Car Repair'),
            "params" => array(
                array(
                    'type' => 'dropdown',
                    'heading' => __('Background Type', ULTIMA_NAME),
                    'param_name' => 'view_type',
                    'value' => array(
                        'Text & Image' => 'text',
                        'Only Image' => 'image',
                    ),
                    'description' => __('Select background type.', ULTIMA_NAME),
                    "admin_label" => true,
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => "Heading",
                    "param_name" => "heading",
                    "holder" => "div",
                    "admin_label" => false,
                    'dependency' => array(
                        'element' => 'view_type',
                        'value' => 'text',
                    ),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => "Sub Heading",
                    "param_name" => "sub_heading",
                    'dependency' => array(
                        'element' => 'view_type',
                        'value' => 'text',
                    ),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => "Short Description",
                    "param_name" => "short_description",
                    'dependency' => array(
                        'element' => 'view_type',
                        'value' => 'text',
                    ),
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => __('Image', 'js_composer'),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => __('Select image from media library.', 'js_composer'),
                    'admin_label' => true,
                ),
                array(
                    "type" => "vc_link",
                    "holder" => "div",
                    "heading" => "Action Button",
                    "param_name" => "call_action",
                    'dependency' => array(
                        'element' => 'view_type',
                        'value' => 'image',
                    ),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => "Add Extra Class",
                    "param_name" => "extra_class",
                ),
            )
        )
);
vc_map(array(
    "name" => "Banner  Slider Container",
    "description" => __("Banner slider will work for small devices", ULTIMA_NAME),
    "base" => "car_repair_services_banner_container",
    "class" => "",
    "category" => 'Car Repair',
    "icon" => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    "as_parent" => array('only' => 'car_repair_services_banner'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Heading",
            "param_name" => "heading",
            "value" => "What we Do"
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Sub Heading",
            "param_name" => "sub_heading",
            "value" => "We offer full service auto repair &amp; maintenance"
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Do the Slides scroll?", 'car_repair_services'),
            "param_name" => "slides_to_scroll",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false'
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Is infinite?", 'car_repair_services'),
            "param_name" => "infinite",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false'
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Autoplay", 'car_repair_services'),
            "param_name" => "autoplay",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false'
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Arrows", 'car_repair_services'),
            "param_name" => "arrows",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false'
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Dots", 'car_repair_services'),
            "param_name" => "dots",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false'
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Add Extra Class",
            "param_name" => "extra_class",
        ),
    )
));

vc_map(array(
    "name" => "Marker List",
    "description" => __("Car Repair Marker List Services", ULTIMA_NAME),
    "base" => "car_repair_marker_list",
    "class" => "",
    "category" => 'Car Repair',
    "icon" => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    "as_parent" => array('only' => 'car_repair_services_banner'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Heading",
            "param_name" => "heading",
            "holder" => "div",
            "admin_label" => false,
            'value' => 'Our Services'
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Sub Heading",
            "param_name" => "sub_heading",
            'value' => 'Below are some of the many auto repair services we offer:'
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Add Extra Class",
            "param_name" => "extra_class",
        ),
    )
));



if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_Car_Repair_Services_Banner_Container extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_Car_Repair_Services_Banner extends WPBakeryShortCode {
        
    }

}