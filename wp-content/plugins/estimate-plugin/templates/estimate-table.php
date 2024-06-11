<?php
	$metaparts     = service_estimate_meta( 'parts_service' );
	$labmin        = service_estimate_meta( 'labour_min_price' );
  $labmax          = service_estimate_meta( 'labour_max_price' );
  $est_price_range = service_estimate_options( 'est_price_range', true );

if ( ! empty( $metaparts ) ) {
	$partArray = explode( ',', $metaparts );

	$series = get_terms(
		array(
			'taxonomy'   => 'service-part',
			'number'     => 9,
			'include'    => $partArray,
			'hide_empty' => false,
		)
	);



	$partsname = [];

	if ( ! empty( $series ) ) {
		foreach ( $series as $termid ) {
			$partsname[] = $termid->name;
			$pricemin[]  = rwmb_meta( 'min_price', array( 'object_type' => 'term' ), $termid->term_id );
			$pricemax[]  = rwmb_meta( 'max_price', array( 'object_type' => 'term' ), $termid->term_id );
			$summin      = array_sum( $pricemin );
			$summax      = array_sum( $pricemax );

			$totmin = $summin + $labmin;
			$totmax = $summax + $labmax;
		}
	} else {
		$summin = 0;
		$summax = 0;
	}

	$totmin = $summin + $labmin;
	$totmax = $summax + $labmax;
} else {
	$summin = 0;
	$summax = 0;
	$totmin = $labmin;
	$totmax = $labmax;
}
?>
<div class="estimate-part">
	<div class="estimate-part-close"><i class="icon-close-cross"></i></div>
	<div id="divid" class="pidclass" style="display: none;"><?php echo get_the_ID(); ?></div>
	<div class="estimate-part-price">

		<div class="estimate-part-price-price">

			<?php estimate_price_before(); ?><span
				class="totmin"><?php echo $totmin; ?></span><?php estimate_price_after(); ?>

			<?php if ( $est_price_range ) { ?>

			-
				<?php estimate_price_before(); ?><span
				class="totmax"><?php echo $totmax; ?></span><?php estimate_price_after(); ?>
			<?php } ?>
		</div>

		<div>
			<?php echo esc_html__( 'Labor: ', 'estimate-plugin' ); ?>
			<?php estimate_price_before(); ?><?php echo $labmin; ?><?php estimate_price_after(); ?>
			<?php if ( $est_price_range ) { ?>
			-
				<?php estimate_price_before(); ?><?php echo $labmax; ?><?php estimate_price_after(); ?>
			<?php } ?>
			<br> <?php echo esc_html__( 'Parts: ', 'estimate-plugin' ); ?>
			<?php estimate_price_before(); ?><?php echo $summin; ?><?php estimate_price_after(); ?>
			<?php if ( $est_price_range ) { ?>
			-
				<?php estimate_price_before(); ?><?php echo $summax; ?><?php estimate_price_after(); ?>
			<?php } ?>
		</div>
	</div>
	<div class="estimate-part-info">
		<h4 class="estimate-part-info-title"><?php the_title(); ?></h4>
		<?php the_content(); ?>
	</div>
</div>
