<?php 
//add theme support following style.css tags

load_theme_textdomain( 'kumonosu_blog', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo', array(
	'height' => 75,
	'width' => 218,
	'flex-height' => true,
) );

add_theme_support( 'automatic-feed-links' );
add_editor_style();

add_filter( 'jpeg_quality', function( $arg ){ return 100; } );


// Add SVG to types to uploads
function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


//remove title tagline
function remove_title_tagline($title) {

	if(isset($title['tagline'])) {
		unset($title['tagline']);
	}

	return $title;
}

add_filter('document_title_parts', 'remove_title_tagline');

// Set the title separater (e.g. Page Title | Website Title )

function custom_separator($sep) {

	$sep = ' | ';
	return $sep;

}

add_filter('document_title_separator', 'custom_separator');

/*===================================================================*/

//Add menu
function register_custom_menus() {
	register_nav_menu(
		array(
			'main', __( 'Main Menu', 'kumonosu_blog' ),
			'social_link', __( 'Social Menu', 'kumonosu_blog' ),
			'category', __('Category Menu', 'kumonosu_blog'),
		)
	);
}

add_action( 'after_startup_theme', 'register_custom_menus' );


// Add class to all <li> elements in Right sidebar 
function atg_menu_classes($classes, $item, $args) {
	if($args->theme_location == 'main' || 'social_link') {
		$classes[] = 'list-inline-item';
	} 
	return $classes;
}
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);


/*===================================================================*/
// Sidebar
/*====================================================================*/
// Add sidebar (right side bar)


//Add sidebar (footer full widget)
function kumonosu_sidebars() {

/**
* Creates a sidebar
* @param string|array  Builds Sidebar based off of 'name' and 'id' values.
*/
$right_sidebar = array(
	'name'          => __( 'Right Side Bar', 'kumonosu_blog' ),
	'id'            => 'kumonosu-right-sidebar',
	'description'   => '',
	'class'         => __('Widgets which display on the right side of the page.', 'kumonosu_blog'),
	'before_widget' => '<div id="%1" class="widget %2 row"><div class="col-12">',
	'after_widget'  => '</div></div>',
	'before_title'  => '<h2 class="title-underline">',
	'after_title'   => '</h2>',
);

register_sidebar( $right_sidebar );


/**
* Creates a sidebar
* @param string|array  Builds Sidebar based off of 'name' and 'id' values.
*/
$footer_left = array(
	'name'          => __( 'Footer Widget Left', 'kumonosu_blog' ),
	'id'            => 'footer-left',
	'description'   => __('Widgets which display on left footer such as Tags.', 'kumonosu_blog'),
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="%2$s col ">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="title-underline">',
	'after_title'   => '</h2>',
);

register_sidebar( $footer_left );


/**
* Creates a sidebar
* @param string|array  Builds Sidebar based off of 'name' and 'id' values.
*/
$footer_left = array(
	'name'          => __( 'Footer Widget Right', 'kumonosu_blog' ),
	'id'            => 'footer-right',
	'description'   => __('Widgets which display on right footer such as Facebook Page.', 'kumonosu_blog'),
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="%2$s col ">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="title-underline">',
	'after_title'   => '</h2>',
);

register_sidebar( $footer_left );



/**
 * Creates a sidebar
 * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
 */
$lang = array(
	'name'          => __( 'Language Switcher', 'kumonosu_blog' ),
	'id'            => 'language-switcher',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1" class="widget %2">',
	'after_widget'  => '</div>',
	'before_title'  => '',
	'after_title'   => '',
);

register_sidebar( $lang );


}

add_action( 'widgets_init', 'kumonosu_sidebars' );


//Add CSS 
function kumonosu_blog_css() {
	wp_enqueue_style( 'fonts_css', 'https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300,400,500,700,900|Noto+Serif+JP:200,300,400,500,600,700,900|PT+Serif:400,400i,700,700i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&subset=japanese' );
	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri().'/css/bootstrap-custom.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'kumonosu_blog_css' );

//Add JavaScript

function kumonosu_blog_js() {
	wp_enqueue_script('jquery_ui','https://code.jquery.com/ui/1.12.1/jquery-ui.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'fontawesome5_js', get_template_directory_uri().'/node_modules/@fortawesome/fontawesome-free/js/all.min.js', array('jquery'), '5.3.0', true );
	wp_enqueue_script( 'popper_js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri().'/node_modules/bootstrap/dist/js/bootstrap.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'parallax_js', get_template_directory_uri().'/js/parallax.min.js', array('jquery'),false, true );
	wp_enqueue_script( 'easing_js', get_template_directory_uri().'/js/jquery.easing.1.3.js', array('jquery_ui'),false, true );
	wp_enqueue_script( 'main_js', get_template_directory_uri().'/js/script.js', array('jquery'),false, true );
}
add_action( 'wp_enqueue_scripts', 'kumonosu_blog_js' );

// Contents exerpt length
function contents_excerpt_length($length) {
//

	$content = get_the_content(  );
	if (strlen($content) == mb_strlen( $content, 'utf-8' ) ) {
		return substr($length,0, strpos($length, '.')+ 1);
	} else {
		return substr($length,0, strpos($length, '。'));
	}
}

add_filter( 'get_the_excerpt','contents_excerpt_length');


// Title exerpt length 
function title_exerpt_length($title) {
	$words_count = 10;
	$new_title = explode(" ", $title);
	$title_length = array_slice($new_title, 0 , $words_count);
	if (is_home() && str_word_count($title) > $words_count){
		return implode(" ", $title_length). " &hellip;";
	} else {
		return $title;
	}
}

add_filter('the_title', 'title_exerpt_length');


// Set a default featured image if the featured image is not set
function default_category_featured_image() {
	global $post;
	$featured_image_exists = has_post_thumbnail($post->ID);

	if (!$featured_image_exists)  {
		$attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );

		if ($attached_image) {

			foreach ($attached_image as $attachment_id => $attachment) {
				set_post_thumbnail($post->ID, $attachment);
			}}
				else if ( in_category('1') ) {//general
					set_post_thumbnail($post->ID, '18');
				}
				else if ( in_category('2') ) {//code
					set_post_thumbnail($post->ID, '19');
				}
				else if ( in_category('3') ) {//wordpress
					set_post_thumbnail($post->ID, '10');
				}

				else if ( in_category('4') ) {//design
					set_post_thumbnail($post->ID, '6');
				}
				else {
					set_post_thumbnail($post->ID, '18');
					wp_reset_postdata();
				}

			}

		}
		add_action('the_post', 'default_category_featured_image');

// Customize archive title as only the title
		function custom_archive_title ($title) {

			if ( is_category() ) {

				$title = 'Category <i class="fas fa-fw fa-sm fa-angle-right"></i> '.single_cat_title( '', false );

			} elseif ( is_tag() ) {

				$title = 'Tag <i class="fas fa-fw fa-sm fa-angle-right"></i> '.single_tag_title( '', false );

			} elseif ( is_author() ) {

				$title = '<span class="vcard">' . get_the_author() . '</span>' ;

			} elseif ( is_day() ) {
				$title = 'Date <i class="fas fa-fw fa-sm fa-angle-right"></i> '. get_the_date( 'M j, Y', false );
			}

			return $title;

		};

		add_filter( 'get_the_archive_title', 'custom_archive_title');


//Exclude pages from WordPress Search
		if (!is_admin()) {
			function kumonosu_search_filter($query) {
				if ($query->is_search) {
					$query->set('post_type', 'post');
				}
				return $query;
			}
			add_filter('pre_get_posts','kumonosu_search_filter');
		}


		// add -times ago on date.
		//if its in japanese, change ago to 前

		function kumonosu_times_ago () {
			if (get_locale() == 'ja') {
				return human_time_diff( get_the_time('U'), current_time( 'timestamp' ) ).' '. __('前', 'kumonosu_blog');
			} else {
				return human_time_diff( get_the_time('U'), current_time( 'timestamp' ) ).' '. __(' ago', 'kumonosu_blog');
			}
		}





		/* ==================================== */
/* Comment List　
/* ==================================== */

include_once('template-part/comments/demo-comments.php');



function remove_email_url($fields) {
	unset($fields['url']);
	unset($fields['email']);
	return $fields;
}

add_filter('comment_form_default_fields', 'remove_email_url');


function kumonosu_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'kumonosu_move_comment_field_to_bottom');


/* ==================================== */
/* 	Add Responsive Class on Media*/
/* ==================================== */

function kumonosu_add_class_to_images($class){
	$class .= ' img-fluid mx-auto';
	return $class;
}
add_filter('get_image_tag_class','kumonosu_add_class_to_images');


/* ==================================================================
// 固定ページ・シングルページに個別にCSSを追加できるようにする
//================================================================== */

add_action('admin_menu', 'custom_css_hooks');
add_action('save_post', 'save_custom_css');
add_action('wp_head','insert_custom_css');
function custom_css_hooks() {
	add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'post', 'normal', 'high');
	add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'page', 'normal', 'high');
}
function custom_css_input() {
	global $post;
	echo '<input type="hidden" name="custom_css_noncename" id="custom_css_noncename" value="'.wp_create_nonce('custom-css').'" />';
	echo '<textarea name="custom_css" id="custom_css" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_custom_css',true).'</textarea>';
}
function save_custom_css($post_id) {
	if (!wp_verify_nonce(@$_POST['custom_css_noncename'], 'custom-css')) return $post_id;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
	$custom_css = @$_POST['custom_css'];
	update_post_meta($post_id, '_custom_css', $custom_css);
}
function insert_custom_css() {
	if (is_page() || is_single()) {
		if (have_posts()) : while (have_posts()) : the_post();
			echo '<style type="text/css">'.get_post_meta(get_the_ID(), '_custom_css', true).'</style>';
		endwhile; endif;
		rewind_posts();
	}
}


/* ==================================================================
// 固定ページ・シングルページに個別にJavaScriptを追加できるようにする
//================================================================== */

//Custom JS Widget
add_action( 'admin_menu', 'custom_js_hooks' );
add_action( 'save_post', 'save_custom_js' );
add_action( 'wp_head','insert_custom_js' );
function custom_js_hooks() {
	add_meta_box( 'custom_js', 'Custom JS', 'custom_js_input', 'post', 'normal', 'high' );
	add_meta_box( 'custom_js', 'Custom JS', 'custom_js_input', 'page', 'normal', 'high' );
}
function custom_js_input() {
	global $post;
	echo '<input type="hidden" name="custom_js_noncename" id="custom_js_noncename" value="'.wp_create_nonce('custom-js').'" />';
	echo '<textarea name="custom_js" id="custom_js" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_custom_js',true).'</textarea>';
}
function save_custom_js($post_id) {
	if (!wp_verify_nonce(@$_POST['custom_js_noncename'], 'custom-js')) return $post_id;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
	$custom_js = @$_POST['custom_js'];
	update_post_meta($post_id, '_custom_js', $custom_js);
}
function insert_custom_js() {
	if ( is_page() || is_single() ) {
		if ( have_posts() ) : while ( have_posts() ) : the_post();
			echo '<script type="text/javascript">' . get_post_meta(get_the_ID(), '_custom_js', true) . '</script>';
		endwhile; endif;
		rewind_posts();
	}
}

// Remove Child category from parmalink


function wpse147453_remove_child_categories_from_permalinks( $category ) {
    while ( $category->parent ) {
        $category = get_term( $category->parent, 'category' );
    }

    return $category;
}
add_filter( 'post_link_category', 'wpse147453_remove_child_categories_from_permalinks' );

?>