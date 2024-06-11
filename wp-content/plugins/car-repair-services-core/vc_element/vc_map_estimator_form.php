<?php
$cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');

$contact_forms = array();
if ($cf7) {
    foreach ($cf7 as $cform) {
        $contact_forms[$cform->post_title] = $cform->ID;
    }
} else {
    $contact_forms[__('No contact forms found', 'car-repair-services-core')] = 0;
}

vc_map(array(
    "name" => "Estimator Form",
    "base" => "car_repair_estimator_form",
    "description" => __("Estimator Form For Pop Up Or Modal", ULTIMA_NAME),
    "category" => 'Car Repair',
    "icon" => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Title",
            "param_name" => "title",
            "admin_label" => true,
            "value" => 'Car Repair Estimator',
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Sub Title",
            "param_name" => "sub_title",
            "admin_label" => true,
            "value" => 'Get a location-based car repair estimate',
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Estimator Form Select', 'car-repair-services-core'),
            'param_name' => 'estimator_form_select',
            'value' => array(
                'Load From Contact Form 7' => '1',
                'Load From Estimator Form Plugin' => '2',
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Select contact form for Form Id', 'car-repair-services-core'),
            'param_name' => 'form_id',
            'value' => $contact_forms,
            'save_always' => true,
            'description' => __('Choose previously created contact form from the drop down list.', 'car-repair-services-core'),
            'dependency' => array(
                'element' => 'estimator_form_select',
                'value' => '1',
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => "Add Extra Class",
            "param_name" => "extra_class",
        ),
    )
));
