<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Car_Repair_Services
 */

$car_repair_services = car_repair_services_options();

$theme = isset($car_repair_services['theme_setting']) && $car_repair_services['theme_setting'] == '1';
if($theme != '1'){
    if(is_active_sidebar('left_sideber')){
        ?>
        <div class="col-md-5 col-lg-4 column-right">
            <div class="column-wrapper-right">
                <?php dynamic_sidebar('left_sideber')?>
            </div>
        </div>
        <?php
    }
}else{
    if(is_active_sidebar('left_sideber')){
        ?>
        <div class="col-md-3 column-right">
            <?php dynamic_sidebar('left_sideber')?>
        </div>
        <?php
    }
}