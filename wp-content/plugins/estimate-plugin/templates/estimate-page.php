<?php
get_header();
$page_name = service_estimate_options('rslt_page_name');


if (!empty($_GET['make']) && !empty($_GET['model']) && !empty($_GET['the_year'])) {

	$termsmake = get_terms(
		[
			'taxonomy'   => 'make-brand',
			'number'     => 9,
			'include'    => $_GET['make'],
			'hide_empty' => false,
		]
	);
	$termsmdel = get_terms(
		[
			'taxonomy'   => 'model-car',
			'number'     => 9,
			'include'    => $_GET['model'],
			'hide_empty' => false,
		]
	);
	$termsyear = get_terms(
		[
			'taxonomy'   => 'model-year',
			'number'     => 9,
			'include'    => $_GET['the_year'],
			'hide_empty' => false,
		]
	);
}
?>

<div id="pageTitle">
	<div class="container">
		<div class="breadcrumbs">
			<ul class="breadcrumb estimate-breadcrumb">
				<li><a href="<?php echo home_url(); ?>"><?php esc_html_e('Home', 'estimate-plugin'); ?></a></li>
				<li><?php esc_html_e('Your Repair Estimate', 'estimate-plugin'); ?></li>
			</ul>
		</div>
	</div>
</div>
<div id="pageContent" class="content-area">
	<?php if (isset($page_name)) { ?>
		<h1 class="text-center h-lg"><?php echo $page_name; ?></h1>
	<?php } ?>
	<div class="block">
		<div class="container">
			<div class="divider-md"></div>
			<?php if (!empty($termsyear[0]) && !empty($termsmake[0]) && !empty($termsmdel[0])) { ?>
				<h5 class="estimate-current-name"><b><?php echo $termsyear[0]->name . ' ' . $termsmake[0]->name . ' ' . $termsmdel[0]->name; ?></h5>
			<?php } ?>
			<a href="javascript:history.go(-1)" class="estimate-current-change"><?php esc_html_e('Change Selection', 'estimate-plugin'); ?></a>
			<div class="divider-md"></div>
			<div class="row">

				<?php
				$serviceestimatekey = isset($_GET['serviceestimatekey']) ? sanitize_text_field($_GET['serviceestimatekey']) : '';



				if (!empty($_GET['serviceestimate'])) {
					$paged = (get_query_var('estimateresult')) ? get_query_var('estimateresult') : 1;
					$argsservice = array(
						'post__in'  => $_GET['serviceestimate'], // ID of a page, post, or custom type
						'post_type' => 'service-estimate',
					);
					showPosts($argsservice);
				}
				//elseif ( ! empty( $_GET['serviceestimatekey'] ) && !isHTML($_GET['serviceestimatekey']) ) {
				elseif (!empty($serviceestimatekey)) {

					$paged = (get_query_var('estimateresult')) ? get_query_var('estimateresult') : 1;
					$argsservice = array(
						's'         => $serviceestimatekey,
						'post_type' => 'service-estimate',
					);

					showPosts($argsservice);
				}
				if (empty($_GET['serviceestimate']) && empty($serviceestimatekey)) {
					showPosts("");
				}
				?>
				<div class="col-md-4">
					<h5><?php esc_html_e('Contact information', 'estimate-plugin'); ?></h5>
					<?php echo do_shortcode('[service_estimate_contact_form]'); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

function showPosts($args)
{
	$partsname       = [];
	$priceminglobal  = [];
	$pricemaxglobal  = [];
	$labMinGlobal    = [];
	$labMaxGlobal    = [];
	$loop			 = "";
	$est_price_range = service_estimate_options('est_price_range', true);
	if (is_array($args)) {
		$loop            = new WP_Query($args);
		if ($loop->have_posts()) {
			while ($loop->have_posts()) :
				$loop->the_post();
				$metaparts      = service_estimate_meta('parts_service');
				$labMinGlobal[] = service_estimate_meta('labour_min_price');
				$labMaxGlobal[] = service_estimate_meta('labour_max_price');
				if (!empty($metaparts)) {
					$partArray = explode(',', $metaparts);
					$series = get_terms(
						array(
							'taxonomy'   => 'service-part',
							'number'     => 9,
							'include'    => $partArray,
							'hide_empty' => false,
						)
					);
					$keycount = 0;
					foreach ($series as $termid) {
						$keyid = get_the_ID();
						$key   = $keyid . '_' . $keycount;
						$partsname[$key] = $termid->name;
						$priceminglobal[] = rwmb_meta('min_price', array('object_type' => 'term'), $termid->term_id);
						$pricemaxglobal[] = rwmb_meta('max_price', array('object_type' => 'term'), $termid->term_id);
						$keycount++;
					}
				}
			endwhile;
		}
	}

?>


	<div class="col-md-8">
		<div class="estimate-table">
			<div class="estimate-table-total">
				<div class="estimate-table-total-title"><?php esc_html_e('Total for selected services', 'estimate-plugin'); ?></div>
				<div class="estimate-table-total-text"><?php esc_html_e('Estimated price range', 'estimate-plugin'); ?></div>
				<div class="estimate-table-total-price">

					<?php
					estimate_price_before();
					?>

					<span id="globmin">
						<?php
						$summinglobal    = array_sum($priceminglobal);
						$sumLabMinGlobal = array_sum($labMinGlobal);
						$totMinGlobal    = $summinglobal + $sumLabMinGlobal;
						echo $totMinGlobal;
						?>
					</span>
					<?php
					estimate_price_after();
					?>
					<?php if ($est_price_range) { ?>
						-

						<?php
						estimate_price_before();
						?>
						<span id="globmax">
							<?php
							$summaxglobal    = array_sum($pricemaxglobal);
							$sumLabMaxGlobal = array_sum($labMaxGlobal);
							$totMaxGlobal    = $summaxglobal + $sumLabMaxGlobal;
							echo $totMaxGlobal;
							?>
						</span>
						<?php
						estimate_price_after();
						?>
					<?php } ?>
				</div>
			</div>
			<div class="estimate-table-info">
				<div class="estimate-table-info-title">
					<?php esc_html_e('Estimate includes the price of the following parts:', 'estimate-plugin'); ?>
				</div>
				<div class="estimate-table-info-list">
					<?php
					$partsname = array_unique($partsname);

					if (!empty($partsname)) {
						foreach ($partsname as $key => $value) {
							$classArr = explode('_', $key, 2);
							$class    = $classArr[0];
					?>
							<div id="<?php echo 'class' . $class; ?>"><span class="round-icon">i</span><?php echo $value; ?></div>
						<?php
						}
					} else {
						?>
						<div><span class="round-icon">i</span><?php esc_html_e('No Parts Available', 'estimate-plugin'); ?></div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php

		if (is_object($loop) && $loop->have_posts()) {
			//if ($loop->have_posts()) {
			while ($loop->have_posts()) :
				$loop->the_post();
		?>
			<?php
				do_action('estimate_service_loop');
			endwhile;
			//}
		} else {
			?>
			<div class="estimate-part">
				<div class="estimate-empty">
					<?php if (isset($_GET['serviceestimatekey'])) { ?>
						<h4 class="estimate-part-info-title"><?php echo 'No Service found named "' . esc_attr($_GET['serviceestimatekey']) . '"'; ?></h4>
					<?php } ?>
					<?php if (isset($_GET['serviceestimate'])) { ?>
						<h4 class="estimate-part-info-title"><?php echo 'No Service found named "' . esc_attr($_GET['serviceestimate'][0]) . '"'; ?></h4>
					<?php } ?>

				</div>
			</div>

		<?php
		}
		?>
	</div>


<?php
}
get_footer();
die();
