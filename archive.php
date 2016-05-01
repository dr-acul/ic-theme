<?php
/**
 * IN|creare archive layout
 * 
 * @package increare
 * @subpackage increare-theme
 * @since increare 0.01
 * 
 */
get_header(); ?>
<div id="primary" class="content-area">
	<main>
		<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header><!-- .page-header -->
		<?php endif; ?>
		<div class="ict-flex-page">
			<?php while ( have_posts() ) : the_post(); ?>
			<article>
				<?php get_template_part( 'content', get_post_format() ) ?>
			</article>
			<?php endwhile; ?>
		</div>
	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php wp_link_pages(); ?>
<?php //get_sidebar(); ?>
<?php get_footer();