<?php
/**
 * Add Shortcode To Visual Composer
 */
$cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');

$contact_forms = array();
if ($cf7) {
    foreach ($cf7 as $cform) {
        $contact_forms[$cform->post_title] = $cform->ID;
    }
} else {
    $contact_forms[__('No contact forms found', 'js_composer')] = 0;
}


vc_map(array(
    "name" => "Action Button",
    "base" => "car_repair_action_button",
    "description" => __("Action Button For Pop Up Or Modal", ULTIMA_NAME),
    "category" => 'Car Repair',
    "icon" => CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Button Title",
            "param_name" => "title",
            "admin_label" => true,
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Button Action', ULTIMA_NAME),
            'param_name' => 'button_action',
            'value' => array(
                'None' => '1',
                'Modal' => '2',
                'Pop Up' => '3',
                 'Link' => '4',
            )
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Modal Element Id",
            "param_name" => "modal_id",
            'dependency' => array(
                'element' => 'button_action',
                'value' => '2',
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Select contact form for Pop Up Id', 'js_composer'),
            'param_name' => 'popup_id',
            'value' => $contact_forms,
            'save_always' => true,
            'description' => __('Choose previously created contact form from the drop down list.', 'js_composer'),
            'dependency' => array(
                'element' => 'button_action',
                'value' => '3',
            ),
        ),
        array(
                "type" => "vc_link",
                "holder" => "div",
                "heading" => "Action Button",
                "param_name" => "call_action",
                 'dependency' => array(
                    'element' => 'button_action',
                    'value' => '4',
                        ),
             ),
             array(
                 'type' => 'dropdown',
                 'heading' => __('Pop Up Location To Open', 'electrician'),
                 'param_name' => 'popup_position',
                 'value' => array(
                             'bottom'=>'bottom',
                              'top'=>'top',
                                 ),
                 'save_always' => true,
             ),
        array(
            "type" => "textfield",
            "heading" => "Add Extra Class",
            "param_name" => "extra_class",
        ),
    )
));
