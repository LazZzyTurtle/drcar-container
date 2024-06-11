<?php
class car_repair_services_home_page_coupon {

    public function __construct() {
        
        add_shortcode('sc_home_page_coupon', array($this, 'home_page_coupon'));
    }

    public function home_page_coupon($attr, $content = NULL) {
        extract(shortcode_atts(array(
            'title' => 'Our Latest Specials',
            'sub_title' => 'Any Servcie of $250 or More',
            'link' => 'http://',
            'left_title' => '',
            'currency_symbol' => '',
            'currency_price' => '',
            'currency_text' => '',
            'left_footer' => '',
            'button_text' => 'SEE ALL COUPONS',
        ), $attr));
        ob_start();
        ?>
        <div class="coupon">
            <div class="coupon-row">
                <div class="coupon-col-left text-center">
                <?php
                    echo  $content;
                    echo '<div class="coupon-text1">'.$left_title.'</div>
                    <div class="coupon-text2"><span>'.$currency_symbol.'</span>'.$currency_price.'<span>'.$currency_text.'</span></div>
                    <div class="coupon-text3">'.$left_footer.'</div>';
                ?>
                </div>
                <div class="coupon-col-right text-center">
                    <div class="coupon-text4">  <?php echo $title; ?></div>
                    <div class="coupon-text5">  <?php echo $sub_title; ?></div>
                    <a href="<?php echo $link; ?>" class="coupon-all"><?php echo $button_text; ?><span></span></a>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

}


new car_repair_services_home_page_coupon();