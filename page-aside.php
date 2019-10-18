<?php
/**
 * Template Name: Two Column Page
 */

get_header(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<section>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<!-- post -->
	<div class="cover">
		<div class="cover-image box d-flex flex-column justify-content-center align-items-center"
			style="background-image: url(<?php if (has_post_thumbnail($post->ID)){
				$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				echo $image;
			}?>);">
			<h1 class="post-headline"><?php the_title(); ?></h1>
		</div>
	</div>
	<div class="container">
		<div class="row post-single">
			<article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-9'); ?>>
				<div class="post-content">
					<?php the_content(); ?>
				</div>
			</article>

	<?php endwhile; endif; ?>
			
			<?php include('sidebar.php'); ?>
		</div>
	</div>
</section>
</div>
<?php get_footer(); ?>