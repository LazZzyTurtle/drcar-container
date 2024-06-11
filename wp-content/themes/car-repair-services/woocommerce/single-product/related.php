<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$car_repair_services = car_repair_services_options();
$theme = isset($car_repair_services['theme_setting']) && $car_repair_services['theme_setting'] == '1';
if($theme != '1'){
if ( $related_products ) : ?>

	<section class="related products">

		<div class="block-title">
			<h6 class="block-title__title"><?php echo wp_kses_post( 'Related Products', 'car-repair-services' ); ?></h6>
			<div class="title-separator"></div>
		</div>

		<div class="prd-grid prd-carousel">

			<?php foreach ( $related_products as $related_product ) : ?>

				<?php
				 	$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product' ); ?>

			<?php endforeach; ?>

		</div>

	</section>

<?php endif;
}else{ 

	if ( $related_products ) : ?>

		<section class="related products">
			<?php
			$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Similar <span class="color">Products</span>', 'car-repair-services' ) );
	
			if ( $heading ) :
				?>
				<h2 class="h-lg text-center"><?php echo wp_kses_post( $heading ); ?></h2>
			<?php endif; ?>
	
			<div class="prd-grid prd-carousel">
	
				<?php foreach ( $related_products as $related_product ) : ?>
	
					<?php
						 $post_object = get_post( $related_product->get_id() );
	
						setup_postdata( $GLOBALS['post'] =& $post_object );
	
						wc_get_template_part( 'content', 'product' ); ?>
	
				<?php endforeach; ?>
	
			</div>
	
		</section>
	
	<?php endif;
}
wp_reset_postdata();
