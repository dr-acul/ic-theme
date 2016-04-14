<?php

/**
 * increare footer layout
 * 
 * @package WordPress
 * @subpackage increare
 * @since increare 0.0.1
 */
 ?>
 <footer>
 <?php
 	if (	!  is_active_sidebar( 'left_footer_widgets' )
			&& is_active_sidebar( 'middle_footer_widgets' )
			&& is_active_sidebar( 'right_footer_widgets' ) ) {
		return;
	} else 	?>
		<div id="footer" class="clearfix">
			<?php dynamic_sidebar( 'left_footer_widgets' ); ?>
			<?php dynamic_sidebar( 'middle_footer_widgets' ); ?>
			<?php dynamic_sidebar( 'right_footer_widgets' ); ?>
		</div><!-- #footer -->
</footer>
	<?php wp_footer(); ?>
</body>
</html>