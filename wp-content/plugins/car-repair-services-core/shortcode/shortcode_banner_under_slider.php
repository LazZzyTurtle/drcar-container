<?php
class car_repair_bannerUnderSlider {
    public function __construct()
    {
        add_shortcode( 'car_repair_services_banner_under_slider', array($this, 'car_repair_services_banner_under_slider_func'));
    }

    public function car_repair_services_banner_under_slider_func ($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'title' => 'After Hours',
            'title2' => 'Drop-OFF',
            'image' => '',
            'action_link' => '',
            'extra_class' => '',
        ), $atts));
        ob_start();

        $img = wp_get_attachment_image_src($image, "large");
        $href = vc_build_link($action_link);
        ?>

        <div class="block banner-under-slider hidden-xs <?php echo $extra_class; ?>">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7 col-md-6">
                        <div class="row row-flex">
                            <div class="col-sm-5 col-md-6 col-title">
                                <h2><?php echo $title; ?></h2>
                                <h2 class="h-lg text-right"><span class="color"><?php echo $title2; ?></span></h2>
                            </div>
                            <div class="col-sm-7 col-md-6">
                                <p><?php echo $content; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 col-md-6">
                        <div class="row row-flex">
                            
                            <div class="col-md-6 col-lg-8 col-img">
                                <?php if($img){ ?>
                                <div class="negative-margin"><img src="<?php echo $img[0]; ?>" class="img-responsive" alt=""></div>
                                <?php } ?>
                            </div>
                            
                            <?php if($href['url']!=''){ ?>
                            <div class="col-md-6 col-lg-4 action hidden-xs">
                                <a  class="btn btn-full btn-border" 
                                    href="<?php echo $href['url'];?>" 
                                    <?php if(!(empty($href['target']))):?> 
                                        target="<?php echo $href['target'];?>" 
                                    <?php endif;?> 
                                    rel="<?php echo $href['rel'];?>"  
                                ><?php echo $href['title'];?></a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
        $output = ob_get_clean();
        return $output;
    }
}
new car_repair_bannerUnderSlider();