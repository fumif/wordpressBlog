<?php

get_header(); ?>
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<!-- post -->
	<div class="cover">
		<div class="box d-flex flex-column justify-content-center align-items-center">
			<h1 class="post-headline"><?php  ?></h1>
		</div>
	</div>
	<div class="container">
		<div class="row post-single">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post-content col-lg-12">
					<?php the_content(); ?>
				</div>
			</article>

	<?php endwhile; endif; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>