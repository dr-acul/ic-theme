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
		<?php for ($i=0; $i<3; $i++) : ?>
		<?php if (is_active_sidebar( WIDGET_IDS[$i] )) : ?>
			<div id="<?php echo WIDGET_IDS[$i]; ?>">
				<?php dynamic_sidebar( WIDGET_IDS[$i] ); ?>
			</div><!-- #<?php echo WIDGET_IDS[$i]; ?>-->
		<?php endif; ?>
<?php endfor; ?>
		</div><!-- #footer -->
</footer>
	<?php wp_footer(); ?>
</body>
</html>