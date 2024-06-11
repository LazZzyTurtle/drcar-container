<?php
class Car_Repair_ServicesSlickSlider_2 extends WPBakeryShortCode {

    public function __construct() {
        add_shortcode('car_repair_slick_slider_2', array($this, 'car_repair_slick_slider_func'));
        add_shortcode('car_repair_slick_slider_item_2', array($this, 'car_repair_slick_slider_item_func'));
    }

    public function car_repair_slick_slider_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'navigation_type' => 0,
            'animate_arrow' => 'false',
            'extra_class' => '',
                        ), $atts));

        $changed_atts = shortcode_atts(array(
            'autoplay' => 'true',
            'autoplay_speed' => '3000',
            'arrows' => 'true',
            'dots' => 'false',
            'fade' => 'true',
            'speed' => '500',
            'pause_on_hover' => 'true',
            'pause_on_dots_hover' => 'true'
                ), $atts);

        wp_localize_script('custom', 'ajax_slickslider', $changed_atts);
        ob_start();
        ?>

        <div id="mainSliderWrapper">
            <div id="mainSlider">
                <?php echo do_shortcode($content); ?>
            </div>
            <?php if($animate_arrow == 'true'){?>
            <div class="mainSlider-arrow-bottom">
			    <i class="icon-triangle"></i>
            </div>
            <?php } ?>
        </div>

        <?php
        $output = ob_get_clean();
        return $output;
    }

    public function car_repair_slick_slider_item_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'image' => '',
            'text_position' => 'center',
            'heading' => 'Multi-Point',
            'sub_heading' => 'Vehicle Inspection',
            'extra_class' => '',
            'unqid' => '',
            'button_type' => '',
            'call_action' => '',
            'button_text' => 'Schedule Service',
                        ), $atts));

        $unqid = $unqid . rand(1, 999);
        $attachement = wp_get_attachment_image_src((int) $image, 'full');

        ob_start();
        ?>

        <div class="slide">
            <div class="img--holder" <?php if ($attachement != array()) { ?>  style="background-image: url(<?php echo esc_url($attachement[0]); ?>);" <?php } ?>></div>
            <div class="slide-content <?php echo $text_position; ?>">
                <div class="vert-wrap container">
                    <div class="vert">
                        <div class="container">
                            <h4 data-animation="zoomIn" data-animation-delay="0.5s"><?php echo wp_kses_post($heading); ?></h4>
                            <h3 data-animation="scaleOut" data-animation-delay="0.2s"><?php echo wp_kses_post($sub_heading); ?></h3>
                            <p data-animation="fadeIn" data-animation-delay="0.9s"><?php echo wp_kses_post($content); ?></p>
                            <?php
                            if($button_type == 'popup'){ ?>
                                <a href="#" class="banner-btn" data-toggle="modal" data-target="#appointmentForm"><?php echo $button_text;?></a>
                           <?php }else{
                            $href = vc_build_link($call_action);
                            if ($href['url'] != '') {
                                ?>
                                <a href="<?php echo $href['url']; ?>" <?php if (!(empty($href['target']))): ?> target="<?php echo $href['target']; ?>" <?php endif; ?> data-animation="fadeIn" data-animation-delay="1.5s" class="banner-btn" rel="<?php echo $href['rel']; ?>"><?php echo $href['title']; ?></a>
                            <?php }
                           }
                           ?>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

}

new Car_Repair_ServicesSlickSlider_2();