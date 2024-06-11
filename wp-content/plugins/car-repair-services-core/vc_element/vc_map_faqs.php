<?php
vc_map(array(
    'name' => __('Faqs', 'car-repair-services'),
    'description' => __('Frequently Asked Question', 'car-repair-services'),
    'base' => 'faqs',
    'icon' => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    'show_settings_on_create' => FALSE,
    'category' => __('Car Repair', 'car-repair-services'),
    "as_parent" => array('only' => 'faqs_item'),
    "js_view" => 'VcColumnView',
    'params' => array(
        array(
            'type' => 'textfield',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Title', 'car-repair-services'),
            'param_name' => 'title',
            'value' => 'Auto Maintenance FAQs',
        ),
    )
));

vc_map(array(
    'name' => __('Faqs Item', 'car-repair-services'),
    'description' => __('Frequently Asked Question', 'car-repair-services'),
    'base' => 'faqs_item',
    'icon' => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    'show_settings_on_create' => true,
    'category' => __('Car Repair', 'car-repair-services'),
    "as_child" => array('only' => 'faqs'),
    'params' => array(
        array(
            'type' => 'textfield',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Question', 'car-repair-services'),
            'param_name' => 'question',
            'value' => 'How often should I get my oil changed?',
        ),
        array(
            'type' => 'textarea',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Answer', 'car-repair-services'),
            'param_name' => 'answer',
            'value' => 'For a long time and sometimes still today, standard practice at many lube shops is to suggest oil changes every three months or 3,000 miles. In order to know when the best time to get your oil changed is, check the owner’s manual of your specific model for manufacturer-recommended intervals.',
        ),
        array(
            'type' => 'checkbox',
            'class' => '',
            'admin_label' => false,
            'heading' => __('FAQ Open', 'car-repair-services'),
            'param_name' => 'faq_active',
            'value' => '',
        ),
    )
));


if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_Faqs extends WPBakeryShortCodesContainer {

    }

}

if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_Faqs_Item extends WPBakeryShortCode {

    }

}


