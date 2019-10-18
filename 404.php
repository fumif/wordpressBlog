<?php get_header(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="container">
		<div class="not-found d-flex flex-column justify-content-center align-items-center" >
			<h1>404</h1>
			<p><?php _e('Sorry, the page you are looking for couldn\'t be found.', 'kumonosu_blog'); ?></p>
	</div>
</section>
</div>
<?php get_footer(); ?>