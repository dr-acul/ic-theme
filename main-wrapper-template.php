<?php /* Just to quick view the main wrapper, exclude from theme on release! */ ?>
<main>
	<div id="ict-main">
		<div id="ict-content">
			<!-- START not on front-page -->
			<header>
				<div id="itc-content-header">
					<h1>Heading</h1>
				</div><!-- #ict-content-header -->
			</header>
			<!-- END not ond front-page -->
			<!-- START The Loop (differs on front-page -->
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<?php if ( has_post_thumbnail() ) : ?>
						<a class="ict-post-thumnail-link" href="<?php echo get_the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
						</a><!-- .ict-post-thumbnail-link -->
						<?php endif; ?>
						<?php the_category(); ?>
						<?php the_permalink(); ?>
						<a href="<?php echo get_the_permalink(); ?>">
							<?php the_title( '<h2 class="page-title">', '</h2>'	); ?>
						</a>
						<span class="publishdate">
							<?php printf( __( 'Veröffentlicht am: %s von %s', 'increaretd' ), get_the_date(), get_the_author_posts_link()); ?>
						</span>
					</header>
					<?php the_content(); ?>
				</div><!-- #post-## -->
			<!-- END The Loop -->
			<!-- request post_type specific template -->
		</div><!-- #ict-content -->
			<!-- START not on front-page -->
			<div id="ict-sidebar">
				<?php get_sidebar(); ?>
			</div><!-- #ict-sidebar -->
			<!-- END not on front-page -->
	</div><!-- #ict-main -->
</main>