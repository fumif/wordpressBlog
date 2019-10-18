
<?php 
$categories = get_the_category( $post->ID );
$category = $categories[0]; 
if ($category->parent) { // if there is a parent
	$cat_parent = $category->parent;	
	$cat_children = get_term_children( $cat_parent, 'category' ); // get child category
	foreach ($cat_children as $key => $value) {
		$cat_id = $value . ',';
	}

	$cat_id.= $cat_parent; // add parent category ID
} else {
	$cat_id = $category->cat_ID;  // if there isn't any child category
}

	$args = array(
		
		'post__not_in' => array($post->ID),
		'cat' => array($cat_id),
		'posts_per_page'         => 3,
		'order' => 'rand',
	);

$query = new WP_Query( $args ); ?>


<?php if ( $query->have_posts() ) : ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<section id="posts" class="posts">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h2 class="title-underline"><?php echo __('Related Posts','kumonosu_blog'); ?></h2>
			</div>
		</div>
		<div class="row posts-grid">
<?php while ( $query->have_posts() ) : $query->the_post(); ?>

<?php get_template_part( 'template-part/post/content', 'gridpost' ); ?>

<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
</div>
<?php endif; ?>