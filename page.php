<?php get_header(); ?>
<?php 
	if ( have_posts() ) : ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
	<section>
		<div class="cover">
			<div class="cover-title box d-flex justify-content-center align-items-center">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</section>
	<section>
	<div class="container">
		<div class="row post-single">
			<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-12'); ?>>
				
				<div class="post-content">
				
					<?php the_content(); ?>
				</div>
			</article>
	<?php endwhile; endif; ?>
		</div>
	</div>
</section>
</div>
<?php get_footer(); ?>