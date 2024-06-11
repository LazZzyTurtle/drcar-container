<?php
class SmartContactList extends WP_Widget {
    public $defaults;
    public function __construct() {
        $this->defaults = array(
            'title' => esc_html__('Contacts', 'car-repair-services'),
            'address' => '8494 Signal Hill Road Manassas,VA, 20110',
            'address_title' => 'Address',
            'phone_title' => 'Contact Phone',            
            'phone' => '1-800-123-4567',            
            'email_title' => 'E-mail Address',            
            'email' => 'officeone@youremail.com', 
            'hours_title' => 'Opening Hours',
            'hours' => 'Mon-Fri 08:00 AM - 05:00 PM, Sat-Sun',
           
         
        );
        parent::__construct(
                'smart_contact_list', // Base ID  
                esc_html__('Car Services Contact List', 'car-repair-services'), // Name  
                array(
                    'description' => esc_html__('This widget will display contact list.', 'car-repair-services'),
                    'classname'                   => 'block-aside__wrapper',
                )
        );
    }

    function form($instance) {

        $instance = wp_parse_args((array) $instance, $this->defaults);
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <strong><?php esc_html_e('Title', 'car-repair-services') ?>:</strong><br /><input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
            </label>
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address_title')); ?>"><?php esc_html_e('Address Title', 'car-repair-services') ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('address_title')); ?>" name="<?php echo esc_attr($this->get_field_name('address_title')); ?>" value="<?php echo wp_kses_post($instance['address_title']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address', 'car-repair-services') ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>"><?php echo wp_kses_post($instance['address']); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_title')); ?>"><?php esc_html_e('Phone Title', 'car-repair-services') ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_title')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_title')); ?>"  value="<?php echo wp_kses_post($instance['phone_title']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone', 'car-repair-services') ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>"><?php echo wp_kses_post($instance['phone']); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_title')); ?>"><?php esc_html_e('Email Title', 'car-repair-services') ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('email_title')); ?>" name="<?php echo esc_attr($this->get_field_name('email_title')); ?>"  value="<?php echo wp_kses_post($instance['email_title']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email', 'car-repair-services') ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>"><?php echo wp_kses_post($instance['email']); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('hours_title')); ?>"><?php esc_html_e('Hours Title', 'car-repair-services') ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('hours_title')); ?>" name="<?php echo esc_attr($this->get_field_name('hours_title')); ?>"  value="<?php echo wp_kses_post($instance['hours_title']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('hours')); ?>"><?php esc_html_e('Hours', 'car-repair-services') ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('hours')); ?>" name="<?php echo esc_attr($this->get_field_name('hours')); ?>"><?php echo wp_kses_post($instance['hours']); ?></textarea>
        </p>
   
        <?php
    }

    function widget($args, $instance) {
        extract($args);
        echo wp_kses_post($before_widget);
		if ( ! empty( $instance['title'] ) ) {
			echo '<h4 class="block-aside__title">' . $instance['title'] . '</h4>';
		};
        ?>
        <div class="block-aside__content">
            <div class="address-info">
            <?php
            if (!empty($instance['address'])):
                ?>
            <div class="address-info__item">
                <div class="address-info__icon icon-locate"></div>
                <div class="address-info__content">
                    <address>
                        <strong><?php echo wp_kses_post($instance['address_title'])?></strong>
                        <?php echo wp_kses_post($instance['address']); ?>
                    </address>
                </div>
            </div>
            <?php endif; ?>
            <?php
            if (!empty($instance['phone'])):?>
            <div class="address-info__item">
                <div class="address-info__icon icon-phone"></div>
                <div class="address-info__content">
                    <address>
                        <strong><?php echo wp_kses_post($instance['phone_title'])?></strong>
                        <?php echo wp_kses_post($instance['phone']); ?>
                    </address>
                </div>
            </div>
            <?php endif; ?>       
            <?php
            if (!empty($instance['email'])):?>
            <div class="address-info__item">
                <div class="address-info__icon icon-email"></div>
                <div class="address-info__content">
                    <address>
                        <strong><?php echo wp_kses_post($instance['email_title'])?></strong>
                        <a href="mailto:<?php echo esc_attr($instance['email']); ?>"><?php echo wp_kses_post($instance['email']); ?></a>
                    </address>
                </div>
            </div>
            <?php endif; ?>
            <?php
            if (!empty($instance['hours'])):?>
                <div class="address-info__item">
                    <div class="address-info__icon icon-clock"></div>
                    <div class="address-info__content">
                        <address>
                            <strong><?php echo wp_kses_post($instance['hours_title'])?></strong>
                            <?php echo wp_kses_post($instance['hours']); ?>
                        </address>
                    </div>
                </div>
            <?php endif; ?>

            </div>
        </div>
        <?php
        echo wp_kses_post($after_widget);
    }


    function update($new_instance, $old_instance) {

        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['address_title'] = $new_instance['address_title'];
        $instance['address'] = $new_instance['address'];
        $instance['phone_title'] = $new_instance['phone_title'];
        $instance['phone'] = $new_instance['phone'];
        $instance['email_title'] = $new_instance['email_title'];
        $instance['email'] = $new_instance['email'];
        $instance['hours_title'] = $new_instance['hours_title'];
        $instance['hours'] = $new_instance['hours'];
       
        return $instance;
    }

}


function car_repair_service_smart_contact_list_widget() {
    register_widget( 'SmartContactList' );
}
add_action( 'widgets_init', 'car_repair_service_smart_contact_list_widget' );
