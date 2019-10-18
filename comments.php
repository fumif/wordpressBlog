<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div id="comments" class="comments-area ">

	<?php if(have_comments()): ?>
		<div class="comment-lists-wrap">
			<ol>
				<?php wp_list_comments(
					array(
						'type' => 'comment',
						'callback' => 'kumonosu_comment'
					)
				); ?>
			</ol>
		</div>
	<?php endif; ?>
	<?php 

				// Callback Vars
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

				// Fields
		$fields =  array(

			'author' =>
			'<p class="comment-form-author">'  .
			( $req ? '<span class="required">*</span>' : '' ) . 
			'<input id="author" name="author" type="text" placeholder="'.__( 'Name', 'kumonosu_blog' ).'" value="' . esc_attr( $commenter['comment_author'] ) .
			'" size="100"' . $aria_req . ' /></p>',
			'email' =>'',
			'url' =>'',
		);

		$comment_field = '<p class="comment-form-comment">
		<textarea id="comment" name="comment" placeholder="' . _x( 'Comment', 'noun','kumonosu_blog' ) .
		'" aria-required="true">' .
		'</textarea></p>';

		$comment_notes_before = null;

		$args = array(

			'title_reply'      		=> __( 'Leave a Comment', 'kumonosu_blog' ), 
			'label_submit'      	=> __( 'Send a comment', 'kumonosu_blog' ),  
			'comment_field'			=>  $comment_field,             
			'comment_notes_before'  =>  $comment_notes_before,
			'fields' => apply_filters( 'comment_form_default_fields', $fields ),
		);
	?>
	<?php comment_form($args); ?>

</div><!-- .comments-area -->
</div>
