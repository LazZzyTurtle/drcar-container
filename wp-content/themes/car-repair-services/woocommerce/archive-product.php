<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     3.4.0
 */

defined( 'ABSPATH' ) || exit;

$car_repair_services = car_repair_services_options();
$theme = isset($car_repair_services['theme_setting']) && $car_repair_services['theme_setting'] == '1';
get_header( 'shop' );

if($theme != '1'){
?>

<div id="pageTitle">
	<div class="container">
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
		<?php endif; ?>
        <div class="breadcrumbs">
            <div class="breadcrumb">
			<?php
				/**
				 * Hook: woocommerce_before_main_content.
				 *
				 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				 * @hooked woocommerce_breadcrumb - 20
				 * @hooked WC_Structured_Data::generate_website_data() - 30
				 */
				do_action( 'woocommerce_before_main_content' );
			?>
            </div>
        </div>
		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>
	</div>
</div>

    <div id="pageContent">
		<div class="container">
		    <div class="row">
			    <div class="col-md-8 col-lg-9 column-center col-md-push-4 col-lg-push-3">
					<?php if ( woocommerce_product_loop() ) : ?>
				        <div class="filters-row">					
							<?php
								/**
								 * woocommerce_before_shop_loop hook.
								 *
								 * @hooked wc_print_notices - 10
								 * @hooked woocommerce_result_count - 20
								 * @hooked woocommerce_catalog_ordering - 30
								 */
								do_action( 'woocommerce_before_shop_loop' );
							?>
				        </div>
						<?php woocommerce_product_loop_start(); ?>
						<?php	if ( wc_get_loop_prop( 'total' ) ) { ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php
									/**
									 * woocommerce_shop_loop hook.
									 *
									 * @hooked WC_Structured_Data::generate_product_data() - 10
									 */
									do_action( 'woocommerce_shop_loop' );
								?>
								<?php wc_get_template_part( 'content', 'product' ); ?>
							<?php endwhile; // end of the loop. ?>
						<?php } ?>
						<?php woocommerce_product_loop_end(); ?>
						<div class="clearfix"></div>
						<?php
							/**
							 * woocommerce_after_shop_loop hook.
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action( 'woocommerce_after_shop_loop' );
						?>
					<?php else: ?>
						<?php
							/**
							 * woocommerce_no_products_found hook.
							 *
							 * @hooked wc_no_products_found - 10
							 */
							do_action( 'woocommerce_no_products_found' );
						?>
					<?php endif; ?>
					<?php
						/**
						 * woocommerce_after_main_content hook.
						 *
						 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
						 */
						do_action( 'woocommerce_after_main_content' );
					?>
				 </div>
				 <div class="col-md-4 col-lg-3 column-left column-filters col-md-pull-8 col-lg-pull-9">
				    <div class="column-filters-inside">
				    <?php
						/**
						 * woocommerce_sidebar hook.
						 *
						 * @hooked woocommerce_get_sidebar - 10
						 */
						do_action( 'woocommerce_sidebar' );
					?>
					</div>
				</div>
		    </div>
	    </div>
    </div>
	
<?php
}else{ 
	?>
   
   <div id="pageTitle">
	   <div id="container" class="container">
	   <?php
		   /**
			* Hook: woocommerce_before_main_content.
			*
			* @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			* @hooked woocommerce_breadcrumb - 20
			* @hooked WC_Structured_Data::generate_website_data() - 30
			*/
		   do_action( 'woocommerce_before_main_content' );
	   ?>
	   </div>
   
	   <?php if( isset($car_repair_services_opt['bt_type']) && $car_repair_services_opt['bt_type'] == '1' ){ ?>
	   <header class="entry-header">
   
		   <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
   
			   <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
   
		   <?php endif; ?>
   
		   <?php
			   /**
				* woocommerce_archive_description hook.
				*
				* @hooked woocommerce_taxonomy_archive_description - 10
				* @hooked woocommerce_product_archive_description - 10
				*/
			   do_action( 'woocommerce_archive_description' );
		   ?>
   
	   </header>
	   <?php } ?>
   </div>
   
	   <div id="pageContent">
	   <?php if( isset($car_repair_services_opt['bt_type']) && $car_repair_services_opt['bt_type'] == '2' ){ ?>
	   <header class="entry-header">
   
			   <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
   
				   <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
   
			   <?php endif; ?>
   
			   <?php
				   /**
					* woocommerce_archive_description hook.
					*
					* @hooked woocommerce_taxonomy_archive_description - 10
					* @hooked woocommerce_product_archive_description - 10
					*/
				   do_action( 'woocommerce_archive_description' );
			   ?>
   
	   </header>
		   <?php } ?>
		   <div class="container">
			   <div class="row">
				   <div class="col-md-4 col-lg-3 column-left column-filters">
					   <div class="column-filters-inside sidebar-div">
					   
					   <?php
						   /**
							* woocommerce_sidebar hook.
							*
							* @hooked woocommerce_get_sidebar - 10
							*/
						   do_action( 'woocommerce_sidebar' );
					   ?>
					   </div>
				   </div>
				   <div class="col-md-8 col-lg-9 column-center">
				  
					   <?php if ( woocommerce_product_loop() ) : ?>
						   <div class="filters-row">
							   <div class="filters-row-left">						
							   <?php
								   /**
									* woocommerce_before_shop_loop hook.
									*
									* @hooked wc_print_notices - 10
									* @hooked woocommerce_result_count - 20
									* @hooked woocommerce_catalog_ordering - 30
									*/
								   do_action( 'woocommerce_before_shop_loop' );
							   ?>
							   </div>
   
							   <div class="filters-row-right">
							   <?php  do_action( 'woocommerce_after_shop_loop',true ); ?>
							   </div>
							  
						   </div>
   
						   <?php woocommerce_product_loop_start(); ?>
						   <?php	if ( wc_get_loop_prop( 'total' ) ) { ?>
   
							   <?php while ( have_posts() ) : the_post(); ?>
   
								   <?php
									   /**
										* woocommerce_shop_loop hook.
										*
										* @hooked WC_Structured_Data::generate_product_data() - 10
										*/
									   do_action( 'woocommerce_shop_loop' );
								   ?>
   
								   <?php wc_get_template_part( 'content', 'product' ); ?>
   
							   <?php endwhile; // end of the loop. ?>
   
						   <?php } ?>
   
						   <?php woocommerce_product_loop_end(); ?>
   
						   
   
						   <?php
							   /**
								* woocommerce_after_shop_loop hook.
								*
								* @hooked woocommerce_pagination - 10
								*/
							   do_action( 'woocommerce_after_shop_loop' );
						   ?>
   
					   <?php else: ?>
   
						   <?php
							   /**
								* woocommerce_no_products_found hook.
								*
								* @hooked wc_no_products_found - 10
								*/
							   do_action( 'woocommerce_no_products_found' );
						   ?>
   
					   <?php endif; ?>
   
   
   
   
					   <?php
						   /**
							* woocommerce_after_main_content hook.
							*
							* @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
							*/
						   do_action( 'woocommerce_after_main_content' );
					   ?>
					</div>
				  
			  
			   </div>
		   </div>
	   </div>
	   
   <?php
   
}

get_footer( 'shop' ); 