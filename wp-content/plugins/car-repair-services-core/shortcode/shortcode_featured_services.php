<?php
Class FeaturedServices {

    public function __construct() {
        add_shortcode('featured_services', array($this,'create_featuredservices_shortcode'));
    }    
    public function create_featuredservices_shortcode($atts, $content = null) {
        
    // Attributes
    $atts = shortcode_atts(
            array(
        'title' => 'Featured Services',
        'sub_title' => 'We offer full service auto repair & maintenance',
        'image' => '',
        'tabs' => '',
        'url' => '',
        'extra_class' => '',
            ), $atts, 'featured_services'
    );
    // Attributes in var
    $title = $atts['title'];
    $sub_title = $atts['sub_title'];
    $image = $atts['image'];
    $url = $atts['url'];
    $attachement = wp_get_attachment_image_src((int) $image, array('814', '330'));
    $tabs_array = $atts['tabs'];
    $tabs = vc_param_group_parse_atts($tabs_array);
    ob_start();
    ?>
    <div class="block">
        <div class="container container-fluid-sm">
            <div class="text-center">
                <h2 class="h-lg"><?php echo $title; ?></h2>
                <p class="info"><?php echo $sub_title; ?></p>
            </div>
            <div class="divider-md"></div>
            <div class="services-tabs">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs services-tabs-nav" role="tablist">
                    <?php
                    $i = 1;
                    foreach ($tabs as $item) {
                        ?>
                        <li class="<?php if ($i == 1) echo 'active'; ?>"><a href="#" data-icon='icon<?php echo $i; ?>'>
                        <?php if(isset($item['service_icon_img']) && !empty($item['service_icon_img'])){ 
                            $ser_icon_img = wp_get_attachment_image_src($item['service_icon_img']);?>
                            <img src="<?php echo esc_url($ser_icon_img[0]);?>"/>
                        <?php }else{ ?>
                            <i class="<?php echo  (isset( $item['service_icon'])) ?  $item['service_icon']:'';?>"></i>
                        <?php } ?>  
                        <span><?php echo (isset( $item['service_title'])) ?  $item['service_title']:''; ?></span></a></li>
                        <?php
                        $i++;
                    }
                    ?>
                </ul>
                <!-- Tab panes -->
                <div class="services-tabs-content">
                    <div class="services-tabs-content-bg-wrap">
                        <div class="services-tabs-content-bg">
                            <img src="<?php
                            if ($attachement != array()) {
                                echo esc_url($attachement[0]);
                            }
                            ?>" alt="">
                            <div class="services-tabs-icons">
                                <?php
                                $i = 1;
                                foreach ($tabs as $item) {
                                    ?>
                                    <span class="services-tabs-icon icon<?php echo $i; ?>">
                                        <?php if(isset($item['service_icon_img']) && !empty($item['service_icon_img'])){ 
                                            $ser_icon_img = wp_get_attachment_image_src($item['service_icon_img']);
                                            ?>
                                            <img src="<?php echo esc_url($ser_icon_img[0]);?>"/>
                                        <?php }else{ ?>
                                            <i class="<?php echo  (isset( $item['service_icon'])) ?  $item['service_icon']:'';?>"></i>
                                        <?php } ?>         
                                    </span>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="services-tab-info">
                        <?php
                        $custom_css = '';
                        $i = 1;
                        foreach ($tabs as $item) {
                            ?>
                            <p class="services-tabs-text icon<?php echo $i; ?> <?php if ($i == 1) echo 'active'; ?>"><?php echo $item['services_info']; ?></p>
                            <?php
                            if(isset($item['position_left']) && isset($item['position_left'])){
                                $left = (int) $item['position_left'];
                                $top = (int) $item['position_top'];
                                $custom_css .= ".services-tabs .services-tabs-icons > span:nth-child($i) { left: $left%; top: $top%; }";
                            }
                            $i++;
                        }
                        ?>
                    </div>
                    <?php $href = vc_build_link($url);
                        if($href['title'] == ""){
                            $href['title'] = 'Know More';
                        }else{
                            $href['title'];
                        }  
                        
                        if($href['url'] != ""){
                        ?>
                        <div class="services-tab-button">
                            <a class="btn btn-invert" href="<?php echo $href['url']; ?>" <?php if (!(empty($href['target']))): ?> target="<?php echo $href['target']; ?>"<?php endif; ?>><span><?php echo $href['title'];?></span></a>
                        </div>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    echo '<style type="text/css"> ' . $custom_css . ' </style>';
    return ob_get_clean();
    }

}

new FeaturedServices();