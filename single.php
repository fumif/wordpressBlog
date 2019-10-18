<?php get_header(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section>
		
		<?php if(have_posts()): while(have_posts()): the_post(); ?>

			<?php get_template_part( 'template-part/post/single', 'title' ); ?>
			<div class="container">
				<div class="row post-single">
					<?php get_template_part( 'template-part/post/content' ); ?>
					<?php get_sidebar( 'right' ); ?>
				</div>
			</div>
		<?php endwhile;endif; ?>
	</section>
</div>
<?php get_template_part( 'template-part/post/content', 'related' ); ?>

<?php get_footer(); ?>