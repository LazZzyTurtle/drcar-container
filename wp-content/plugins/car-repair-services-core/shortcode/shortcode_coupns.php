<?php
class car_repair_servicesCoupns {

    public function __construct() {
        add_shortcode('car_repair_coupns', array($this, 'car_repair_coupns_func'));
    }

    public function car_repair_coupns_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'extra_class' => '',
            'column' => 2,
            'per_page' => -1,
                        ), $atts));



        $orderby = 'DESC';
        $args = array(
            'posts_per_page' => $per_page,
            'post_type' => 'our-coupons',
            'orderby' => $orderby,
            'no_found_rows' => true,
        );

        $column_no = $column;

        switch ((int) $column_no) {
            case 2:
                $colclass = 'col-md-6';
                break;
            case 4:
                $colclass = 'col-md-3 col-sm-4 col-xs-12';
                break;
            default:
                $colclass = 'col-md-4 col-sm-4 col-xs-12';
                break;
        }
        $query = new WP_Query($args);
        $rand = rand(000000, 999999);
        $loop = 1;
        ob_start();
        ?>

        <div class="tab-content row">

            <?php
            if ($query->have_posts()) :

                $totalfound = $query->post_count;
                ?>
                <?php
                while ($query->have_posts()) : $query->the_post();
                    $post_id = get_the_ID();
                    $coupon_top_left = get_post_meta(get_the_ID(), 'framework-coupon-top-left', true);
                    $coupon_top_right = get_post_meta(get_the_ID(), 'framework-coupon-top-right', true);
                    $coupon_bottom_left = get_post_meta(get_the_ID(), 'framework-coupon-bottom-left', true);
                    $coupon_bottom_right = get_post_meta(get_the_ID(), 'framework-coupon-bottom-right', true);
                    ?>
                    <!-- post -->
                    <div class="<?php echo esc_html__($colclass); ?>">
                        <div class="coupon-print">
                            <div class="coupon-print-inside">
                                <div class="coupon-print-row-top">
                                    <div class="coupon-print-col-left">
                                        <i><?php echo esc_html__($coupon_top_left); ?></i>
                                    </div>
                                    <div class="coupon-print-col-right">
                                        <div class="contact-info"><i class="icon icon-locate"></i><?php echo esc_html__($coupon_top_right); ?></div>
                                    </div>
                                </div>
                                <?php echo get_the_post_thumbnail($post_id, 'car-repair-services-coupon', array('class' => 'img-responsive-inline')); ?>

                                <div class="coupon-print-row-bot">
                                    <div class="coupon-print-col-left">
                                        <?php echo esc_html__($coupon_bottom_left); ?>
                                    </div>
                                    <div class="coupon-print-col-right text-right">
                                        <?php echo esc_html__($coupon_bottom_right); ?>
                                    </div>
                                </div>
                            </div>
                            <!--<a href="#"  id="coupon_id" class="print-link">print coupon</a>-->
                            <a href="javascript:void(0)"  id="coupon_id" data-id="<?php echo $post_id; ?>" class="print-link"><?php echo esc_html_e(__('Print Coupon', 'car-repair-services-core')); ?></a>
                            <div id="popUpLoader_<?php echo $post_id; ?>"  class="more-loader-coupon"><img class="lazyLoad" data-original="<?php echo CAR_REPAIR_SERVICES_IMG_URL; ?>ajax-loader.gif"  src="#" alt=""></div>
                        </div>
                    </div>
                    <?php
                    $loop++;
                endwhile;
                ?>
            <?php endif; ?>   
            <?php
            $output = ob_get_clean();
            return $output;
        }

    }

    new car_repair_servicesCoupns();