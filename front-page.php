<?php

/**
 * increare font-page layout
 * 
 * @package WordPress
 * @subpackage increare
 * @since increare 0.01
 * 
 */
 
get_header(); ?>

<section>
	
<?php
	if ( is_front_page() ) {
		if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow(); }
		
		$portfolio_posts = array(
				get_post( get_theme_mod( 'portfolio_selection_0') ),
				get_post( get_theme_mod( 'portfolio_selection_1') ),
				get_post( get_theme_mod( 'portfolio_selection_2') ),
		);
		?>
		<div class="ic_portfolio_row clearfix">
		<?php
		global $post;
		foreach ( $portfolio_posts as $post) : setup_postdata($post); ?>
			<div class="ic_portfolio_col">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</div><!-- .ic_portfolio_col -->
		<?php endforeach; ?>
		reset_post_data();
		</div><!-- .ic_portfolio_row -->
		<?php
	} else {
		while (have_posts() ) : the_post();
			the_content();
		endwhile;
	}
?>
</section>
<?php
/*
	wp_link_pages();

	get_sidebar();
*/
get_footer();
