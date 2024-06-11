<?php
add_shortcode( 'car_repair_services_post_loop', 'car_repair_services_post_loop_func' );
         function car_repair_services_post_loop_func ($atts, $content = null){
    
        extract(shortcode_atts(array(
            'post_loop' => '',
            'layout' => '',
            'is_pagination' => '',
            'extra_class' => '',
        ), $atts));

        wp_enqueue_script('isotope-pkgd');

        $pg_num = get_query_var('paged') ? get_query_var('paged') : 1;
        $args = array(
            'post_type'              => array( 'post' ),
            'post_status'            => array( 'publish' ),
            'nopaging'               => false,
            'paged'                  => $pg_num,
            'posts_per_page'         => get_option('posts_per_page'),
            'orderby'         => 'ID',
            'order'         => 'DESC',
        );
      
        if($post_loop!=''){
            $post_loop = explode('|', $post_loop);
            $temp_args = array();
                        if(!empty($post_loop)){
                            foreach($post_loop as $param){
                                    $param = explode(':', $param);
                                    if(isset($param[0])){
                                        $temp_args[$param[0]] = $param[1];
                                    }
                            }
            }
            $post_loop = $temp_args;
                        
                        if(isset($post_loop['size']) && $post_loop['size']){
                            $args['posts_per_page'] = (int)$post_loop['size'];
                        }
                        if(isset($post_loop['post_type']) && $post_loop['post_type']){
                            $args['post_type'] = $post_loop['post_type'];
                        }
                        if(isset($post_loop['order_by']) && $post_loop['order_by']){
                            $args['orderby'] = $post_loop['order_by'];
                        }
                        if(isset($post_loop['order']) && $post_loop['order']){
                            $args['order'] = $post_loop['order'];
                        }
						if(isset($post_loop['categories']) && $post_loop['categories']){
                            $args['cat'] = $post_loop['categories'];
                        }
						if(isset($post_loop['authors']) && $post_loop['authors']){
                            $args['author'] = $post_loop['authors'];
                        }
						if(isset($post_loop['tags']) && $post_loop['tags']){
                            $args['tag__and'] = $post_loop['tags'];
                        }
        }
        
                        ob_start();
          
            $pg_num = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $query = new WP_Query( $args );
            $post_count=$query->found_posts;
            if( $layout == 'card' ){ ?>
            

                <div class="blog-isotope">
                    <div class="post_loop_cont_wrap" style="height: 100%;">
                <?php 
                // The Loop
                if ( $query->have_posts() ) {
                    ?>
                    <div class="post_loop_cont" style="height: 100%;"><?php
                    while ( $query->have_posts() ) {
                        $query->the_post();
                            ?>
                            <div class="blog-post">
                                <div class="post-image">
                                <?php get_template_part( 'template-parts/media/content', get_post_format() );   ?> 
                                </div>
                                <div class="post-content">
                                    <ul class="post-meta">
                                            <li class="author"><?php esc_html_e('by', 'car-repair-services-core')?> <b><i><?php the_author();?></i></b></li>
                                            <li><i class="icon icon-clock"></i><span><?php echo get_the_date()?></span></li>
                                            <li><i class="icon icon-interface"></i><span><?php comments_number( esc_html__('0', 'car-repair-services'), esc_html__('1', 'car-repair-services-core'), esc_html__('%', 'car-repair-services-core') ); ?></span></li>
                                    </ul>
                                    <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="post-author"><?php esc_html_e( 'by', 'car-repair-services-core' ); ?> <?php printf(esc_html__('%s', 'car-repair-services'), get_the_author())?></div>
                                    <div class="post-teaser">
                                        <p><?php the_excerpt(); ?></p>
                                        <a href="<?php echo  get_the_permalink() ?>" class="btn"><?php echo esc_html__('Continue Reading', 'car-repair-services-core') ?> </a>
                
                                    </div>
                                </div>
                            </div>
                        <?php 
                    }
                    ?>
                    
                    </div>
            
                    <div class="clearfix"></div>
                    <?php 
                    if($post_count > get_option('posts_per_page')){
						if( $is_pagination == 'navigation' ){ 
	
								 previous_posts_link('&laquo; Prev post');
								 next_posts_link( 'Next posts &raquo;', $query->max_num_pages );
						}elseif( $is_pagination == 'ajax-load' ){
							?>
							<div id="postPreload"></div>
							<div id="post_ajax_load"></div>
							<div class="text-center">
							<?php if(10 > get_option('posts_per_page')):?>
								<a class="btn btn-default view-more-post ajax_load_post_btn blog-grid" data-post-count="<?php echo $post_count ?>"  data-post_per_load="<?php echo get_option('posts_per_page'); ?>">
								<?php esc_html_e('More Posts', 'car-repair-services-core'); ?>
								</a>
							<?php endif;?>
							<img class="ajax_load_post_img lazyLoad" src="<?php echo CAR_REPAIR_SERVICES_IMG_URL; ?>ajax-loader.gif" data-original="<?php echo CAR_REPAIR_SERVICES_IMG_URL; ?>ajax-loader.gif" style="display: none;" />
							</div>
							<div class="divider"></div>
							<?php 
						}else{
							echo '';
						}
					}

                } else {
                    // no posts found
                }

                // Restore original Post Data
                wp_reset_postdata();
              
              ?></div>
                </div>
                
            <?php } else{ ?>

            

                    <?php 
                    if ( $query->have_posts() ) {
                        ?>
                        <div class="post_loop_cont_wrap" style="height: auto;">
                                                
                        <div class="post_loop_cont" style="height: 100%;">
                        <?php 
                        while ( $query->have_posts() ) {
                        $query->the_post();
?>
                            <div class="blog-post">
                                <div class="post-image">
                                <?php get_template_part( 'template-parts/media/content', get_post_format() );   ?> 
                                </div>
                                <div class="post-content">
                                    <ul class="post-meta">
                                        <li class="post-message"><i class="icon icon-chat-bubble"></i><span> <?php comments_number( '0', '1', '%' ); ?></span></li>
                                        <li><?php echo get_the_date('d / m / Y')?></li>
                                    </ul>
                                    <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="post-author"><?php esc_html_e( 'by', 'car-repair-services-core' ); ?> <?php printf(esc_html__('%s', 'car-repair-services'), get_the_author())?></div>
                                    <div class="post-teaser">
                                        <p><?php the_excerpt(); ?></p>
                                    </div>
                                </div>
                            </div>
<?php 
                        }
                        ?>
                        </div>
                        <div class="clearfix"></div>
                        <?php 
                        
                    if( $is_pagination == 'navigation' ){ 

                             previous_posts_link('&laquo; Prev post');
                             next_posts_link( 'Next posts &raquo;', $query->max_num_pages );
                    }elseif( $is_pagination == 'ajax-load' ){
                        ?>
                        <div id="postPreload"></div>
                        <div id="post_ajax_load"></div>
                        <div class="text-center"><a class="btn btn-default view-more-post ajax_load_post_btn" data-post_per_load="<?php echo get_option('posts_per_page'); ?>" data-load="post-more-ajax-card.txt" ><?php esc_html_e('More Posts', 'car-repair-services-core'); ?></a>
                        <img class="ajax_load_post_img lazyLoad" src="#" data-original="<?php echo CAR_REPAIR_SERVICES_IMG_URL; ?>/ajax-loader.gif" style="display: none;" />
                        </div>
                        <div class="divider"></div>
                        <?php 
                    }else{
                        echo '';
                    }
                        ?></div><?php 
                }else {

                        get_template_part( 'template-parts/content', 'none' );

                    } 
                    
                wp_reset_postdata();
                    ?>
                
            <?php } ?>

              
          <?php 
            $output = ob_get_clean();
            return $output;
    }
