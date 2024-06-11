<?php
$templates =  car_repair_get_cpt_sevices();

vc_map(
        array(
            'name' => __('Service Icon Tabs', 'car-repair-services'),
            'description' => __('Services Icon Tab', 'car-repair-services'),
            'base' => 'icon_tab',
            'icon' => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
            'show_settings_on_create' => TRUE,
            'category' => __('Car Repair', 'car-repair-services'),
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'value' => '',
                    'heading' => 'Background Image',
                    'param_name' => 'image'
                ),
                array(
                    'type' => 'textfield',
                    'value' => '',
                    'heading' => 'Extra Class',
                    'param_name' => 'extra_class'
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
                            'heading' => __('Services Icon', 'car-repair-services'),
                            'param_name' => 'services_icon',
                            'value' => 'Additional Services',
                        ),
                        array(
                            'type' => 'textfield',
                            'class' => '',
                            'admin_label' => false,
                            'heading' => __('Title', 'car-repair-services'),
                            'param_name' => 'title',
                            'value' => 'Additional Services',
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Select Content', 'car-repair-services'),
                            'param_name' => 'select_content',
                            'value' => array(
                                'Text' => '1',
                                'Custom Template' => '2'
                            )
                        ),
                        array(
                            'type' => 'textarea',
                            'class' => '',
                            'heading' => __('Content', 'car-repair-services'),
                            'param_name' => 'custom_html',
                            'description' => __('Custom HTML', 'car-repair-services'),
                            'dependency' => array(
                                'element' => 'select_content',
                                'value' => '1',
                            )
                        ),
                        array(
                            "type" => "dropdown",
                            "heading" => __("Category", 'car-repair-services'),
                            "param_name" => "post_id",
                            "value" => $templates,
                            "description" => __("Select Custom Template", 'car-repair-services'),
                            'dependency' => array(
                                'element' => 'select_content',
                                'value' => '2',
                            )
                        )
                    )
                )
            )
        )
);
