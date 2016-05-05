<?php
/**
 * increare single layout
 * 
 * @package incrare
 * @subpackage increare theme
 * @since increare 0.01
 * 
 */
?>
<?php get_header(); ?>
<main>
	<div id="ict-main">
		<?php if ( !is_singular() ) :?>
		<header>
			<div class="ict-content-header">
				<h1>Aktuelle Posts</h1>
			</div>
		</header>
		<?php endif; //is_singular() ?>
		<div id="ict-content-wrapper">
			<div id="ict-content">
				<?php while (have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'post' ); ?>
				<?php endwhile; ?>
			</div><!-- #ict-main-content -->
			<?php if ( is_active_sidebar( SIDEBAR_IDS[0] ) ): ?>
			<div id="ict-sidebar">
				<?php get_sidebar(); ?>
			</div><!-- #ict-sidebar -->
			<?php endif; // is_active_sidebar ?>
		</div><!-- #ict-content-wrapper -->
	</div><!-- #ict-main -->
</main>
<?php get_footer();