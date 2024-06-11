<?php
class car_repair_servicesTrustProducts {
    public function __construct()
    {
        add_shortcode( 'car_repair_services_trust_products', array($this, 'car_repair_services_trust_products_func'));
    }

    public function car_repair_services_trust_products_func ($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'title' => '',
            'image' => '',
            'extra_class' => '',
        ), $atts));
        ob_start();

        $img = wp_get_attachment_image_src($image, "large");
        $imgSrc = $img[0];
        ?>

        <!-- Block -->
        <div class="block full-block">
            <div class="container-fluid">
                <div class="row service-row">
                    <div class="col-sm-6">
                        <div class="service-row-text">
                            <h2><?php echo $title; ?></h2>
                            <p><?php echo $content; ?></p>
                        </div>
                    </div>
                    <div class="divider visible-xs"></div>
                    <div class="col-sm-6">
                        <div class="service-row-image" style="background-image: url('<?php echo $imgSrc; ?>');"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Block -->

        
        <?php
        $output = ob_get_clean();
        return $output;
    }
}
new car_repair_servicesTrustProducts();