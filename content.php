<?php
/**
 * IN|creare normal blog layout
 * 
 * @package increare
 * @subpackage increare-template
 * @since increare 0.01
 * 
 */
?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<?php if ( has_post_thumbnail() ) : ?>
				<a class="ict-post-thumnail-link" href="<?php echo get_the_permalink(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
			<?php endif; ?>
			<?php the_category(); ?>
			<a href="<?php echo get_the_permalink(); ?>">
				<?php the_title( '<h2 class="page-title">', '</h2>'	); ?>
			</a>
			<span class="publishdate">
				<?php printf( __( 'Veröffentlicht am: %s von %s', 'increaretd' ),
						get_the_date(),
						get_the_author_posts_link()); ?>
			</span>
		</header>
			<?php the_content(); ?>
	</div><!-- #page-## -->