<?php
vc_map(array(
    'name' => __('Brands', 'car-repair-services'),
    'base' => 'brands',
    'icon' => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    'show_settings_on_create' => true,
    'category' => __('Car Repair', 'car-repair-services'),
    "as_parent" => array('only' => 'brands_item'),
    'content_element' => true,
    "js_view" => 'VcColumnView',
    'params' => array(
        array(
            'type' => 'textfield',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Title', 'car-repair-services'),
            'param_name' => 'title',
            'value' => 'We Repair All Makes of Automobiles',
        ),
        array(
            'type' => 'textfield',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Sub Title', 'car-repair-services'),
            'param_name' => 'sub_title',
            'value' => 'Find here your vehicle',
        ),
        array(
            'type' => 'textfield',
            'heading' => __('Button Close Text', 'car-repair-services'),
            'param_name' => 'btn_close_txt',
            'value' => 'View All Makes',
        ),
        array(
            'type' => 'textfield',
            'heading' => __('Button Open Text', 'car-repair-services'),
            'param_name' => 'btn_open_txt',
            'value' => 'Show Less Makes',
        ),
    )
));

vc_map(array(
    'name' => __('Brands Item', 'car-repair-services'),
    'base' => 'brands_item',
    'icon' => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    'show_settings_on_create' => true,
    "as_child" => array('only' => 'brands'),
    'content_element' => true,
    'category' => __('Car Repair', 'car-repair-services'),
    'params' => array(
        array(
            'type' => 'attach_image',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Image', 'car-repair-services'),
            'param_name' => 'image',
        ),
        array(
            'type' => 'textfield',
            'heading' => __('URL', 'car-repair-services'),
            'param_name' => 'url'
        )
    )
));


if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_brands extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_brands_item extends WPBakeryShortCode {
        
    }

}