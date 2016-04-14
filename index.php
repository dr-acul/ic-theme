<?php get_header(); ?>
<section>
<?php
	if ( is_front_page() && is_home() ) {
		if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow(); }
		
		$cat_id = get_cat_ID ( 'Portfolio ' );
		$args = array ( 'category' => $cat_id, 'posts_per_page' => 3, 'order' => ASC);
		$myposts = get_posts( $args ); ?>
		<div id="ic_portfolio">
		<?php foreach ( $myposts as $post) : setup_postdata($post); ?>
			<div class="ic_portfolio">
				<h1><?php the_title(); ?></h1>
				<p><?php the_content(); ?></p>
			</div><!-- .ic_portfolio -->
		<?php endforeach; ?>
		</div><!-- #ic_portfolio -->
		<?php
	} else {
		while (have_posts() ) : the_post();
			the_content();
		endwhile;
	}
?>
		<?php wp_link_pages(); ?>
		<?php get_sidebar(); ?>
<?php wp_footer(); ?>
</section>
</body>
</html>