<?php get_header( $name = null ); ?>
	<?php 
	if ( have_posts() ) : ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section>
		<div class="cover">
			<div class="cover-title box d-flex justify-content-center align-items-center">
				<h1><?php echo get_the_archive_title(); ?></h1>

			</div>
		</div>
	</section>
	<section>
	<div class="container-fluid">
		<div class="row posts-grid">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-part/post/content', 'gridpost' ); ?>

				<?php endwhile;else: ?>
				<?php _e('Category could not be found.','kumonosu_blog'); ?>
				<?php endif; ?> 
			</div>
		</div>
	</section>
</div>
	<?php get_footer( $name = null ); ?>