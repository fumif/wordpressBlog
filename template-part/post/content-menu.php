<!-- qTranslateX Code-->
<?php //echo qtranxf_generateLanguageSelectCode('text'); ?>

<!-- Language HTML -->
<!-- <ul class="lang list-inline order-2 ">
	<li class="list-inline-item"><a href="">日本語</a></li>
	<li class="list-inline-item">|</li>
	<li class="list-inline-item"><a href="">English</a></li>
</ul> -->

<!-- Contact Menu -->
<div class="contact order-md-3 order-1 ">
	<?php
	wp_nav_menu( array(
		'menu'            => 'social_link',
		'container'       => '',
		'menu_class'      => 'menu',
		'items_wrap'      => '<ul id = "%1$s" class = "list-inline %2$s">%3$s</ul>',
	) ); ?>
</div>