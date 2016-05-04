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
		global $more;
		foreach ( $portfolio_posts as $post) : setup_postdata($post); ?>
				<div id="<?php the_ID(); ?>" <?php post_class( 'portfolio-column' ); ?>>
					<article>
						<header>
							<div class="ict-portfolio-header">
								<a class="ict-post-thumnail-link" href="<?php echo '#portfolio-page-' . get_the_ID(); ?>">
							<?php the_post_thumbnail( 'portfolio_thumbnail' ); ?>
							<?php the_title('<h2 class="ict-portfolio-title">','</h2>'); ?>
								</a>
							</div>
						</header>
						<section class="ict-portfolio-section">
							<?php the_content(); ?>
						</section>
					</article>
				</div>
		<?php endforeach; ?>
		</div><!-- .ict-portfolio-row -->
		<?php foreach( $portfolio_posts as $post ) : setup_postdata($post); ?>
		<?php $more = 1; //show full post this itme ?>
		<div id="ict-portfolio-page">
			<article>
				<header>
					<div class="ict-portfolio-page-header">
						<span id="<?php echo 'portfolio-page-' . get_the_ID(); ?>" class="anchor"></span>
						<?php the_title('<h1 >', '</h1>'); ?>
					</div><!-- .ict-portfolio-page-header -->
					<div class="ict-portfolio-page-content">
						<?php the_content('', true); ?>
						</div><!-- .image-grid -->
					</div><!-- .ict-portfolio-page-content __>
				</header>
			</article>
		</div><!-- #ict-portfolio-page -->
		<?php endforeach; ?>
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