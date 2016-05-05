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
<main>
	<div id="ict-main">
		<div id="ict-main-content">
			<?php if ( is_front_page() ) : ?>
			<div id="ict_slider_wrapper">
				<?php if ( function_exists( 'start_ic_slider' ) ) { start_ic_slider(); } ?>
			</div><!-- #ict_slider_wrapper -->
			<?php 
			$portfolio_posts = array(
				get_post( get_theme_mod( 'portfolio_selection_0') ),
				get_post( get_theme_mod( 'portfolio_selection_1') ),
				get_post( get_theme_mod( 'portfolio_selection_2') ),
			); ?>
			<?php if ( !empty( $portfolio_posts[0] ) | !empty( $portfolio_posts[1] ) | !empty( $portfolio_posts[2] ) ) : ?>
			<div class="ict-portfolio-row">
			<?php global $post, $more; ?>
			<?php foreach ($portfolio_posts as $post) : setup_postdata($post) ?>
				<div class="portfolio-column" >
					<article>
						<header>
							<div class="ict-portfolio-header">
								<a class="ict-post-thumnail-link" href="<?php echo '#portfolio-page-' . get_the_ID(); ?>"><?php the_post_thumbnail( 'portfolio_thumbnail' ); ?></a>
								<a class="ict-portfolio-page-link" href="<?php echo '#portfolio-page-' .get_the_ID(); ?>"><?php the_title('<h2 class="ict-portfolio-title">','</h2>'); ?></a>
							</div><!-- .ict-portfolio-header -->
						</header>
						<?php // TODO: no need for this element, use a template part? ?>
						<section class="ict-portfolio-section">
							<?php the_content(); ?>
						</section><!-- .ict-portfolio-section -->
					</article>
				</div> <!-- .portfolio-column -->
			<?php endforeach; // horizontal portfolio ?>
			</div><!-- .ict-portfolio-row -->
			<?php foreach( $portfolio_posts as $post ) : setup_postdata($post) ?>
			<?php $more = 1; // show full post this itme, strip teaser ?>
			<article>
				<div id="ict-portfolio-page">
					<header>
						<div class="ict-portfolio-page-header">
							<span id="<?php echo 'portfolio-page-' . get_the_ID(); ?>" class="anchor"></span>
							<?php the_title('<h1>', '</h1>'); ?>
						</div><!-- .ict-portfolio-page-header -->
					</header>
					<div class="ict-portfolio-page-content">
						<?php the_content('', true, ''); ?>
					</div><!-- .ict-portfolio-page-content -->
				</div><!-- #ict-portfolio-page -->
			</article>
			<?php endforeach; // vertical portfolio ?>
			<?php endif; // portfolio_posts[] ?>
			<?php endif; // is_front_page() ?>
		</div><!-- ict-main-content -->
	</div><!-- #ict-main -->
</main>
<?php get_footer();