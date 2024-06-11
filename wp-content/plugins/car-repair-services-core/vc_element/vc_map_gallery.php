<?php
vc_map(array(
    "name" => esc_html__("Gallary", 'car-repair-services'),
    "base" => "gallaries",
    "class" => "",
    "icon" => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    "category" => 'Car Repair',
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Number of Gallary", 'car-repair-services'),
            "param_name" => "showposts",
            "value" => "10",
            "description" => esc_html__('Set how many gallary image will display.', 'car-repair-services'),
            "admin_label" => true,
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Order By', 'car-repair-services'),
            'param_name' => 'orderby',
            'value' => array(
                'Date' => 'date',
                'ID' => 'ID',
                'Title' => 'title',
                'Name' => 'name',
                'Modified' => 'modified',
                'Rand' => 'rand',
            ),
            'description' => esc_html__('Select order type.', 'car-repair-services'),
            "admin_label" => true,
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Sort Order', 'car-repair-services'),
            'param_name' => 'order',
            'value' => array('Descending' => 'DESC', 'Ascending' => 'ASC'),
            'description' => esc_html__('Select sorting order.', 'car-repair-services'),
            "admin_label" => true,
        ),
    )
));
