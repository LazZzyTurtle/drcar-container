<?php
vc_map(array(
        "name" => __("Home Page Coupon", "car-repair-services"),
        "base" => "sc_home_page_coupon",
        "class" => "",
        "icon" =>  CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
        "category" => __("Car Repair", "car-repair-services"),
        "params" => array(
            
            array(
                "type" => "textarea_html",
                "holder" => "div",
                "class" => "",
                "heading" => __("Content Text area", "car-repair-services"),
                "param_name" => "content",
                "value" => __("Coupons from ...", "car-repair-services"),
                "description" => __("Description for content param.", "car-repair-services")
            ),



            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Left Title", "car-repair-services"),
                "param_name" => "left_title",
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Currency Symbol", "car-repair-services"),
                "param_name" => "currency_symbol",
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Currency Price", "car-repair-services"),
                "param_name" => "currency_price",
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Currency Text", "car-repair-services"),
                "param_name" => "currency_text",
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Left Footer", "car-repair-services"),
                "param_name" => "left_footer",
            ),


            
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Title", "car-repair-services"),
                "param_name" => "title",
                "value" => __("Our Latest Specials", "car-repair-services"),
                "description" => __("Description for title param.", "car-repair-services")
            ),
            
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Sub Title", "car-repair-services"),
                "param_name" => "sub_title",
                "value" => __("Any Servcie of $250 or More", "car-repair-services"),
                "description" => __("Description for sub title param.", "car-repair-services")
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Button Text", "car-repair-services"),
                "param_name" => "button_text",
                "value" => __("SEE ALL COUPONS"),
                "description" => __("Description for button param.", "car-repair-services")
            ),            
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Link", "car-repair-services"),
                "param_name" => "link",
                "value" => __("http://", "car-repair-services"),
                "description" => __("Description for link param.", "car-repair-services")
            )
        )
    ));