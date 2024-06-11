<?php
add_shortcode('car_repair_services', 'car_repair_services_func');

function car_repair_services_func($atts, $content = null) {
    extract(shortcode_atts(array(
        'extra_class' => '',
        'pagination' => 1,
        'per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'column'  => 3,
        'limit_per_tab' => 6,
        'showlink'=>1,
		'fullpartlink'=>0,
                    ), $atts));


    $args = array(
        'posts_per_page' => $per_page,
        'post_type' => 'car_services',
        'orderby' => $orderby,
        'order' => $order,
        'no_found_rows' => true,
    );

    if($column == 2){
        $column = 'col-xs-6 col-sm-6 col-md-6';
    }else{
        $column = 'col-xs-6 col-sm-6 col-md-4';
    }

    $query = new WP_Query($args);
    $rand = rand(000000, 999999);
    $loop = 1;
    $limit_per_tab = (int) $limit_per_tab;
    ob_start();
    ?>
    <div class="tab-content">

    <?php
    if ($query->have_posts()) :

        $totalfound = $query->post_count;
        ?>
            <div class="row services-alt tab-pane fade active in" id="services<?php echo esc_attr($loop) ?>">
            <?php
            while ($query->have_posts()) : $query->the_post();
                $post_id = get_the_ID();
                $page_icon = get_post_meta(get_the_ID(), 'framework-service-icon', true);
				$page_icon_link = get_post_meta(get_the_ID(), 'framework-service-page-icon-link', true);
                
				if($page_icon_link!=''){
					wp_enqueue_style( 'font-awesome-plugin', $page_icon_link, '', null );
				}
				
                $page_sub_head = get_post_meta(get_the_ID(), 'framework-service-page-sub-head', true);
				$page_icon_image_id = get_post_meta(get_the_ID(), 'framework-service-icon-image');
				$page_icon_image_src='';
				if(!empty($page_icon_image_id)){
					$page_icon_image=wp_get_attachment_image_src( $page_icon_image_id[0], array(100,100),false, array(100,100));
					$page_icon_image_src=$page_icon_image[0];
				}
				
                ?>
                    <!-- post -->

					
                    <div class="services-block-alt <?php echo esc_attr($column);?>">
                    <?php if($fullpartlink){?>
                    <a href="<?php the_permalink(); ?>">
                    <?php } ?>
                        <div class="image">
                            <?php if($showlink && !$fullpartlink){ ?>
                            <a href="<?php the_permalink(); ?>" class="image-scale-color">
                                <?php echo get_the_post_thumbnail($post_id, 'car-repair-services-thumbnail', array('class' => 'img-responsive-inline')); ?>
                            </a>
                            <?php }else{ ?>
                                <?php echo get_the_post_thumbnail($post_id, 'car-repair-services-thumbnail', array('class' => 'img-responsive-inline')); ?>
                            <?php } ?>
                            <?php if($page_icon_image_src!=''){?>
								<div class="fack_icon_div"><img src="<?php echo esc_html__($page_icon_image_src); ?>" /></div>
							<?php }else{ ?>
								<i class="icon <?php echo esc_html__($page_icon); ?>"></i>
							<?php } ?>
                            
                        </div>
                        <div class="caption">
                            <h3 class="title"><?php echo get_the_title(); ?></h3>
                            <div class="text">
                                <?php echo $page_sub_head; ?>
                            </div>
                            <?php if($showlink && !$fullpartlink){ ?>
                                <a href="<?php the_permalink(); ?>" class="services-link icon-arrowhead-pointing-to-the-right"></a>
                            <?php } ?>

                        </div>
                        <?php if($fullpartlink){?>
                    	</a>
                    <?php } ?>
                    </div>
					
                    <?php
                    if ($loop % $limit_per_tab == 0 && $pagination == 1 && $loop < $totalfound) {
                        $index = (int) ($loop / $limit_per_tab) + 1;
                        echo '</div><!--.services-alt--><div class="row services-alt tab-pane fade in" id="services' . esc_attr($index) . '">';
                    }

                    $loop++;
                endwhile;
                ?>
                <!-- post navigation -->
            </div> <!--.services-alt-->
        </div><!--.tab-content-->
        <?php
        if ($pagination == 1) :
            $total_pages = ceil($totalfound / $limit_per_tab);
            if ($total_pages > 1) {
                ?>
                <ul class="nav nav-pills">
                    <?php
                    for ($ii = 1; $ii <= $total_pages; $ii++) {
                        $nav_active = '';
                        if ($ii == 1) {
                            $nav_active = 'active';
                        }
                        ?>
                        <li class="<?php echo esc_attr($nav_active) ?>">
                            <a data-toggle="pill" href="#services<?php echo esc_attr($ii) ?>"><?php echo esc_html($ii) ?></a>
                        </li>
                <?php } ?>
                </ul>
            <?php }
        endif;
        ?>   
    <?php endif; ?>

    <?php
    $output = ob_get_clean();
    return $output;
}
