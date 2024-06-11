
<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); 

$car_repair_services = car_repair_services_options();

$theme = isset($car_repair_services['theme_setting']) && $car_repair_services['theme_setting'] == '1';

if($theme != '1'){
?>
<div class="side-search">
	<form class="form-default" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="form-group">
			<input type="search" id="<?php echo esc_attr($unique_id); ?>" class="form-control" 
    placeholder="<?php esc_attr_e( 'Search &hellip;','car-repair-services' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
			<button type="submit" class="btn-custom"><i class="icon icon-search"></i></button>
		</div>
	</form>
</div>
<?php 
}else{?>
	<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="search" id="<?php echo esc_attr($unique_id); ?>" class="search-field" 
		placeholder="<?php esc_attr_e( 'Search &hellip;','car-repair-services' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		<button type="submit" class="button"><i class="icon icon-search"></i></button>
	</form>
<?php
}