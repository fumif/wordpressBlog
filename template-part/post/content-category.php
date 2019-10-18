<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<section>
	<div class="container-fluid">
		<div class="row">
			<!-- Get the parent category, excludes child categories -->
			<?php $categories = get_categories(array('parent'	=> 0 )); ?>
			<!-- Loop the category -->
			<?php foreach ($categories as $category): 
				$args = array(
					'cat'            => $category->cat_ID,
					'posts_per_page' => 5,
				);

				$cat_query = new WP_Query($args);
			?>
			<?php if ( $cat_query->have_posts() ) : ?>
			<div class="col-lg-4 col-md-6 post-category-lists">
			<?php echo '<h2 class="title-underline"><a href="'.get_category_link( $category )	.'" class="cat-'.$category->cat_ID.'">'.$category->cat_name.'</a></h2>'; ?>

			<?php $first = true; //add a variable before the loop (before the while), for example $first = true;

			while ( $cat_query->have_posts() ) : $cat_query->the_post(); ?>
				<?php if ($first): 
				//add a check inside the loop for this variable ?> 
				<div class=" box-shadow">
					<div class="post-image" style="background-image:url(
						<?php if (has_post_thumbnail($post->ID)){
							$thumbs = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); 
							echo $thumbs;
						}
						?>
						);"></div>
						<div class="postBox box d-flex flex-column justify-content-between">
							<a href="<?php the_permalink(); ?> ">
								<h2 class="post-title"><?php the_title(); ?></h2>
							</a>
							<div class="post-info">
								<div class="post-date">
									<?php echo kumonosu_times_ago(); ?>
								</div> 
							</div>
						</div>
					</div>
				<?php  $first = false; //after the use, change the flag
				else: ?>
					<div class="box list-border">
						<div class="row">
							<div class="col-4">
								<a href="<?php the_permalink(); ?> ">
									<div class="post-image-list" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'post-thumbnail'); ?>)"></div>
								</a>
							</div>
							<div class="col-8 d-flex flex-column justify-content-around">
								<a href="<?php the_permalink(); ?> ">
									<h2 class="post-title">
										<?php the_title(); ?>
									</h2>
								</a>
								<div class="post-date">
									<?php echo kumonosu_times_ago(); ?>
								</div> 
							</div>
						</div>
					</div>
			<?php endif;?>
			<?php endwhile;?> 
		</div>
		<?php endif; wp_reset_postdata(); ?>
		<?php endforeach; ?>
	</div>
</div>
</section><!-- Posts by category -->
</div>