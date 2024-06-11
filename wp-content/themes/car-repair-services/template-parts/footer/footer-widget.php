<?php
$car_repair_services_opt = car_repair_services_options();
?>
<div class = "page-footer page-footer-widget">
    <div class = "footer-content">
        <?php  
        $widgetized_footer = $car_repair_services_opt['car_repair_services-widgetized_footer'];

        if(isset($widgetized_footer) && $widgetized_footer==1){
            $wid_footer_coloumn_num = $car_repair_services_opt['car_repair_services-wid_footer_style'];
            get_template_part('template-parts/footer/footer', $wid_footer_coloumn_num.'-columns'); 
        }
        
        ?>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="copyright"><?php echo wp_kses_post($car_repair_services_opt['car_repair_services-footer_copyright']); ?></div>
        </div>
    </div>			
    <!-- //Footer -->
    <div class="darkout-menu"></div>
</div>