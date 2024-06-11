<?php
class SmartPostsGrid extends WP_Widget {
    public $defaults;
    public function __construct() {
        $this->defaults = array(
            'title' => esc_html__('Popular Posts', 'car-repair-services'),
            'limit' => '2',
            'orderby' => 'date',
            'order' => 'DESC',
        );
        parent::__construct(
                'smart_posts_grid', // Base ID  
                esc_html__('Car-Services Posts Grid', 'car-repair-services'), // Name  
                array(
            'description' => esc_html__('This widget will display posts grid on sidebars.', 'car-repair-services')
                )
        );
    }

    function form($instance) {

        $instance = wp_parse_args((array) $instance, $this->defaults);
        extract($instance);
        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <strong><?php esc_html_e('Title', 'car-repair-services') ?>:</strong><br /><input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
            </label>
        </p>

        <p><label for="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>"><?php esc_html_e('Order By:', 'car-repair-services')?></label>
        <select id="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'orderby' )); ?>">
            <option value="ID" <?php selected( $orderby, 'ID' ); ?>><?php esc_html_e('ID', 'car-repair-services')?></option>
            <option value="date" <?php selected( $orderby, 'date' ); ?>><?php esc_html_e('Date', 'car-repair-services')?></option>
            <option value="comment_count" <?php selected( $orderby, 'comment_count' ); ?>><?php esc_html_e('Comments', 'car-repair-services')?></option>
            <option value="rand" <?php selected( $orderby, 'rand' ); ?>><?php esc_html_e('Random', 'car-repair-services')?></option>
        </select>
        </p>

       <p><label for="<?php echo esc_attr($this->get_field_id( 'order' )); ?>"><?php esc_html_e('Order:', 'car-repair-services')?></label>
        <select id="<?php echo esc_attr($this->get_field_id( 'order' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'order' )); ?>">
            <option value="DESC" <?php selected( $order, 'DESC' ); ?>><?php esc_html_e('Descending', 'car-repair-services')?></option>
            <option value="ASC" <?php selected( $order, 'ASC' ); ?>><?php esc_html_e('Ascending', 'car-repair-services')?></option>
        </select>
       </p>
       <p>
            <label for="<?php echo esc_attr($this->get_field_id('limit')); ?>">
                <strong><?php esc_html_e('Posts Limit', 'car-repair-services') ?>:</strong><br /><input class="widefat" type="number" id="<?php echo esc_attr($this->get_field_id('limit')); ?>" name="<?php echo esc_attr($this->get_field_name('limit')); ?>" value="<?php echo esc_attr($instance['limit']); ?>" />
            </label>
        </p>


        <?php
    }

    function widget($args, $instance) {
        global $post;
        if ( ! function_exists( 'car_repair_services_options' ) ) {
          return;
        }

        extract($args);

        echo wp_kses_post($before_widget);

        if (!empty($instance['title'])) {
            $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
            echo wp_kses_post($before_title . $title . $after_title);
        };
        $query_args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'orderby' => $instance['orderby'],
            'order'   => $instance['order'],
            'posts_per_page' => (int)$instance['limit']
        );
        
        $results = get_posts($query_args);

        $car_repair_services = car_repair_services_options();
		if(isset($car_repair_services['theme_setting'])){
			$theme = $car_repair_services['theme_setting'];
		}else{
			$theme = '';
		}
        ?>
        <?php if($theme != '2'){ ?>
        <div class="blog-post post-preview">
            <div class="wrapper">
                <div id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
                    <?php get_template_part( 'template-parts/media/content', get_post_format() );?>
                    <ul class="post-meta">
                        <li><i class="icon icon-clock"></i><span><?php echo get_the_date()?></span></li>
                        <li class="pull-right"><i class="icon icon-interface"></i><span><?php comments_number( esc_html__('0', 'car-repair-services'), esc_html__('1', 'car-repair-services'), esc_html__('%', 'car-repair-services') ); ?></span></li>
                    </ul>
                    <h4 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title()?></a></h4>
                    <ul class="post-meta">
                        <li class="author"><?php esc_html_e('by', 'car-repair-services')?> <b><i><?php the_author();?></i></b></li>
                    </ul>
                    <div class="post-teaser">
                        <?php the_excerpt()?>
                    </div>
                </div>
            </div>
        </div>
       <?php }else{ ?>
        <div class="side-post-wrapper">
        <?php
        if(!empty($results) && !is_wp_error($results)): foreach($results as $post): setup_postdata($post);
        ?>
        
            <a href="<?php the_permalink() ?>" class="side-post">
                <div class="side-post__img">
                    <?php echo the_post_thumbnail('car-repair-services-sidebar-post-img'); ?>
                </div>
                <div class="side-post__content">
                    <h6 class="side-post__title"><?php the_title()?></h6>
                    <div class="side-post__meta"><?php echo get_the_date()?></div>
                </div>
            </a>
        
        <?php
        endforeach; endif; ?>
        </div>
    <?php } ?>
       <?php wp_reset_postdata();
        echo wp_kses_post($after_widget);
    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['orderby'] = strip_tags($new_instance['orderby']);
        $instance['order'] = strip_tags($new_instance['order']);
        $instance['limit'] = strip_tags($new_instance['limit']);

        return $instance;
    }

}
function car_repair_service_smart_post_grid_widget() {
    register_widget( 'SmartPostsGrid' );
}
add_action( 'widgets_init', 'car_repair_service_smart_post_grid_widget' );