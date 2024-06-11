<?php
vc_map(array(
    "name" => "Icon Thumb box",
    "base" => "car_repair_services_icon_box",
    "icon" => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    "category" => 'Car Repair',
    "as_parent" => array('only' => 'car_repair_services_icon_box_items'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("How many Slides to show?", 'car_repair_services'),
            "param_name" => "slides_to_show",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
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
            'type' => 'textfield',
            'heading' => esc_html__('Icon Thumb box extra class', 'car_repair_services'),
            'param_name' => 'extra_class',
        )
    )
));
 $fonts_array=car_repair_services_add_fonts_family();
vc_map(array(
    "name" => "Icon Thumb box items",
    "base" => "car_repair_services_icon_box_items",
    "icon" => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    "category" => 'Car Repair',
    "as_child" => array('only' => 'car_repair_services_icon_box'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
    
    $fonts_array[0],
    $fonts_array[1],
    $fonts_array[2],
    $fonts_array[3],
    $fonts_array[4],
    $fonts_array[5],
    $fonts_array[6],
    $fonts_array[7],

        array(
            "type" => "textfield",
            "holder" => "div",
            "admin_label" => true,
            "heading" => "Heading 1st line",
            "param_name" => "heading",
        ),
        array(
            "type" => "textarea",
            "heading" => "Description",
            "param_name" => "description",
            "description" => esc_html__('Description of your icon.', 'car-repair-services'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Button Action', 'car_repair_services'),
            'param_name' => 'button_action',
            'value' => array(
                'None' => '1',
                'Modal' => '2',
                'Pop Up' => '3',
                'Link' => '4',
            )
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Modal Element Id",
            "param_name" => "modal_id",
            'dependency' => array(
                'element' => 'button_action',
                'value' => '2',
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Select contact form for Pop Up Id', 'js_composer'),
            'param_name' => 'popup_id',
            'value' => $contact_forms,
            'save_always' => true,
            'description' => __('Choose previously created contact form from the drop down list.', 'js_composer'),
            'dependency' => array(
                'element' => 'button_action',
                'value' => '3',
            ),
        ),
        array(
            "type" => "vc_link",
            "holder" => "div",
            "heading" => "Action Button",
            "param_name" => "call_action",
            'dependency' => array(
                'element' => 'button_action',
                'value' => '4',
            ),
        ),
		array(
			 'type' => 'dropdown',
			 'heading' => esc_html__('Icon size', 'car-repair-services'),
			 'param_name' => 'icon_size',
			 'value' => array(
								'Default' => '',
								'Small' => 'sm',
							)
        )
    )
));

if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_Car_Repair_Services_Icon_Box extends WPBakeryShortCodesContainer {

    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_Car_Repair_Services_Icon_box_Items extends WPBakeryShortCode {

    }

}
