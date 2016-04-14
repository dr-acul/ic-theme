<?php get_header(); ?>
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
		<div class="ic_portfolio_row">
		<?php
		global $post;
		foreach ( $portfolio_posts as $post) : setup_postdata($post); ?>
			<div class="ic_portfolio_col">
				<h1><?php the_title(); ?></h1>
				<p><?php the_content(); ?></p>
			</div><!-- .ic_portfolio_col -->
		<?php endforeach; ?>
		</div><!-- .ic_portfolio_row -->
		<?php
	} else {
		while (have_posts() ) : the_post();
			the_content();
		endwhile;
	}
	wp_link_pages();
	get_sidebar();
	wp_footer();
?>
</section>