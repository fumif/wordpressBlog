<div id="search" class="search">
	<span class="closebtn"><i class="fas fa-2x fa-times"></i></span>
	<form role="search" method="get" id="searchform" class="searchform d-flex justify-content-center" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div>
		<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' , 'kumonosu_blog'); ?></label>
		<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search Keyword(s)" />
	</div>
</form>
</div>