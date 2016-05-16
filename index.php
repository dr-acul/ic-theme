<?php
/**
 * increare index page layout
 * 
 * @package incrare
 * @subpackage increare theme
 * @since increare 0.01
 * 
 */
get_header(); ?>
<main>
	<div id="ict-main">
		<div id="ict-content-wrapper">
			<div id="ict-content">
			<?php while (have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; ?>
			</div><!-- #ict-content -->
			<?php if ( is_active_sidebar( SIDEBAR_IDS[0] ) ): ?>
			<div id="ict-sidebar">
				<?php get_sidebar(); ?>
			</div><!-- #ict-sidebar -->
			<?php endif; ?>
		</div><!-- #ict-content-wrapper -->
	</div><!-- #ict-main -->
</main>
<?php get_footer();