<?php
add_shortcode('gallaries', 'car_gallaries_cb');
function car_gallaries_cb($atts = array()) {
    extract(shortcode_atts(array(
        'layout_type' => '1',
        'title' => '',
        'showposts' => '-1',
        'orderby' => 'date',
        'order' => 'DESC',
                    ), $atts));
    $filter_content_class = "";

    wp_enqueue_script('isotope-pkgd');
    wp_enqueue_script('magnific-popup');

    ob_start();
    $test_query = new WP_Query("post_type=gallery&showposts={$showposts}&orderby={$orderby}&order={$order}");
    ?>
    <div class="filters-by-category">
        <ul class="option-set" data-option-key="filter">
            <li><a href="#filter" data-option-value="*" class="selected"><?php echo wp_kses_post(__('All', 'car-repair-services-core')); ?></a></li>
            <?php
            $taxonomy = 'gallery-cat';
            $terms = get_terms($taxonomy, array('orderby' => $orderby, 'order' => $order));
            if (!empty($terms) && !is_wp_error($terms)) {

                $filters = array('');

                foreach ($terms as $term) {
                    $filters[] = $term->slug;

                    echo '<li><a href="#filter" data-option-value=".' . $term->slug . '" class="">' . $term->name . '</a></li>';
                }
            }
            ?>
        </ul></div>
    <?php
    if ($test_query->have_posts()) :
        $rand = rand(000000, 999999);
        $prefix = "framework";

        echo '<div class="gallery gallery-isotope ' . $filter_content_class . '" id="gallery"> ';

        while ($test_query->have_posts()): $test_query->the_post();


            $post_id = get_the_ID();


            $terms = get_the_terms($post_id, 'gallery-cat');
            $filter_class = "";
            if ($terms && !is_wp_error($terms)) :

                $filter = array();

                foreach ($terms as $term) {
                    $filter[] = $term->slug;
                }

                $filter_class = join(" ", $filter);
            endif;

            $gallary_url = get_post_meta($post_id, "{$prefix}-gallery-url", true);
            ?>
            <div class="gallery-item <?php echo esc_attr($filter_class); ?>">
                <div class="gallery-item-image">
            <?php
            $gallery_image = get_post_meta($post_id, "{$prefix}-gallery", false);

            if (isset($gallery_image[0]) && !empty($gallery_image[0])) {
                echo wp_get_attachment_image($gallery_image[0], 'full');
            } else {
                the_post_thumbnail('car_repair_service_gallery-thumbnail');
            }
            
            $image_url = wp_get_attachment_url(get_post_thumbnail_id());
            ?>
                    <a class="hover" href="<?php echo esc_url($image_url) ?>">
                        <span class="view">
                            <span class="icon icon-search"></span>
                        </span>
                        <span class="tags">
                            <span class="pull-left"><?php the_title(); ?></span>   
                        </span>
                    </a> 
                </div>
            </div>

            <?php
        endwhile;
        echo '</div>';
    endif;
    echo ' <!-- gallery -->';
    echo ' </div>';

    wp_reset_postdata();

    return ob_get_clean();
}
