<?php 
$style = $post->style;
$post_id = get_the_ID();
$prefix = "framework";

$terms = get_the_terms($post_id, 'gallery-cat');
$filter_class = "";
if ($terms && !is_wp_error($terms)) :
    $filter = array();
    foreach ($terms as $term) {
        $filter[] = $term->slug;
    }
    $filter_class = join(" ", $filter);
endif;
?>
<?php if($style == 'comparisons_gallery'){ 


    $compar_before_gallery_image = get_post_meta( $post_id, "{$prefix}-compare-before-gallery", false );
    $compar_after_gallery_image = get_post_meta( $post_id, "{$prefix}-compare-after-gallery", false );
    if(!empty($compar_before_gallery_image) && !empty($compar_after_gallery_image)){
    ?>
    <div class="gallery-item <?php echo esc_attr($filter_class); ?> bg-none">
        <div class="comparing-obj">
            <div class="js-comparing-img">
            <?php
            $compar_before_gallery_image = get_post_meta($post_id, "{$prefix}-compare-before-gallery", false);
            if (isset($compar_before_gallery_image[0]) && !empty($compar_before_gallery_image[0])) {
                echo wp_get_attachment_image($compar_before_gallery_image[0], 'full');
            } 
            $compar_after_gallery_image = get_post_meta($post_id, "{$prefix}-compare-after-gallery", false);
            if (isset($compar_after_gallery_image[0]) && !empty($compar_after_gallery_image[0])) {
                echo wp_get_attachment_image($compar_after_gallery_image[0], 'full');
            } 
            ?>
            </div>
            <h6 class="comparing-obj__title"><?php the_title();?></h6>
        </div>
    </div>
<?php  }
            }else{?>
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
            <span class="view"></span>
        </a>
    </div>
</div>
<?php }