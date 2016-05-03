<?php
/**
 * increare index page layout
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
		<div id="ict-content">
			<header>
				<div class="ict-content-header">
					<h1>Aktuelle Posts:</h1>
				</div>
			</header>
			<?php while (have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
		</div><!-- #ict-content -->
		<?php if ( is_active_sidebar( SIDEBAR_IDS[0] ) ): ?>
		<div id="ict-sidebar">
			<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>
	<?php wp_link_pages(); ?>
	</div><!-- #primary -->
</main><!-- #ict-primary -->
<?php get_footer();