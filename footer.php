<?php
/**
 * increare footer layout
 * 
 * @package WordPress
 * @subpackage increare
 * @since increare 0.0.1
 */?>
 <footer>
	 <div id="footer">
	<?php if (is_active_sidebar( SIDEBAR_IDS[1] ) ) : ?>
	 <div id="<?php echo SIDEBAR_IDS[1]; ?>">
		 <?php dynamic_sidebar( SIDEBAR_IDS[1] ); ?>
	</div><!-- #<?php echo SIDEBAR_IDS[1]; ?>-->
	<?php endif; ?>
	</div><!-- #footer -->
</footer>
	<?php wp_footer(); ?>
</body>
</html>