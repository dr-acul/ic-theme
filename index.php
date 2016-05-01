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
<div id="primary" class="content-area">
	<main>
		<header class="page-header">
			<h1>Aktuelle Posts: </h1>
		</header>
		<div class="ict-flex-page">
		<?php while (have_posts() ) : the_post(); ?>
			<article>
				<?php get_template_part( 'content', get_post_format() ); ?>
			</article>
		<?php endwhile; ?>
		</div> <!-- .ict-flex-page -->
<?php wp_link_pages(); ?>
<?php // get_sidebar(); ?>
	</main>
</div><!-- #primary -->
<?php get_footer();