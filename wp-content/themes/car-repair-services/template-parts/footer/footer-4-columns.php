<div class="row">
	<div class="container">
		<?php if ( is_active_sidebar( 'footer_col_1' ) ) { ?>
		<div class="col-sm-3 col-md-3"><?php dynamic_sidebar( 'footer_col_1' ); ?></div>
		<?php } ?>
		<?php if ( is_active_sidebar( 'footer_col_2' ) ) { ?>
		<div class="col-sm-3 col-md-3"><?php dynamic_sidebar( 'footer_col_2' ); ?></div>
		<?php } ?>
		<?php if ( is_active_sidebar( 'footer_col_3' ) ) { ?>
		<div class="col-sm-3 col-md-3"><?php dynamic_sidebar( 'footer_col_3' ); ?></div>
		<?php } ?>
		<?php if ( is_active_sidebar( 'footer_col_4' ) ) { ?>
		<div class="col-sm-3 col-md-3"><?php dynamic_sidebar( 'footer_col_4' ); ?></div>
		<?php } ?>
	</div>
</div>
