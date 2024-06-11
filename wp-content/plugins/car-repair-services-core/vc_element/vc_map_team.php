<?php
vc_map(array(
    "name" => "Team Carousel",
    "base" => "car_repair_services_team_carousel",
    "icon" => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    "category" => 'Car Repair',
    "as_parent" => array('only' => 'car_repair_services_team'),
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,
    "params" => array(
        array(
            "type" => "dropdown",
            "admin_label" => true,
            "heading" => "Style",
            "param_name" => "team_style",
            "value" => array(
                "Vertical" => "1",
                "Horizontal" => "2",
            ),
            "std" => '',
            "description" => esc_html__('No of column of the team.', 'car-repair-services'),
        ),
        array(
            "type" => "dropdown",
            "admin_label" => true,
            "heading" => "Column no",
            "param_name" => "team_col",
            "value" => array(
                "2 Column" => "2",
                "3 Column" => "3",
                "4 Column" => "4",
            ),
            "description" => esc_html__('No of column of the team.', 'car-repair-services'),
            "dependency" => Array(
                'element' => "team_style", 
                'value' => "1",
                )
        ),
        array(
            "type" => "textfield",
            "heading" => __("How many Slides to show?", 'car-repair-services'),
            "param_name" => "slides_to_show",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
            "value" => "4",
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Do the Slides scroll?", 'car-repair-services'),
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
            "heading" => __("Is infinite?", 'car-repair-services'),
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
            "heading" => __("Enable autoplay", 'car-repair-services'),
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
            "heading" => __("Autoplay Speed", 'car-repair-services'),
            "param_name" => "autoplay_speed",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Arrows", 'car-repair-services'),
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
            "heading" => __("Enable Dots", 'car-repair-services'),
            "param_name" => "dots",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false',
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "heading" => __("How many Slides to show?", 'car-repair-services'),
            "param_name" => "slides_to_show",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Do the Slides scroll?", 'car-repair-services'),
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
            "heading" => __("Is infinite?", 'car-repair-services'),
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
            "heading" => __("Enable autoplay", 'car-repair-services'),
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
            "heading" => __("Autoplay Speed", 'car-repair-services'),
            "param_name" => "autoplay_speed",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Arrows", 'car-repair-services'),
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
            "heading" => __("Enable Dots", 'car-repair-services'),
            "param_name" => "dots",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false',
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
    ),
    "js_view" => 'VcColumnView',
));

vc_map(array(
    "name" => "Our Team",
    "base" => "car_repair_services_team",
    "icon" => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    "category" => 'Car Repair',
    "as_child" => array('only' => 'car_repair_services_team_carousel'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Name Of Team Member", 'car-repair-services'),
            "param_name" => "name",
            "value" => "",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Designation of Team Member", 'car-repair-services'),
            "param_name" => "designation",
            "value" => "",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Short Description", 'car-repair-services'),
            "param_name" => "description",
            "value" => "",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Facebook", 'car-repair-services'),
            "param_name" => "social_facebook",
            "value" => "",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Twitter", 'car-repair-services'),
            "param_name" => "social_twitter",
            "value" => "",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Instagram", 'car-repair-services'),
            "param_name" => "social_instagram",
            "value" => "",
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Picture Of Team Member", 'car-repair-services'),
            "param_name" => "image",
            "value" => "",
        ),
    )
));

if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_Car_Repair_Services_Team_Carousel extends WPBakeryShortCodesContainer {

    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_Car_Repair_Services_Team extends WPBakeryShortCode {

    }

}