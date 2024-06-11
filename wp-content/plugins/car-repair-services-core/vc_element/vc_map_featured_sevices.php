<?php
vc_map(array(
    'name' => __('Featured Services', 'car-repair-services'),
    'description' => __('Featured Services Tabs', 'car-repair-services'),
    'base' => 'featured_services',
    'icon' => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    'show_settings_on_create' => true,
    'category' => __('Car Repair', 'car-repair-services'),
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
            'type' => 'textfield',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Sub Title', 'car-repair-services'),
            'param_name' => 'sub_title',
            'value' => 'We offer full service auto repair & maintenance',
        ),
        array(
            'type' => 'attach_image',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Image', 'car-repair-services'),
            'param_name' => 'image',
        ),
        array(
            'type' => 'vc_link',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Know More', 'car-repair-services'),
            'param_name' => 'url',
        ),
        array(
            'type' => 'textfield',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Extra Class', 'car-repair-services'),
            'param_name' => 'extra_class',
        ),
        array(
            'type' => 'param_group',
            'value' => '',
            'param_name' => 'tabs',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'class' => '',
                    'admin_label' => false,
                    'heading' => __('Service Icon Class', 'car-repair-services'),
                    'param_name' => 'service_icon',
                    'value' => 'icon-diag',
                ),
                array(
                    'type' => 'attach_image',
                    'class' => '',
                    'admin_label' => false,
                    'heading' => __('Service Icon Image', 'car-repair-services'),
                    'param_name' => 'service_icon_img',
                    'description' => 'When you set image, icon would not show',
                ),
                array(
                    'type' => 'textfield',
                    'class' => '',
                    'admin_label' => false,
                    'heading' => __('Service Title', 'car-repair-services'),
                    'param_name' => 'service_title',
                    'value' => 'Diagnostics',
                ),
                array(
                    'type' => 'textarea',
                    'class' => '',
                    'admin_label' => false,
                    'heading' => __('Service Text', 'car-repair-services'),
                    'param_name' => 'services_info',
                    'value' => 'If your engine is sick or tired we have the equipment to check, diagnose and efficiently fix any problem you may have.',
                ),
                array(
                    'type' => 'textfield',
                    'class' => '',
                    'admin_label' => false,
                    'heading' => __('Icon Position Left', 'car-repair-services'),
                    'param_name' => 'position_left',
                    'value' => 8
                ),
                array(
                    'type' => 'textfield',
                    'class' => '',
                    'admin_label' => false,
                    'heading' => __('Icon Position Top', 'car-repair-services'),
                    'param_name' => 'position_top',
                    'value' => 42
                ),
                array(
                    'type' => 'textfield',
                    'class' => '',
                    'admin_label' => false,
                    'heading' => __('Extra Class', 'car-repair-services'),
                    'param_name' => 'extra_class',
                ),
            )
        )
    )
));
