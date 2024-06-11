<?php
vc_map(array(
    "name" => "Slick Slider",
    "base" => "car_repair_slick_slider",
    "category" => 'Car Repair',
    "as_parent" => array('only' => 'car_repair_slick_slider_item'),
    "content_element" => true,
    "icon" => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    "show_settings_on_create" => false,
    "js_view" => 'VcColumnView',
    "params" => array(
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
            "heading" => __("Speed", ULTIMA_NAME),
            "param_name" => "speed",
            'group' => __( 'Slider Settings'),
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
            'group' => __( 'Slider Settings'),
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
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
		
        array(
            "type" => "textfield",
            "heading" => "Extra Class",
            "param_name" => "extra_class",
            'group' => __( 'Slider Settings'),
        )
    )
));

vc_map(array(
    "name" => "Slick Slider Items",
    "base" => "car_repair_slick_slider_item",
    "category" => 'Car Repair',
    "as_child" => array('only' => 'car_repair_slick_slider'),
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
                'Right' => 'right',
            )
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Heading",
            "param_name" => "heading",
            "holder" => "div",
            "admin_label" => false,
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Sub Heading",
            "param_name" => "sub_heading",
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Sub Heading Second",
            "param_name" => "sub_heading_2",
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Short Description",
            "param_name" => "short_description",
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Animation Style', ULTIMA_NAME),
            'param_name' => 'animation_style',
            'value' => array(
                'Style 1' => '1',
                'Style 2' => '2',
                'Style 3' => '3',
            )
        ),




 array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Button Title",
            "param_name" => "btn_title",
            "admin_label" => true,
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Button Action', ULTIMA_NAME),
            'param_name' => 'btn_button_action',
            'value' => array(
                'None' => '1',
                'Modal' => '2',
                 'Link' => '3',
            )
        ),
		array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Modal Element Id",
            "param_name" => "modal_id",
            'dependency' => array(
                'element' => 'btn_button_action',
                'value' => '2',
            ),
        ),
       
        array(
                "type" => "vc_link",
                "holder" => "div",
                "heading" => "Action Button",
                "param_name" => "call_action",
                 'dependency' => array(
                    'element' => 'btn_button_action',
                    'value' => '3',
                        ),
             ),


        array(
            "type" => "textfield",
            "holder" => "div",
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

    class WPBakeryShortCode_Car_Repair_Slick_Slider extends WPBakeryShortCodesContainer {

    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_Car_Repair_Slick_Slider_Item extends WPBakeryShortCode {

    }

}

