<?php if ( ! isset( $content_width ) ) $content_width = 900; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-9'); ?>>
	<?php if (function_exists('bcn_display')) : ?>
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
			<?php bcn_display(); ?>
		</div>
	<?php endif; ?>
	<div class="post-share">
		<?php echo do_shortcode('[TheChamp-Sharing]');?>
	</div>
	<!-- <ul class="list-inline post-share">
		<p class="list-inline-item">Share: </p>
		<li class="list-inline-item">
			<a href=""><i class="fab fa-fw fa-2x fa-facebook hex-facebook"></i></a>
		</li>
		<li class="list-inline-item">
			<a href=""><i class="fab fa-fw fa-2x fa-twitter hex-twitter"></i></a>
		</li>
		<li class="list-inline-item">
			<a href=""><i class="fab fa-fw fa-2x fa-google-plus hex-google"></i></a>
		</li>
		<li class="list-inline-item">
			<a href=""><i class="fab fa-fw fa-2x fa-linkedin hex-linkedin"></i></a>
		</li>
		<li class="list-inline-item">
			<a href=""><i class="fab fa-fw fa-2x fa-reddit hex-reddit"></i></a>
		</li>
	</ul> -->
	<div class="d-flex my-3 align-items-center">
	<div class="post-date mr-3 ">
		<?php the_date(); ?>
	</div>
	<div class="post-tags">
		<?php st_the_tags(); ?>
	</div>
</div>

	<div class="post-content" <?php 
	$content = get_the_content( ); ?>
		<?php if (strlen($content) !== mb_strlen($content,'utf8') ): ?>
			 style="font-weight: 500;"
		<?php endif; ?>>


		<?php the_content( ); ?>

	</div>
	<div class="post-tags mt-2">
		<?php st_the_tags(); ?>
	</div>
	<div class="post-like">
		<?php echo do_shortcode( '[TheChamp-Sharing]' ); ?>
	</div>
</article>