<?php
class Car_Repair_ServicesBanner extends WPBakeryShortCode {

    public function __construct() {

        add_shortcode('car_repair_services_banner', array($this, 'car_repair_services_banner_func'));
        add_shortcode('car_repair_services_banner_container', array($this, 'car_repair_services_banner_container_func'));
    }

    function car_repair_services_banner_container_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'heading' => '',
            'sub_heading' => '',
            'extra_class' => '',
                        ), $atts));

        $changed_atts = shortcode_atts(array(
            'slides_to_show' => '6',
            'slides_to_scroll' => 'true',
            'infinite' => 'true',
            'autoplay' => 'true',
            'dots' => 'true',
            'arrows' => 'false',
        ), $atts);

        wp_localize_script( 'custom', 'ajax_banner', $changed_atts);
        ob_start();
        ?>

        <div class="services-block-container <?php echo $extra_class; ?>">
            <div class="text-center">
                <?php if ($heading != '') {
                    echo '<h2 class="h-lg">' . $heading . '</h2>';
                }; ?>
                <?php if ($sub_heading != '') {
                    echo '<p class="info">' . $sub_heading . '</p>';
                }; ?>
            </div>

            <div class="services-block services-carousel <?php echo $extra_class; ?>">
                <?php echo do_shortcode($content); ?>
            </div>
        </div>
        <?php
            $output = ob_get_clean();
            return $output;
    }

        function car_repair_services_banner_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'view_type' => 'text',
            'heading' => '',
            'sub_heading' => '',
            'short_description' => '',
            'image' => '',
            'call_action' => '',
            'extra_class' => ''
                        ), $atts));

        $attachement = wp_get_attachment_image_src((int) $image, 'car-repair-services-thumbnail-carousel');

        $href = vc_build_link($call_action);
        ob_start();

        if ($view_type == "text") :
            ?>
            <div class="service <?php echo $extra_class; ?>">
                <div class="image">

                    <img src="<?php if ($attachement != array()) {
                        echo esc_url($attachement[0]);
                    } ?>" alt="Services Images">

                </div>
                <div class="caption">
                    <div class="vert-wrap">
                        <div class="vert">
                            <?php if ($heading != '') {
                                echo '<h3>' . $heading . '</h3>';
                            } ?>
                            <?php if ($sub_heading != '') {
                                echo '<h2>' . $sub_heading . '</h2>';
                            } ?>
                            <?php if ($short_description != '') {
                                echo '<div class="text">' .
                                $short_description . '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>               
            <div class="service <?php echo $extra_class; ?>">

                <a href="<?php echo $href['url']; ?>" <?php if (!(empty($href['target']))): ?> target="<?php echo $href['target']; ?>" <?php endif; ?>  class="image image-scale" rel="<?php echo $href['rel']; ?>"  >

                    <img alt="<?php echo esc_attr($href['title']); ?>" 
                        src="<?php if ($attachement != array()) {
                            echo esc_url($attachement[0]);
                        } ?>" >
                    
                </a>

            </div>

        <?php endif; ?>                         
        <?php
        $output = ob_get_clean();
        return $output;
    }


}

new Car_Repair_ServicesBanner();
