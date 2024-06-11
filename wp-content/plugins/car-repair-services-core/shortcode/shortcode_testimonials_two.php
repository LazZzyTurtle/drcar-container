<?php
class car_repair_testimonials {

    public function __construct() {
        add_shortcode('testimonials_two', array($this, 'create_testimonialstwo_shortcode'));
    }

    function create_testimonialstwo_shortcode($atts, $content = null) {
        $atts = shortcode_atts(
                array(
            'title' => 'What Our Customers Say',
                ), $atts, 'testimonials_two'
        );
        $title = $atts['title'];
        $output = ' <div class="block bg-4">'
                . '<div class="container-fluid">'
                . '<h2 class="h-lg text-center">' . $title . '</h2>'
                . '<div class="testimonials-carousel2">';

        $orderby = 'DESC';
        $args = array(
            'posts_per_page' => 20,
            'post_type' => 'car-testimonial',
            'orderby' => $orderby,
            'paged' => 1,
            'no_found_rows' => true,
        );

        $count_pages = wp_count_posts('car-testimonial');
        $count_posts = wp_count_posts('car-testimonial')->publish;
        $query = new WP_Query($args);

        ob_start();
        while ($query->have_posts()) : $query->the_post();
            $post_id = get_the_ID();
            $client_name = get_post_meta(get_the_ID(), 'framework-client-name', true);
            $client_ratting = get_post_meta(get_the_ID(), 'framework-client-ratting', true);
            $user_location = get_post_meta(get_the_ID(), 'framework-user-location', true);
            $test_image_id = get_post_meta(get_the_ID(), 'framework-testimonials-image', true);
            $image_src = '';
            if (!empty($test_image_id)) {
                $shortcode_image = wp_get_attachment_image_src($test_image_id, 'car-repair-services-testimonial');
                $image_src = $shortcode_image[0];
            }
            $attachement = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'car-repair-services-testimonial');
            ?>

            <div class="testimonials-item2">
                <div class="inside">
                    <div class="container">
                        <div class="meta">
                            <span class="rating">
                                <?php
                                for ($x = 1; $x <= (int) $client_ratting; $x++) {
                                    echo '<i class="icon-star"></i>';
                                }
                                ?>
                            </span>
                            <span class="username"><?php echo $client_name; ?> </span>
                            <span class="userfrom"><?php echo $user_location; ?></span></div>
                        <div class="text"><?php echo the_content(); ?></div>
                    </div>
                    <div class="testimonial-auto animations" data-animate-start="fadeInRight" data-animate-end="fadeOut" data-delay="0">
                        <?php if (!empty($test_image_id)) { ?>
                            <img src="<?php echo esc_url($image_src); ?>" alt="">
                        <?php } else { ?>
                            <img src="<?php echo esc_url($attachement[0]); ?>" alt="">
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php
        endwhile;

        $output .= ob_get_clean();
        $output .= '</div></div></div>';
        return $output;
    }

}

new car_repair_testimonials();
