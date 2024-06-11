<?php
vc_map(array(
    'name' => __('Pricing Plans', 'car-repair-services'),
    'base' => 'pricing_plans',
    'icon' => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    'category' => __('Car Repair', 'car-repair-services'),
    "as_parent" => array('only' => 'pricing_plans_items'),
    'show_settings_on_create' => true,
    "js_view" => 'VcColumnView',
    'params' => array(
        array(
            'type' => 'textfield',
            'class' => '',
            'admin_label' => true,
            'heading' => __('Title', 'car-repair-services'),
            'param_name' => 'title',
            'value' => 'Our Pricing Plans',
        ),
        array(
            'type' => 'textfield',
            'class' => '',
            'admin_label' => true,
            'heading' => __('Sub Title', 'car-repair-services'),
            'param_name' => 'sub_title',
            'value' => 'Fixed price car servicing packages',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Pricing Style', ULTIMA_NAME),
            'param_name' => 'pricing_style',
            'value' => array(
                'Slider View' => '1',
                'Grid View' => '2'
            )
        ),
    )
));

vc_map(array(
    'name' => __('Pricing Plans Item', 'car-repair-services'),
    'base' => 'pricing_plans_items',
    'icon' => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    'category' => __('Car Repair', 'car-repair-services'),
    "as_child" => array('only' => 'pricing_plans'),
    'content_element' => true,
    'show_settings_on_create' => true,
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => __('Title', 'car-repair-services'),
            'param_name' => 'title',
            'value' => 'Synthetic Blend Oil Change Special',
        ),
        array(
            'type' => 'textfield',
            'heading' => __('Price', 'car-repair-services'),
            'param_name' => 'price',
            'value' => '$59<sup>99</sup>',
        ),
        array(
            'type' => 'attach_image',
            'heading' => __('Image', 'car-repair-services'),
            'param_name' => 'image',
        ),
        array(
            'type' => 'textarea_html',
            'heading' => __('Content', 'car-repair-services'),
            'param_name' => 'content',
            'value' => 'Includes standard oil filter, up to 5 qts of SYNTHETIC BLEND oil and complete vehicle inspection.',
        ),
        array(
            'type' => 'textfield',
            'heading' => __('Notice', 'car-repair-services'),
            'param_name' => 'notice',
            'value' => 'Not valid with other offer or special. Coupon must be presented in advance.',
        ),
        array(
            'type' => 'attach_image',
            'heading' => __('Log Image', 'car-repair-services'),
            'param_name' => 'logo_image',
        )
    )
));


if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_Pricing_Plans extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_Pricing_Plans_Items extends WPBakeryShortCode {
        
    }

}
?>
