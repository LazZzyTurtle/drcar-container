<?php
vc_map(array(
    'name' => __('How it Works', 'car-repair-services'),
    'description' => __('How It Works', 'car-repair-services'),
    'base' => 'how_it_works',
    'icon' => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    'category' => __('Car Repair', 'car-repair-services'),
    "as_parent" => array('only' => 'how_it_works_item'),
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
            'value' => 'How It Works',
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
            'type' => 'dropdown',
            'heading' => esc_html__('Show Item In Row Mobile', ULTIMA_NAME),
            'param_name' => 'show_item_in_row',
            'value' => array(
                'One' => '1',
                'Two' => '2',
            )
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
    'name' => __('How it Works Item', 'car-repair-services'),
    'description' => __('How It Works', 'car-repair-services'),
    'base' => 'how_it_works_item',
    'icon' => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    'show_settings_on_create' => true,
    'category' => __('Car Repair', 'car-repair-services'),
    "as_child" => array('only' => 'how_it_works'),
    'content_element' => true,
    'params' => array(
        array(
            'type' => 'attach_images',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Image', 'car-repair-services'),
            'param_name' => 'images',
        ),
        array(
            'type' => 'textfield',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Number', 'car-repair-services'),
            'param_name' => 'number',
            'value' => '1',
        ),
        array(
            'type' => 'textfield',
            'class' => '',
            'admin_label' => false,
            'heading' => __('content', 'car-repair-services'),
            'param_name' => 'text',
            'value' => 'CHOOSE YOUR SERVICE',
        ),
    )
));


if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_how_it_works extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_how_it_works_item extends WPBakeryShortCode {
        
    }

}