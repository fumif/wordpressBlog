<?php get_header(); ?>
<section>
	<div id="cover-firstpost" class="container-fluid">
		<div class="row">
			<article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-9'); ?>>

				<?php 

				$args = array(
					'posts_per_page' => 1,
				);

				$query = new WP_Query($args);
				if ( $query -> have_posts() ) :?>
					<?php $i = 0; ?>
					<?php while ( $query -> have_posts() ) :  $query -> the_post(); ?>
						<?php if ($i == 0): ?>
							<!-- post -->
							<div class="cover cover-firstpost d-flex flex-column justify-content-end" style="background-image: url(
								<?php if (has_post_thumbnail($post->ID)){
									$thumbs = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); 
									echo $thumbs;
								} else  {
									echo wp_get_attachment_image_src(66, 'post-thumbnail');
								}
								?>

								);">
								<div class="box">
									<div class="d-flex post-info align-items-center">
										<div class="post-category">
											<?php
											foreach(get_the_category() as $category){
												echo "<ul class='post-categories'><li><a class='";
												if ($category->parent) {
													echo "cat-".$category->parent;
												} else {
													echo "cat-".$category->cat_ID;
												}

												echo "' href='".get_term_link($category)."'>".$category->cat_name."</a></li></ul>";
											}
											?> 
										</div>
										<div class="post-date">
											<?php echo kumonosu_times_ago(); ?>
										</div>
									</div>
									<a href="<?php the_permalink(); ?>" class="cover-stickypost-item">
										<h1 class="post-headline"><?php the_title(); ?></h1>
										<!-- <p class="post-content" 
										<?php 
										// $content = get_the_content( ); ?>
										<?php //if (strlen($content) !== mb_strlen($content,'utf8') ): ?>
											 style="font-weight: 600;"
										<?php //endif; ?>
										><?php // echo  get_the_excerpt(); ?></p>  -->
									</a>
								</div>
							</div> 
						<?php endif; ?>
					<?php endwhile; wp_reset_postdata();else: ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.', 'kumonosu_blog' ); ?></p>
				<?php endif; ?>
			</article>
			<?php get_sidebar( 'right' ); ?>
		</div>
	</div>
</section>
<!-- Latest Update -->
<section id="posts" class="posts">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h2 class="title-underline"><?php  _e('Latest Updates', 'kumonosu_blog'); ?></h2>
			</div>
		</div>
		<div class="row posts-grid">

			<?php $args = array(
				'posts_per_page' => 7
			);
			$query = new WP_Query($args);?>

			<?php	if ( $query->have_posts() ) :
				$i =0;
				?>
				<?php while ( $query->have_posts() ) :  $query->the_post(); ?>
					<?php if (!$i == 0): ?>

						<?php get_template_part( 'template-part/post/content', 'gridpost' ); ?>
					<?php endif; ?>
					<?php $i++; ?>
				<?php endwhile;wp_reset_postdata();endif; ?> 
			</div>
		</div>
	</section><!-- /latest update -->
	<!-- Posts by category -->
	<?php get_template_part( 'template-part/category/category' ); ?>
	<?php get_footer(); ?>