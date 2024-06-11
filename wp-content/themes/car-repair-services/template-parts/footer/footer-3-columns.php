<div class="row">
	<div class="container">
	<?php if ( is_active_sidebar( 'footer_col_1' ) ) { ?>
		<div class="col-sm-4 col-md-4"><?php dynamic_sidebar( 'footer_col_1' ); ?></div>
	<?php } ?>
	<?php if ( is_active_sidebar( 'footer_col_2' ) ) { ?>
		<div class="col-sm-4 col-md-4"><?php dynamic_sidebar( 'footer_col_2' ); ?></div>
	<?php } ?>
	<?php if ( is_active_sidebar( 'footer_col_3' ) ) { ?>
		<div class="col-sm-4 col-md-4"><?php dynamic_sidebar( 'footer_col_3' ); ?></div>
	<?php } ?>
	</div>
</div>
