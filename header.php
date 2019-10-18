<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head prefix=”og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#”>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
	<!-- <meta name="google-site-verification" content="mimPze765M6NByLDttyr0C9xRLchWtawX4j8D4uY54s" /> -->
	<?php if( is_single() ): ?>
		<?php if( have_posts() ): ?>
			<?php while( have_posts() ): the_post(); ?>
				<link rel="alternate" hreflang="ja" href="<?php the_permalink(); ?>">
			<?php endwhile; ?>
		<?php endif; ?>
		<?php elseif( is_home() ): ?>
			<link rel="alternate" hreflang="ja" href="<?php echo home_url(); ?>">
		<?php endif; ?>

		<?php
		if (is_singular()) {
			$pid = get_the_ID();
			if (has_post_thumbnail($pid)) {
				$featured_image_id = get_post_thumbnail_id($pid);
				$ogimage = wp_get_attachment_image_src($featured_image_id,array(200,200),false);
				$ogimage = $ogimage[0];
			} else {
				$ssdir = get_stylesheet_directory_uri();
				$ogimage = $ssdir."/img/ogimage.png";
			}
		} else {
			$ssdir = get_stylesheet_directory_uri();
			$ogimage = $ssdir."/img/ogimage.png";
		}
		?>
		<meta property="og:image" content="<?php echo $ogimage; ?>">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-59297214-2"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-59297214-2');
		</script>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({
				google_ad_client: "ca-pub-5974294294991755",
				enable_page_level_ads: true
			});
			
			window.FontAwesomeConfig={
				searchPseudoElements:true
			}
			try{Typekit.load({ async: true });}catch(e){}
		</script>
	</head>
	<body class="d-flex flex-column justify-content-between align-items-stretch" <?php body_class(); ?>>
		<header class="flex-shrinnk-0">
			<!-- Responsive Menu -->
			<?php get_template_part( 'template-part/category/category', 'responsive' ); ?>
			<!-- / Responsive Menu -->

			<div class="container-fluid d-none d-md-block header-main <?php if (is_admin_bar_showing()): ?>admin-bar-margin<?php endif; ?> ">
				<div class="row">
					<div class="col-12">
						<nav class="nav d-flex justify-content-between align-items-md-end">
							<!-- Logo -->
							<?php the_custom_logo(  ); ?>
							<?php if (!has_custom_logo()): ?>
								
								<h1 class="logo mr-lg-auto order-0"><a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo('name'); ?></a></h1>
							<?php endif; ?>
							
							<div class="d-none d-md-flex">
								<div class="contact order-md-2 order-1 ">
									<?php
									wp_nav_menu( array(
										'menu'            => 'social_link',
										'container'       => '',
										'menu_class'      => 'menu',
										'items_wrap'      => '<ul id = "%1$s" class = "list-inline %2$s">%3$s</ul>',
									) ); ?>
								</div>
								<div class="lang order-3">
									<?php dynamic_sidebar( 'language-switcher' ); ?>
								</div>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</header>

		<main class="flex-grow-1 flex-shrinnk-0 <?php if (is_admin_bar_showing()): ?>
		adminbar_showing 
		<?php endif ?>adminbar-hiding ">
		<a href="#" class="scrollTop"><i class="fas fa-2x fa-angle-up"></i></a>


		<?php $menu_items = wp_get_nav_menu_items( 'categories' ); 
		if (isset($menu_items) && count($menu_items) >=3) : ?>

			<ul class="post-category-menu d-flex justify-content-around align-items-center">
				<?php 
				
				foreach ($menu_items as $menu) {
					$cat_id = $menu->object_id;
					$parent = $menu->menu_item_parent;
					$children = get_terms( 'category', array(
						'hide_empty' => true,
						'parent'	=> $cat_id,
						'child_of'	=> $cat_id,

					) );


					if (!$parent) :?>
						<li><a class="cat-<?php echo $cat_id; ?>" href="<?php echo $menu->url; ?>" ><?php echo $menu->title ;?></a>
						<?php endif;?>

						<?php if (count($children) >= 3): ?>
							<ul class="submenu list-inline justify-content-around align-items-center">
								<?php foreach ($children as $child ): setup_postdata( $child ); ?>
									<li class="list-inline-item"><a href="<?php echo get_category_link( $child ); ?>" 
										class="cat-<?php echo $child->parent; ?>"><?php  echo $child->name; ?></a></li>
									<?php endforeach ?>
								</ul>
							<?php endif; ?>
						</li>
						
					<?php } ?>
					

				</ul>

			<?php endif; ?>
			
			

			<?php wp_head(); ?>