<div class="cover">
		<div class="parallax-window cover-image box d-flex flex-column justify-content-center align-items-center"
 			data-parallax="scroll" data-image-src="<?php if (has_post_thumbnail($post->ID)){
				$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				echo $image;
			}?>" data-speed="0.5">
			<div class="post-info">
				<span class="post-category">
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

				</span>
			</div>
			<h1 class="post-headline">
				<?php the_title();?>
			</h1>
		</div>
	</div>