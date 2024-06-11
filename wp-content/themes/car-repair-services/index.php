<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Car_Repair_Services
 */

get_header(); ?>
<?php 
$car_repair_services = car_repair_services_options();

$theme = isset($car_repair_services['theme_setting']) && $car_repair_services['theme_setting'] == '1';

if($theme != '1'){
$show_breadcrumb = get_post_meta(get_the_ID(), 'framework_show_breadcrumb', true);

$car_repair_services_opt = car_repair_get_options();
$bt_type = '';
if( isset($car_repair_services_opt['bt_type']) && $car_repair_services_opt['bt_type'] == '2' ){ 
    $bt_type = 'page-title-wrapper';
}

if ( is_home() && ! is_front_page() ){ ?>

<div id="pageTitle" class="<?php echo esc_attr($bt_type);?>"> 
    <div class="container">
        <h1><?php echo esc_html(single_post_title()); ?></h1>
        <?php if (!is_front_page() && (!$show_breadcrumb || $show_breadcrumb == 'on') ) : ?>
        <div class="breadcrumbs">
            <div class="breadcrumb">
                <?php do_action('car_repair_services_breadcrumb'); ?>
            </div>
        </div>
        <?php endif;?>      
    </div>
</div>
<?php } ?>
    <div id="pageContent">
        <div class="container">
            <div class="row">
            <?php if ( is_active_sidebar( 'left_sideber' ) ){ ?>
                    <div class="col-md-7 col-lg-8 column-center">
                <?php }else{ ?>
                    <div class="col-md-12 column-center">
                <?php } ?>
                    <?php 
                    if ( have_posts() ) :
                        ?>
                      
                        <?php 
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();
                        $post_id = $post->ID;
                            ?>
                            <div class="blog-post">
                                <?php echo get_template_part( 'template-parts/media/content', get_post_format() ); ?>
                                <?php car_repair_services_posted_on() ;?>
                                <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <div class="post-teaser">
                                <?php the_excerpt();?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="btn btn-border btn-invert"><span><?php esc_html_e('Read More','car-repair-services');?></span></a>
                            </div>
                            <?php 
                        endwhile;
                        ?>
                        <?php
                        global $wp_query;
                        $total_pages = $wp_query->max_num_pages;
                        if ( $total_pages > 1 ) {
                            $current_page = max( 1, get_query_var( 'paged' ) );
                            echo '<ul class="nav nav-pills"><li>';
                            echo paginate_links(
                                array(
                                    'format'    => 'page/%#%/',
                                    'current'   => $current_page,
                                    'total'     => $total_pages,
                                    'prev_text' => '<span class="icon icon-arrow-left"></span>',
                                    'next_text' => '<span class="icon icon-arrow-right"></span>',
                                )
                            );
                            echo '</li></ul>';
                        }
				    ?>
                    <?php 
                    else :  
                        get_template_part( 'template-parts/content', 'none' );
                    endif; ?>
                  
                </div>
                <?php get_sidebar();?>
            </div>
        
        
        </div>
    </div>
<?php
}else{
    $show_breadcrumb = get_post_meta(get_the_ID(), 'framework_show_breadcrumb', true);

    if ( is_home() && ! is_front_page() ){ ?>
    
    <div id="pageTitle">
        <?php if (!is_front_page() && (!$show_breadcrumb || $show_breadcrumb == 'on') ) : ?>
        <?php do_action('car_repair_services_breadcrumb'); ?>
        <?php endif;?>
        <?php if( isset($car_repair_services_opt['bt_type']) && $car_repair_services_opt['bt_type'] == '1' ){ ?>
            <?php if( isset($car_repair_services_opt['enable_blog_title']) && $car_repair_services_opt['enable_blog_title'] == '1' ){ ?>
            <header class="entry-header">
                <?php 
                $myvalue = single_post_title('',false);
    
                $arr = explode(' ',trim($myvalue));
                $push=array_shift( $arr);
                $push1 = implode(' ', $arr);
    
                ?>
                <h1><?php echo esc_html($push); ?> <span class="color"><?php echo esc_html($push1); ?></span></h1>
            </header>
            <?php } ?>  
        <?php } ?>  
        <?php } ?>
    </div>
    
        <div id="pageContent">
        <?php if( isset($car_repair_services_opt['bt_type']) && $car_repair_services_opt['bt_type'] == '2' ){ ?>
        <?php if( isset($car_repair_services_opt['enable_blog_title']) && $car_repair_services_opt['enable_blog_title'] == '1' ){ ?>
            <header class="entry-header">
                <?php 
                $myvalue = single_post_title('',false);
    
                $arr = explode(' ',trim($myvalue));
                $push=array_shift( $arr);
                $push1 = implode(' ', $arr);
    
                ?>
                <h1><?php echo esc_html($push); ?> <span class="color"><?php echo esc_html($push1); ?></span></h1>
            </header>
        <?php } ?>
        <?php } ?>
    
            <div class="container">
                
                <?php if( isset($car_repair_services_opt['car_repair_services_blog_type_style']) && $car_repair_services_opt['car_repair_services_blog_type_style'] == '3' ){ ?>
                    <div class="row">
                    <?php if ( is_active_sidebar( 'left_sideber' ) ){ ?>
                        <div class="col-md-9 column-center with-sidebar-blog">
                    <?php }else{ ?>
                        <div class="col-md-12 column-center">
                    <?php } ?>
                            <div class="blog-isotope">
                                <?php if ( have_posts() ) : ?>
                                    <div class="post_loop_cont_wrap">
                                        <div class="post_loop_cont">
                                        <?php 
                                        /* Start the Loop */
                                        while ( have_posts() ) : the_post();?>
                                                <div class="blog-post">
                                                    <div class="post-image">
                                                    <?php get_template_part( 'template-parts/media/content', get_post_format() );   ?> 
                                                    </div>
                                                    <div class="post-content">
                                                        <ul class="post-meta">
                                                            <li class="author"><?php esc_html_e('by', 'car-repair-services')?> <b><i><?php the_author();?></i></b></li>
                                                            <li><a href="<?php the_permalink() ?>"><i class="icon icon-clock"></i><span><?php echo get_the_date()?></span></a></li>
                                                            <li><i class="icon icon-interface"></i><span><?php comments_number( esc_html__('0', 'car-repair-services'), esc_html__('1', 'car-repair-services'), esc_html__('%', 'car-repair-services') ); ?></span></li>
                                                        </ul>
                                                        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                        <div class="post-author"><?php esc_html_e( 'by', 'car-repair-services' ); ?> <?php printf(esc_html__('%s', 'car-repair-services'), get_the_author())?></div>
                                                        <div class="post-teaser">
                                                            <?php the_excerpt(); ?>
                                                        </div>
                                                        <a href="<?php the_permalink() ?>" class="btn"><span><?php echo esc_html__('Continue Reading', 'car-repair-services')?></span></a>
                                                    </div>
                                                </div>
                                            <?php 
                                            
                                        endwhile;
                                        ?>
                                        </div>
                                    
                                    </div>
                                <?php 
                                else :
    
                                    get_template_part( 'template-parts/content', 'none' );
    
                                endif; 
                                ?>
                            
                            </div> 
                            <div class="clearfix"></div>
                            <?php 
                            
                            if( isset($car_repair_services_opt['blogpost_pagination_load']) && $car_repair_services_opt['blogpost_pagination_load'] == 'navigation' ){ 
                                the_posts_navigation();
                            }elseif( isset($car_repair_services_opt['blogpost_pagination_load']) && $car_repair_services_opt['blogpost_pagination_load'] == 'ajax_load' ){
                                ?>
                                <div id="postPreload"></div>
                                <div id="post_ajax_load"></div>
                                <div class="text-center"><a class="btn btn-default view-more-post ajax_load_post_btn" data-post_per_load="<?php echo get_option('posts_per_page'); ?>" data-load="post-more-ajax-card.txt" ><?php esc_html_e('More Posts', 'car-repair-services'); ?></a>
                                <img class="ajax_load_post_img" src="<?php echo esc_url(CAR_REPAIR_SERVICES_IMG_URL); ?>ajax-loader.gif" /> 
                                </div>
                                <div class="divider divider-lg"></div>
                                <?php 
                            }else{
                                the_posts_pagination();
                            }
                            ?>
                        </div>
                    <?php get_sidebar();?>
                    </div>
                <?php } else{ ?>
                
                <div class="row">
                <?php if ( is_active_sidebar( 'left_sideber' ) ){ ?>
                        <div class="col-md-9 column-center with-sidebar-blog">
                    <?php }else{ ?>
                        <div class="col-md-12 column-center">
                    <?php } ?>
                        <?php 
                        if ( have_posts() ) :
                            ?>
                            <div class="post_loop_cont_wrap">
                                <div class="post_loop_cont">
                                <?php 
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                $post_id = $post->ID;
                                    ?>
    
                                    <div class="blog-post">
                                    <?php
                                     $format = get_post_format( $post_id ); 
                                    if ($format=="quote") {
            
                                   
                                    ?>
                                     <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    
                                     <?php the_content(); 
                                      car_repair_services_posted_on() ;
                                 } ?>
                                    <?php get_template_part( 'template-parts/media/content', get_post_format() );   ?>
    
                                       <?php 
                                        if($format!="quote") :
                                        ?>
                                        <?php if( isset($car_repair_services_opt['car_repair_services_blog_type_style']) && $car_repair_services_opt['car_repair_services_blog_type_style'] == '2' ){ ?>
                                        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                       <?php } ?>
                                       <?php car_repair_services_posted_on() ;?>
                                       
                                       <?php if( isset($car_repair_services_opt['car_repair_services_blog_type_style']) && $car_repair_services_opt['car_repair_services_blog_type_style'] == '1' ){ ?>
                                        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                       <?php } ?>
                                       <?php
                                         if( get_option('rss_use_excerpt') ){
                                        the_excerpt();
                                        echo '<a href="'. get_the_permalink() .'" class="readmore btn btn-default btn-blue">'. esc_html__('Read more', 'car-repair-services') . '</a>';
                                            } else{
                                                the_content( sprintf(
                                                    /* translators: %s: Name of current post. */
                                                    wp_kses( __( 'Continue reading %s', 'car-repair-services' ), array( 'span' => array( 'class' => array() ) ) ),
                                                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                                ) );
                                            }
    
                                        wp_link_pages( array(
                                            'before'      => '<div class="page-pagination"><div class="page-numbers"><span class="page-links-title">' . esc_html__( 'Pages:', 'car-repair-services' ) . '</span>',
                                            'after'       => '</div></div>',
                                            'link_before' => '<span>',
                                            'link_after'  => '</span>',
                                            'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'car-repair-services' ) . ' </span>%',
                                            'separator'   => ', ',
                                        ) );
                                        ?>
                    
                                    <?php endif;?>
                                    </div>
                                    <?php 
    
                                endwhile;
                                ?>
                                </div>
                            <div class="clearfix"></div>
                            <?php 
                            
                            if( isset($car_repair_services_opt['blogpost_pagination_load']) && $car_repair_services_opt['blogpost_pagination_load'] == 'navigation' ){ 
                                the_posts_navigation();
                            }elseif( isset($car_repair_services_opt['blogpost_pagination_load']) && $car_repair_services_opt['blogpost_pagination_load'] == 'ajax_load' ){
                                ?>
                                <div id="postPreload"></div>
                                <div class="text-center"><a class="btn btn-default view-more-post ajax_load_post_btn" data-post_per_load="<?php echo get_option('posts_per_page'); ?>" data-load="post-more-ajax-card.txt" ><?php esc_html_e('More Posts', 'car-repair-services'); ?></a>
                                <img class="ajax_load_post_img" src="<?php echo CAR_REPAIR_SERVICES_IMG_URL; ?>ajax-loader.gif" />
                                </div>
                                <div class="divider divider-lg"></div>
                                <?php 
                            }else{
                                the_posts_pagination();
                            }
                            ?></div><?php 
                        else :  
    
                            get_template_part( 'template-parts/content', 'none' );
    
                        endif; ?>
                    
                    </div>
                    <?php get_sidebar();?>
                </div>
                <?php } ?>
            
            </div>
        </div>
<?php
}
get_footer();