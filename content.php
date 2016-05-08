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
<article>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="ict-content-header">
		<?php if ( is_singular() ) :
			echo '<h1 class="entry-title">' . single_post_title( '', false ) . '</h1>';
			printf( __( '<p class="post-meta">%s <b>||</b> <span class="publishdate">%s</span></p>', 'increaretd' ),
				get_the_author_posts_link(),
				get_the_date() );
		else :
			printf( __( '<a href="%s">%s</a>', 'increaretd' ),
					get_the_permalink(),
					the_title( '<h2 class="entry-title">','</h2>', false ) );
			printf( __( '<p class="post-meta">%s <b>||</b> <span class="publishdate">%s</span></p>', 'increaretd' ),
					get_the_author_posts_link(),
					get_the_date() );
		endif; ?>
		</header>
		<?php if ( has_post_thumbnail() ) : ?>
			<a class="ict-post-thumbnail-link" href="<?php echo get_the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		<?php endif; ?>
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
	</div><!-- #post-## -->
</article>