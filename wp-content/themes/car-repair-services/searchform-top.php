<?php
/**
 * The template for displaying search results pages
 *
 *
 * @package Car_Repair_Services
 */

get_header(); ?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>
<div class="search-container">
	<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		
		<input type="search" id="<?php echo esc_attr($unique_id); ?>" placeholder="<?php esc_attr_e( 'Search &hellip;','car-repair-services' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		<button type="submit" class="button"><i class="icon icon-search"></i></button>
		
	</form>
</div>