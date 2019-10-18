	</main>
	<footer class="flex-shrinnk-0">
		<div class="container">
			<?php get_sidebar(); ?>
			<div class="row">
				<div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-md-stretch align-items-center">
					<div class="copyright order-md-0 order-1"><?php echo date('Y'); ?> &copy; <?php bloginfo('name'); ?> All Rights Reserved.</div>
						<?php

						wp_nav_menu( array(
							'theme_location'  => 'main',
							'menu'            => 'main',
							'menu_class'      => 'footer-menu',
							'items_wrap'      => '<div id = "%1$s" class = "%2$s">%3$s</ul>',
						) );
							?>
				</div>
			</div>
		</div>
	</footer>
	<!-- FullScreen Search -->
	<?php get_search_form(); ?>
	<?php wp_footer(); ?>
	</body>
</html>