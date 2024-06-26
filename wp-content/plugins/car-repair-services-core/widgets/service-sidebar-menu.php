<?php
/**
 * Widget API: WP_Nav_Menu_Widget class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement the Custom Menu widget.
 *
 * @since 3.0.0
 *
 * @see WP_Widget
 */
class WP_Citygovt_Services_Nav_Menu_Widget extends WP_Widget {

	/**
	 * Sets up a new Custom Menu widget instance.
	 *
	 * @since 3.0.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'block-aside__wrapper',
			'description'                 => __( 'Add a car repair services custom menu to your sidebar.' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'service_menu', __( 'Service Menu' ), $widget_ops );
	}

	/**
	 * Outputs the content for the current Custom Menu widget instance.
	 *
	 * @since 3.0.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Custom Menu widget instance.
	 */
	public function widget( $args, $instance ) {
		// Get menu
		$nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

		if ( ! $nav_menu ) {
			return;
		}
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo '<h4 class="block-aside__title">' . $instance['title'] . '</h4>';
		}

		$menu_no = wp_get_nav_menu_items( $nav_menu );

		if ( ! empty( $menu_no ) ) {

			echo '<div class="block-aside__content no-indent"><nav class="nav-aside"><ul>';

			$primaryNav = wp_get_nav_menu_items( $nav_menu ); // Get the array of wp objects, the nav items for our queried location.

			$object_post_id = get_the_ID();

			foreach ( $primaryNav as $navItem ) {

				$post_id = $navItem->object_id;

				$service_icon    = get_post_meta( $post_id, 'framework-service-icon', true );
				$post_object_id  = $navItem->object_id;
				$page_icon_image = get_post_meta( $post_id, 'framework-service-icon-image', true );

				if ( $object_post_id == $post_object_id ) {
					if ( empty( $page_icon_image ) ) {
						echo '<li class="current"><a href="' . $navItem->url . '" title="' . $navItem->title . '"><span class="nav-aside__icon ' . $service_icon . '"></span><span class="nav-aside_text">' . str_replace( '<br>', '', $navItem->title ) . '</span></a></li>';
					} else {
						echo '<li class="current"><a href="' . $navItem->url . '" title="' . $navItem->title . '"><span class="nav-aside__icon">';
						echo wp_get_attachment_image( $page_icon_image );
						echo '</span><span class="nav-aside_text">' . str_replace( '<br>', '', $navItem->title ) . '</span></a></li>';
					}
				} else {
					if ( empty( $page_icon_image ) ) {
						echo '<li><a href="' . $navItem->url . '" title="' . $navItem->title . '"><span class="nav-aside__icon ' . $service_icon . '"></span><span class="nav-aside_text">' . str_replace( '<br>', '', $navItem->title ) . '</span></a></li>';
					} else {
						echo '<li><a href="' . $navItem->url . '" title="' . $navItem->title . '"><span class="nav-aside__icon">';
						echo wp_get_attachment_image( $page_icon_image );
						echo '</span><span class="nav-aside_text">' . str_replace( '<br>', '', $navItem->title ) . '</span></a></li>';
					}
				}
			}

			echo '</ul></nav></div>';

		}
		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {

		$instance = array();
		if ( ! empty( $new_instance['title'] ) ) {
			$instance['title'] = sanitize_text_field( $new_instance['title'] );
		}
		if ( ! empty( $new_instance['nav_menu'] ) ) {
			$instance['nav_menu'] = (int) $new_instance['nav_menu'];
		}

		return $instance;
	}

	public function form( $instance ) {
		global $wp_customize;
		$title    = isset( $instance['title'] ) ? $instance['title'] : '';
		$nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';

		$menus = wp_get_nav_menus();
		// If no menus exists, direct the user to go and create some.
		?>
		<p class="nav-menu-widget-no-menus-message" 
		<?php
		if ( ! empty( $menus ) ) {
			echo ' style="display:none" ';
		}
		?>
		>
			   <?php
				if ( $wp_customize instanceof WP_Customize_Manager ) {
					$url = 'javascript: wp.customize.panel( "nav_menus" ).focus();';
				} else {
					$url = admin_url( 'nav-menus.php' );
				}
				?>
			   <?php echo sprintf( __( 'No menus have been created yet. <a href="%s">Create some</a>.' ), esc_attr( $url ) ); ?>
		</p>
		<div class="nav-menu-widget-form-controls" 
		<?php
		if ( empty( $menus ) ) {
			echo ' style="display:none" ';
		}
		?>
		>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>"/>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'nav_menu' ); ?>"><?php _e( 'Select Menu:' ); ?></label>
				<select id="<?php echo $this->get_field_id( 'nav_menu' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu' ); ?>">
					<option value="0"><?php _e( '&mdash; Select &mdash;' ); ?></option>
					<?php foreach ( $menus as $menu ) : ?>
						<option value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $nav_menu, $menu->term_id ); ?>>
							<?php echo esc_html( $menu->name ); ?>
						</option>
					<?php endforeach; ?>
				</select>
			</p>

	  
			<?php if ( $wp_customize instanceof WP_Customize_Manager ) : ?>
				<p class="edit-selected-nav-menu" style="
				<?php
				if ( ! $nav_menu ) {
					echo 'display: none;';
				}
				?>
				">
					<button type="button" class="button"><?php _e( 'Edit Menu' ); ?></button>
				</p>
			<?php endif; ?>
		</div>
		<?php
	}

}

function wpb_citygovt_services_custom_menu_widget() {
	register_widget( 'WP_Citygovt_Services_Nav_Menu_Widget' );
}

add_action( 'widgets_init', 'wpb_citygovt_services_custom_menu_widget' );
