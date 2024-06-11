<?php
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
    'name' => __('Banner Free', 'car-repair-services'),
    'description' => __('Winter & Summer Checks', 'car-repair-services'),
    'base' => 'banner_free',
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
            'heading' => __('Title', 'car-repair-services'),
            'param_name' => 'title',
            'value' => 'FREE!',
        ),
        array(
            'type' => 'textfield',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Sub Title', 'car-repair-services'),
            'param_name' => 'sub_title',
            'value' => 'Winter & Summer Checks',
        ),
        array(
            'type' => 'textarea_html',
            'class' => '',
            'admin_label' => false,
            'heading' => __('Content', 'car-repair-services'),
            'param_name' => 'content',
            'value' => '<p>Make sure your vehicle is ready for the cold winter weather and that it’s safe and sound for your family’s summer holiday.</p><p>Car Repair Service offers FREE checks for everybody.</p>',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Button Action', 'car-repair-services'),
            'param_name' => 'button_action',
            'value' => array(
                'Pop Up' => '1',
                'Link' => '2',
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Select contact form for Pop Up Id', 'car-repair-services'),
            'param_name' => 'popup_id',
            'value' => $contact_forms,
            'save_always' => true,
            'description' => __('Choose previously created contact form from the drop down list.', 'car-repair-services'),
            'dependency' => array(
                'element' => 'button_action',
                'value' => '1',
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => "Button Text",
            "param_name" => "button_text",
            'value' => 'Get Quote',
            'dependency' => array(
                'element' => 'button_action',
                'value' => '1',
            ),
        ),
        array(
            "type" => "vc_link",
            "heading" => "Action Button",
            "param_name" => "call_action",
            'dependency' => array(
                'element' => 'button_action',
                'value' => '2',
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => "Button Class",
            "param_name" => "button_class",
            "value" => "btn-invert",
        )
    )
));

