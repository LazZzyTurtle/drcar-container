<?php
class car_repair_servicesTestimonials {
    public function __construct()
    {
        add_shortcode( 'car_repair_services_testimonials', array($this, 'car_repair_services_testimonials_func'));
    }

    public function car_repair_services_testimonials_func ($atts, $content = null)
    {
        $changed_atts = shortcode_atts(array(
            'style' => 'slider',
            'per_page' => '6',
            'slides_to_show' => '1',
            'slides_to_scroll' => 'true',
            'infinite' => 'true',
            'autoplay' => 'true',
            'autoplay_speed' => '3000',
            'arrows' => 'false',
            'dots' => 'true',
            'fade' => 'true',
            'extra_class' => '',
        ), $atts);

        extract(shortcode_atts(array(
            'style' => 'slider',
            'per_page' => '6',
            'extra_class' => '',
        ), $atts));

        wp_enqueue_script('isotope-pkgd');
        wp_localize_script( 'custom', 'ajax_testiomonial', $changed_atts);

        $orderby ='DESC';
        $args = array(
            'posts_per_page' => $per_page,
            'post_type' => 'car-testimonial',
            'orderby' => $orderby,
            'paged' => 1,
            'no_found_rows' => true,
        );

        $count_pages = wp_count_posts('car-testimonial');
        $count_posts = wp_count_posts( 'car-testimonial' )->publish;
        $query = new WP_Query($args);
        $rand = rand(000000, 999999);
        $i = 0;
        //$limit_per_tab = (int)$limit_per_tab;
        ob_start();

        if ($query->have_posts()) :
        ?>
        <?php if($style=='grid'): ?>
            <div id="main-div" class="blog-isotope">
                <input type="hidden" id="per_page" value="<?php echo $per_page; ?> "/>
                <input type="hidden" id="grid_style" value="<?php echo $style; ?> "/>
                <input type="hidden" id="total_tes" value="<?php echo $count_pages->publish; ?> "/>
            <?php else :?>
            <div class="testimonials-carousel <?php echo $extra_class ;?>">
            <?php endif ;?>
            <?php
            while ($query->have_posts()) : $query->the_post();
                $totalfound = $query->post_count;

            $post_id = get_the_ID();
            $client_name = get_post_meta(get_the_ID(), 'framework-client-name', true);
            $client_ratting = get_post_meta(get_the_ID(), 'framework-client-ratting', true);

            $attachement = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'car-repair-services-testimonial' );

            ?>
            <?php if($style=='grid'): ?>
                <div class="testimonial-card">
                    <div class="testimonial-card-title">
                    <h5><?php if( $client_name != '' ){ echo  esc_html($client_name); } ?></h5></div>
                    <div class="testimonial-card-text"> <?php   echo  the_content();   ?> </div>
                    <div class="testimonial-card-rating">
                        <div class="rating rating-<?php echo   esc_html($client_ratting);?>"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></div>
                    </div>
                </div>
            <?php else :?>
            <?php
                if($i == 0){
                    echo '<div class="testimonials ">';
                }
            ?>
            <?php
                $ratting_style = get_post_meta($post_id, 'framework-ratting_style', true);
                $rating_class="";

                if( $ratting_style==2)
                    $rating_class="testimonials-item--dark";
            ?>
                <div class="testimonials-item <?php echo $extra_class ;?> <?php  echo  $rating_class ; ?>">
                    <div class="inside">
                        <div class="meta"><span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star off"></i><i class="icon-star"></i></span><span class="username"><?php if( $client_name != '' ){ echo  esc_html($client_name); } ?></span></div>
                        <div class="text">  <?php   echo  the_content();   ?></div>
                    </div>
                    <div class="bg-image" <?php if( $attachement != array() ){ ?>  style="background-image: url(<?php echo esc_url( $attachement[0] ); ?>);" <?php } ?>>
                    </div>
                </div>
                <?php
                    $i++;
                    if($i == 2) {
                        $i = 0;
                        echo '</div>';
                    }
                ?>
                <?php endif; ?>

                <?php  endwhile;   ?>
                <?php
                    if($i > 0) {
                        echo '</div>';
                    }
                ?>
        </div>
            <?php if (($style == 'grid')&& ($count_posts>$per_page)) : ?>
                <div id="testimonialPreload"></div>

                <div id="moreLoader" class="more-loader"><img src="<?php echo CAR_REPAIR_SERVICES_IMG_URL; ?>ajax-loader.gif" alt=""></div>
                <div class="text-center"><a class="btn btn-lg btn-invert view-more-testimonial" data-load="testimonial-more-ajax.txt"><span><?php echo esc_html__('More Testimonials','car-repair-services-core');?></span></a></div>
            <?php endif;?>
        <?php endif; ?>
        <?php
        $output = ob_get_clean();
        return $output;
    }
}
new car_repair_servicesTestimonials();