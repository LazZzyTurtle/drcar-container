<?php
vc_map(array(
    "name" => "Slick Slider Two",
    "base" => "car_repair_slick_slider_2",
    "category" => 'Car Repair',
    "as_parent" => array('only' => 'car_repair_slick_slider_item_2'),
    "content_element" => true,
    "icon" => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    "show_settings_on_create" => false,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Animate Arrow", ULTIMA_NAME),
            "param_name" => "animate_arrow",
            'value' => array(
                'No' => 'false',
                'Yes' => 'true',
            ),
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
            'group' => __('Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "heading" => __("Autoplay Speed", ULTIMA_NAME),
            "param_name" => "autoplay_speed",
            'group' => __('Slider Settings'),
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
            'group' => __('Slider Settings'),
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
            'group' => __('Slider Settings'),
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
            'group' => __('Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "heading" => __("Speed", ULTIMA_NAME),
            "param_name" => "speed",
            'group' => __('Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Pause On Hover?", ULTIMA_NAME),
            "param_name" => "pause_on_hover",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false',
            ),
            'group' => __('Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Pause On Dots Hover?", ULTIMA_NAME),
            "param_name" => "pause_on_dots_hover",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false',
            ),
            'group' => __('Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "heading" => "Extra Class",
            "param_name" => "extra_class",
            'group' => __('Slider Settings'),
        )
    )
));

vc_map(array(
    "name" => "Slick Slider Items",
    "base" => "car_repair_slick_slider_item_2",
    "category" => 'Car Repair',
    "as_child" => array('only' => 'car_repair_slick_slider_2'),
    "content_element" => true,
    "icon" => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Slider Image", ULTIMA_NAME),
            "param_name" => "image",
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Text Position', ULTIMA_NAME),
            'param_name' => 'text_position',
            'value' => array(
                'Center' => 'center',
                'Left' => 'left',
            )
        ),
        array(
            "type" => "textfield",
            "heading" => "Heading",
            "param_name" => "heading",
            "admin_label" => false,
            "value" => 'Multi-Point'
        ),
        array(
            "type" => "textfield",
            "heading" => "Sub Heading",
            "param_name" => "sub_heading",
            "value" => 'Vehicle Inspection'
        ),
        array(
            "type" => "textarea",
            "heading" => "Content",
            "param_name" => "content",
            "value" => 'No-charge start, Stop and Steering check'
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Button Type", ULTIMA_NAME),
            "param_name" => "button_type",
            'value' => array(
                'Link' => 'link',
                'Appointment Popup' => 'popup',
            ),
            "admin_label" => true,
        ),
        array(
            "type" => "vc_link",
            "heading" => "Action Button",
            "param_name" => "call_action",
            "dependency" => Array(
                'element' => "button_type", 
                'value' => 'link'
                ) 
        ),
        array(
            "type" => "textfield",
            "heading" => "Button Text",
            "param_name" => "button_text",
            "value" => esc_html__("Schedule Service","ULTIMA_NAME"),
            "dependency" => Array(
                'element' => "button_type", 
                'value' => 'popup'
                ) 
        ),
        array(
            "type" => "textfield",
            "heading" => "Add Extra Class",
            "param_name" => "extra_class",
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Unique ID', ULTIMA_NAME),
            'param_name' => 'unqid',
            'value' => array(
                'unq' . str_replace('.', '', str_replace(' ', '', microtime())) . rand(1, 999) => 'unq' . str_replace('.', '', str_replace(' ', '', microtime())) . rand(1, 999),
            )
        ),
    )
));

if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_Car_Repair_Slick_Slider_2 extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_Car_Repair_Slick_Slider_Item_2 extends WPBakeryShortCode {
        
    }

}