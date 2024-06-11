<?php
//add_action('vc_before_init', 'testimonialstwo_integrateWithVC');
vc_map(array(
    'name' => __('Testimonials Two', 'car-repair-services'),
    'base' => 'testimonials_two',
    'icon' => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    'show_settings_on_create' => true,
    'category' => __('Car Repair', 'car-repair-services'),
    'params' => array(
        array(
            'type' => 'textfield',
            'holder' => 'div',
            'class' => '',
            'admin_label' => true,
            'heading' => __('Title', 'car-repair-services'),
            'param_name' => 'title',
            'value' => 'What Our Customers Say',
        ),
    )
));

