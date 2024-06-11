<?php  
 $fonts_array=car_repair_services_add_fonts_family();
      vc_map(array(
        "name" => "Counter Box Item",
        "base" => "car_repair_counterbox_item",
        "category" => 'Car Repair',
        "icon" =>  CAR_REPAIR_SERVICES_THEME_URI . '/images/car-repair-services-icon.png',
        "params" => array(
            array(
                "type" => "textfield",
                "holder" => "div",
                "heading" => "Title",
                "param_name" => "title",
                "admin_label" => true,
            ),
            $fonts_array[0],
            $fonts_array[1],
            $fonts_array[2],
            $fonts_array[3],
            $fonts_array[4],
            $fonts_array[5],
            $fonts_array[6],
            $fonts_array[7],
            array(
                "type" => "textfield",
                "holder" => "span",
                "heading" => "Counter Value(must be numeric)",
                "param_name" => "count_number",
                "admin_label" => false,
            ),
            array(
                "type" => "textfield",
                "holder" => "span",
                "heading" => "Counter HTML(E.g.: 50 000)",
                "param_name" => "content",
                "admin_label" => false,
            ),
            array(
                "type" => "textfield",
                "holder" => "span",
                "heading" => "Speed(must be numeric)",
                "param_name" => "number_scrolling_speed",
                "admin_label" => false,
            ),
            array(
                "type" => "textfield",
                "heading" => "Add Extra Class",
                "param_name" => "extra_class",
            ),
        )
    ));
  
        if ( class_exists( 'WPBakeryShortCode' ) ) {
            class WPBakeryShortCode_Shortcode_Car_Repair_Counterbox_Item extends WPBakeryShortCode {
            }
        }