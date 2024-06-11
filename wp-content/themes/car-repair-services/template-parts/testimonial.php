<?php
$style              = $post->style;
$post_id            = get_the_ID();
$client_name        = get_post_meta( get_the_ID(), 'framework-client-name', true );
$client_designation = get_post_meta( get_the_ID(), 'framework-client-designation', true );
$attachement        = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'car-repair-services-testimonial' );
$attachement1       = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'car-repair-services-testimonial-grid' );
?>


<?php

$car_repair_services = car_repair_services_options();
$theme               = isset( $car_repair_services['theme_setting'] ) && $car_repair_services['theme_setting'] == '1';

if ( $theme != '1' ) {
	?>

<div class="col-item">
	<div class="testimonial-item">
		<div class="testimonial-item__content">
	<?php the_content(); ?>
		</div>
		<div class="testimonial-item__footer">
			<div class="testimonial__img"><img src="<?php echo esc_url( $attachement1[0] ); ?>" alt="<?php esc_attr_e( 'testimonial', 'car-repair-services' ); ?>"></div>
			<div class="testimonial__description">
				<?php echo esc_html( $client_name ); ?>
				<span><?php echo esc_html( $client_designation ); ?></span>
			</div>
		</div>
	</div>
</div>

	<?php
} else {
	?>
	<?php if ( $style ) { ?>
		<div class="testimonial-card">
			<input type="hidden" value="<?php echo get_the_ID(); ?> "/>
			<div class="testimonial-card-title">
				<h5>
		<?php
		if ( $client_name != '' ) {
			echo esc_html( $client_name );
		}
		?>
					</h5></div>
			<div class="testimonial-card-text"> <?php echo the_content(); ?> </div>
			<div class="testimonial-card-rating">
				<div class="rating rating-<?php echo esc_html( $client_ratting ); ?>"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></div>
			</div>
		</div>
	<?php } else { ?>
		<div class="testimonials-item <?php echo esc_attr( $extra_class ); ?> <?php
		if ( $i == 1 ) :
			?>
testimonials-item--dark<?php endif; ?>">
			<div class="inside">
				<div class="meta"><span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star off"></i><i class="icon-star"></i></span><span class="username">
		<?php
		if ( $client_name != '' ) {
			echo esc_html( $client_name );
		}
		?>
						</span></div>
				<div class="text">  <?php echo the_content(); ?></div>
			</div>
			<div class="bg-image" 
		<?php
		if ( $attachement != array() ) {
			?>
				  style="background-image: url(<?php echo esc_url( $attachement[0] ); ?>);" 
														  <?php
		}
		?>
		>
			</div>
		</div>
		<?php
	}
}
