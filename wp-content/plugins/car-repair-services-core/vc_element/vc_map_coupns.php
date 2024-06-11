<?php
vc_map(array(
    "name" => "Coupons",
    "base" => "car_repair_coupns",
    "icon" => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    "category" => 'Car Repair',
    "params" => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Posts Per Page', 'car_repair_services'),
            'param_name' => 'per_page',
            'value' => 6
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class', 'car_repair_services'),
            'param_name' => 'extra_class',
        )
    )
));
