<div class="row">
	<div class="container">
	<?php if ( is_active_sidebar( 'footer_col_1' ) ) { ?>
		<div class="col-sm-6 col-md-6"><?php dynamic_sidebar( 'footer_col_1' ); ?></div>
	<?php } ?>
	<?php if ( is_active_sidebar( 'footer_col_2' ) ) { ?>
		<div class="col-sm-6 col-md-6"><?php dynamic_sidebar( 'footer_col_2' ); ?></div>
	<?php } ?>
	</div>
</div>
