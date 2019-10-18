<div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-4 col-md-6 posts-grid-item'); ?>>
	<div class="box-shadow">
		<a href="<?php the_permalink(); ?>">
			<div class="post-image" style="background-image:url(
				<?php if (has_post_thumbnail($post->ID)){
					$thumbs = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); 
					echo $thumbs;
				}
				?>
		);"></div>
		</a>
		<div class="postBox box d-flex flex-column justify-content-between">
			<a href="<?php the_permalink(); ?> ">
				<h2 class="post-title">
					<?php 
					$title = get_the_title();
					$words_count = 10;
					$new_title = explode(" ", $title);
					$title_length = array_slice($new_title, 0 , $words_count);
					if (str_word_count($title) > $words_count){
						echo implode(" ", $title_length). " &hellip;";
					} else {
						echo $title;
					} ?>
				</h2>
			</a>
			<div class="d-flex post-info align-items-center">
				<div class="post-category">
					<?php
					foreach(get_the_category() as $category){
						echo "<ul class='post-categories mr-2'><li>
						<a class='";
						if ($category->parent) {
							echo "cat-".$category->parent;
						} else {
							echo "cat-".$category->cat_ID;
						}
						echo "' href='".get_term_link($category)."'>".$category->cat_name."</a>
						</li></ul>";
					}
					?>
				</div>
				<div class="post-date divider">
					 <?php echo kumonosu_times_ago(); ?>
				</div>
			</div>
		</div>
</div>
</div>
	

