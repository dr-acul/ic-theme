<?php
/**
 * increare font-page layout
 * 
 * @package increare
 * @subpackage increare-theme
 * @since increare 0.01
 * 
 */
 ?>
 <?php get_header(); ?>
<div id="primary" class="content-area">
	<main>
<?php
	if ( is_front_page() ) {
		?><div id="ict_slider_wrapper"><?php
		if ( function_exists( 'start_ic_slider' ) ) { start_ic_slider(); }
		?></div><!-- #ict_slider_wrapper --><?php
		$portfolio_posts = array(
				get_post( get_theme_mod( 'portfolio_selection_0') ),
				get_post( get_theme_mod( 'portfolio_selection_1') ),
				get_post( get_theme_mod( 'portfolio_selection_2') ),
		);
/* TODO: implement multi-row portfolio -> 0.04 */ 

		if ( !empty( $portfolio_posts[0] ) | 
			 !empty( $portfolio_posts[1] ) |
			 !empty( $portfolio_posts[2] ) ) {
?>
		<div class="ict-portfolio-row">
		<?php
		global $post;
		foreach ( $portfolio_posts as $post) : setup_postdata($post); ?>
				<div id="<?php the_ID(); ?>" <?php post_class( 'portfolio-column' ); ?>>
					<article>
						<header class="ict-portfolio-header">
							<?php the_post_thumbnail( 'portfolio_thumbnail' ); ?>
							<?php the_title('<h2 class="ict-portfolio-title">','</h2>'); ?>
						</header>
						<section class="ict-portfolio-section">
							<?php the_content(); ?>
						</section>
					</article>
				</div>
		<?php endforeach; ?>
		</div><!-- .ict-portfolio-row -->
		<?php
	}	
}
?>
	</main>
</div><!-- .content-area -->
<?php
/*
	wp_link_pages();

	get_sidebar();
*/
get_footer();