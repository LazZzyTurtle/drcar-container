<?php
vc_map(array(
    'name' => __('Featured Services 2', 'car-repair-services'),
    'description' => __('Featured Services 2', 'car-repair-services'),
    'base' => 'featured_services2',
    'icon' => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    'category' => __('Car Repair', 'car-repair-services'),
    "as_parent" => array('only' => 'featured_services2_item'),
    'content_element' => true,
    'show_settings_on_create' => true,
    "js_view" => 'VcColumnView',
    'params' => array(
        array(
            'type' => 'textfield',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Title', 'car-repair-services'),
            'param_name' => 'title',
            'value' => 'Our Featured Services',
        ),
        array(
            'type' => 'textfield',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Sub Title', 'car-repair-services'),
            'param_name' => 'sub_title',
            'value' => 'We offer full service auto repair & maintenance',
        ),
        array(
            'type' => 'textfield',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Extra Class', 'car-repair-services'),
            'param_name' => 'extra_class',
        ),
    )
));

vc_map(array(
    'name' => __('Featured Services2 Item', 'car-repair-services'),
    'description' => __('Featured Services2 Item ', 'car-repair-services'),
    'base' => 'featured_services2_item',
    'icon' => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    'show_settings_on_create' => true,
    'category' => __('Car Repair', 'car-repair-services'),
    "as_child" => array('only' => 'featured_services2'),
    'content_element' => true,
    'params' => array(
        array(
            'type' => 'textfield',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Title', 'car-repair-services'),
            'param_name' => 'title',
            'value' => 'Featured Services',
        ),
        array(
            'type' => 'attach_image',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Image', 'car-repair-services'),
            'param_name' => 'image',
        ),
        array(
            'type' => 'textfield',
            'class' => '',
            'admin_label' => false,
            'heading' => __('URL', 'car-repair-services'),
            'param_name' => 'url',
        ),
        array(
            'type' => 'textfield',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Extra Class', 'car-repair-services'),
            'param_name' => 'extra_class',
        ),

    )
));


if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_featured_services2 extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_featured_services2_item extends WPBakeryShortCode {
        
    }

}