<?php
class Car_Repair_ServicesPricingplans extends WPBakeryShortCode {
    public static $colno;
    public function __construct() {
        add_shortcode('pricing_plans', array($this, 'create_pricingplans_shortcode'));
        add_shortcode('pricing_plans_items', array($this, 'create_pricingplansitems_shortcode'));
    }

    public function create_pricingplans_shortcode($atts, $content = null) {

        $atts = shortcode_atts(
                array(
            'title' => 'Our Pricing Plans',
            'sub_title' => 'Fixed price car servicing packages',
            'pricing_style' => '1',
                ), $atts, 'pricing_plans'
        );

        // Attributes in var
        $title = $atts['title'];
        $sub_title = $atts['sub_title'];
        $pricing_style = $atts['pricing_style'];


        self::$colno = $pricing_style;
        $pricing_view = self::$colno;
   
        if($pricing_view == '2'){
            $pricing_view = 'pricing-grid';
        }else{
            $pricing_view = 'pricing-carousel';
        }

        // Output Code
        $output = '<div class="block"><div class="container"><div class="text-center"><h2 class="h-lg">' . $title . '</h2> <p class="info">' . $sub_title . '</p></div><div class="'.$pricing_view.' row">';
        $output .= do_shortcode($content);
        $output .= '</div></div></div>';

        self::$colno = null;
        return $output;
    }

    public function create_pricingplansitems_shortcode($atts, $content = null) {
        //Attributes
        $atts = shortcode_atts(
                array(
            'title' => 'Synthetic Blend Oil Change Special',
            'price' => '$59<sup>99</sup>',
            'image' => '',
            'logo_image' => '',
            'content' => 'Includes standard oil filter, up to 5 qts of SYNTHETIC BLEND oil and complete vehicle inspection.',
            'notice' => 'Not valid with other offer or special. Coupon must be presented in advance.',
                ), $atts, 'pricing_plans_items'
        );
        // Attributes in var
        $title = $atts['title'];
        $price = $atts['price'];
        $image = $atts['image'];
        $logo_image = $atts['logo_image'];
    //  $content = $atts['content'];
        $notice = $atts['notice'];

        $attachement = wp_get_attachment_image_src((int) $image, 'car-repair-services-thumbnail-carousel');
        $attachement_logo = wp_get_attachment_image_src((int) $logo_image);

        ob_start()
        ?>  
        <?php
     
        $column_no = self::$colno;
         if($column_no == '2'){ ?>
        <div class="pricing-box col-lg-4 col-md-6 col-sm-6">
        <?php }else{ ?>
            <div class="pricing-box col-md-4">
        <?php } ?>
            <div class="pricing-box-inside">
                <div class="pricing-box-header">
                    <div class="text-1"><?php echo $title; ?></div>
                    <div class="divide-line"></div>
                    <div class="text-2"><?php echo $price; ?></div>
                </div>
                <div class="pricing-box-center">
                    <img src="<?php
                    if ($attachement != array()) {
                        echo esc_url($attachement[0]);
                    }?>" alt="">
                    <div class="text-3"><?php echo $content; ?></div>
                </div>
                <div class="pricing-box-footer">
                    <span class="mark-icon">*</span>
                    <div class="text-4"><?php echo $notice; ?></div>
                    <div class="pricing-box-logo">
                        <img src="<?php
                        if ($attachement_logo != array()) {
                            echo esc_url($attachement_logo[0]);
                        }
                        ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

}
new Car_Repair_ServicesPricingplans();
