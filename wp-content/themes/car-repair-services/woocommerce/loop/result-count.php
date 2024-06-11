<?php
/**
 * Result Count
 *
 * Shows text: Showing x - x of x results.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/result-count.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$car_repair_services = car_repair_services_options();
$theme               = isset( $car_repair_services['theme_setting'] ) && $car_repair_services['theme_setting'] == '1';

if ( $theme != '1' ) {
	?>
<!--  only change p tag to span tag  -->
<div class="filters-row-left">
	<span class="show-result">
	<?php

	if ( 1 === $total ) {
		_e( 'Showing the single result', 'car-repair-services' );
	} elseif ( $total <= $per_page || -1 === $per_page ) {
		/* translators: %d: total results */
		printf( _n( 'Showing all %d result', 'Showing all %d results', $total, 'car-repair-services' ), $total );
	} else {
		$first = ( $per_page * $current ) - $per_page + 1;
		$last  = min( $total, $per_page * $current );
		/* translators: 1: first result 2: last result 3: total results */
		printf( _nx( 'Showing the single result', 'Showing %1$d&ndash;%2$d of %3$d results', $total, 'with first and last result', 'car-repair-services' ), $first, $last, $total );
	}
	?>
	</span>
</div>
	<?php
} else {
	?>
	<!--  only change p tag to span tag  -->
	<span class="show-result">
	<?php

	if ( 1 === $total ) {
		_e( 'Showing the single result', 'car-repair-services' );
	} elseif ( $total <= $per_page || -1 === $per_page ) {
		/* translators: %d: total results */
		printf( _n( 'Showing all %d result', 'Showing all %d results', $total, 'car-repair-services' ), $total );
	} else {
		$first = ( $per_page * $current ) - $per_page + 1;
		$last  = min( $total, $per_page * $current );
		/* translators: 1: first result 2: last result 3: total results */
		printf( _nx( 'Showing the single result', 'Showing %1$d&ndash;%2$d of %3$d results', $total, 'with first and last result', 'car-repair-services' ), $first, $last, $total );
	}
	?>
	</span>
	<?php
}
