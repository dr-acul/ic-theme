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
	<main role="main">
	
<?php
	if ( is_front_page() ) {
		if ( function_exists( 'meteor_slideshow' ) ) { $meteor_slideshow = meteor_slideshow(); }
		
		if ( function_exists( 'start_ic_slider' ) ) { start_ic_slider(); }
		
		$portfolio_posts = array(
				get_post( get_theme_mod( 'portfolio_selection_0') ),
				get_post( get_theme_mod( 'portfolio_selection_1') ),
				get_post( get_theme_mod( 'portfolio_selection_2') ),
		);
/* TODO: implement multi-row portfolio -> 0.04 */ 
?>
		<div class="ic_portfolio_row clearfix">
		<?php
		global $post;
		foreach ( $portfolio_posts as $post) : setup_postdata($post); ?>
			<div id="<?php the_ID(); ?>" <?php post_class(); ?>>
				<header>
					<h1 class="post-title"><?php the_title(); ?></h1>
				</header>
				<?php the_content(); ?>
			</div><!-- .ic_portfolio_col -->
		<?php endforeach; ?>
		</div><!-- .ic_portfolio_row -->
		<?php
	}
?>
</section>
	</main>
</div><!-- .content-area -->
<?php
/*
	wp_link_pages();

	get_sidebar();
*/
get_footer();