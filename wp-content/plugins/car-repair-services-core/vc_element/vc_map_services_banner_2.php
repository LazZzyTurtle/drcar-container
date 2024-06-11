<?php
vc_map(array(
    'name' => __('Services Banner 2', 'car-repair-services'),
    'base' => 'services_banner_2',
    'icon' => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    'show_settings_on_create' => true,
    'category' => __('Car Repair', 'car-repair-services'),
    'params' => array(
        array(
            'type' => 'attach_image',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Banner Image', 'car-repair-services'),
            'param_name' => 'image',
        ),
        array(
            'type' => 'textfield',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Icon Class', 'car-repair-services'),
            'param_name' => 'icon_class',
        ),
        array(
            'type' => 'textarea_html',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Title', 'car-repair-services'),
            'param_name' => 'content',
        ),
        array(
            'type' => 'textarea',
            'class' => '',
            'admin_label' => true,
            'heading' => __('Content', 'car-repair-services'),
            'param_name' => 'content1',
            
        ),
        array(
            'type' => 'textfield',
            'class' => '',
            'admin_label' => true,
            'heading' => __('Contact Number', 'car-repair-services'),
            'param_name' => 'contact',
          
        ),
        array(
            'type' => 'textarea',
            'class' => '',
            'admin_label' => true,
            'heading' => __('Contact Details', 'car-repair-services'),
            'param_name' => 'contact_info',
            
        ),
        array(
            'type' => 'textfield',
            'class' => '',
            'admin_label' => true,
            'heading' => __('Banner URL', 'car-repair-services'),
            'param_name' => 'url',
            
        )
    )
));
