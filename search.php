<?php get_header( $name = null ); ?>
<?php if ( have_posts() ) : ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section>
		<div class="cover">
			<div class="cover-title box d-flex justify-content-center align-items-center">
				<h1><?php _e('Search Results: ','kumonosu_blog'); ?> "<?php echo get_search_query(); ?>"</h1>
			</div>
		</div>
	</section>
	<section>
		<div class="container">
				<?php while ( have_posts() ) : the_post(); ?>
				<div class="row list-border">
					<div class="col-lg-3 box">
						<a href="<?php the_permalink(); ?> ">
							<div class="post-image-list" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'post-thumbnail'); ?>)"></div>
						</a>
					</div>
					<div class="col-lg-9 box">
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
								<?php 
								$archive_year  = get_the_time('Y'); 
								$archive_month = get_the_time('m'); 
								$archive_day   = get_the_time('d');  
								echo "<a href=" .
								get_day_link( $archive_year, $archive_month, $archive_day).">Posted on " .  get_the_date('M j, Y')." </a>";?>

							</div>
						</div>
						<a href="<?php the_permalink();?>">
							<h2><?php the_title(); ?></h2>
						</a>
					</div>
				</div>
				<?php endwhile; ?>
				<!-- <div class="m-auto">
					<?php //echo do_shortcode( '[ajax_load_more post_type="post" button_label="Load More"]'); ?>
				</div> -->
				<?php else: ?>
					<div class="d-flex justify-content-center align-items-center" style="height: 50vh;">

						<h1><?php _e('No results found.', 'kumonosu_blog');?></h1>
					</div>
				<?php endif; ?> 
			</div>
		</div>
	</section>
</div>
	<?php get_footer( $name = null ); ?>