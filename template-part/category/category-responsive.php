<div class="header-main <?php if (is_admin_bar_showing()): ?>
		admin-bar-margin
	<?php endif; ?> container-fluid d-block d-md-none">
		<div class="row">
			<div class="col-12 d-flex justify-content-between align-items-center">
				<!-- Logo -->
				<?php the_custom_logo(  ); ?>
				<?php if (!has_custom_logo()): ?>
					
				<h1 class="logo mr-lg-auto order-0"><a href="<?php echo esc_url( home_url() ) ; ?>"><?php bloginfo('name'); ?></a></h1> 

				<?php endif; ?>
				<span class="open-menu"><i class="fas fa-2x fa-fw fa-bars"></i></span>
			</div>
			<!-- Toggle Part -->
			<div id="responsive-menu" class="col-12 d-none flex-column mx-auto">
				<!-- Language HTML -->
				<div class="lang mx-auto">
					<?php dynamic_sidebar( 'language-switcher' ); ?>
				</div>
				<!-- Contact -->
				<div class="contact mx-auto">
					<?php
					wp_nav_menu( array(
						'menu'            => 'social_link',
						'container'       => '',
						'menu_class'      => 'menu',
						'items_wrap'      => '<ul id = "%1$s" class = "list-inline %2$s">%3$s</ul>',
					) ); ?>
				</div>
				<!-- <ul class="lang list-inline mx-auto">
					<li class="list-inline-item"><a href="">日本語</a></li>
					<li class="list-inline-item">|</li>
					<li class="list-inline-item"><a href="">English</a></li>
				</ul> -->
				<nav class="post-category-menu d-flex flex-column justify-content-between">
				<?php $categories = get_categories(array('parent' => 0,'hide_empty' => true));
					$output = '';
					if ($categories) {
						foreach ($categories as $category) {
							echo '<a href="'.get_category_link( $category )	.'" class="mr-auto flex-grow-1" >'.$category->cat_name.'</a>';
						}
					}
					?>
				</nav>
			</div>
		</div>
	</div>