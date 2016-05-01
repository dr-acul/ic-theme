<?php
/**
 * IN|creare page layout
 * 
 * @package increare
 * @subpackage increare-template
 * @since increare 0.01
 * 
 */
?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<main>
		<?php while ( have_posts() ) : the_post(); ?>
		<article>
			<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header>
				<?php the_title( '<h1 class="page-title">', '</h1>'	); ?>
			</header>
				<?php the_content(); ?>
			</div><!-- #page-## -->
		</article>
<?php
endwhile;
?>
	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php
/*
	wp_link_pages();

	get_sidebar();
*/
?>
<?php get_footer(); ?>