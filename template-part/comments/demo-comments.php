<?php function kumonosu_comment($comment, $args, $depth) {
		$tag       = 'li';
		$add_below = 'div-comment';
	?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body d-flex justify-content-between">
		<?php endif; ?>
		<div class="comment-author">
			<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		</div>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'kumonosu_blog' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-main w-100 d-flex flex-column">
			<div class="comment-top d-flex justify-content-between flex-shrink-1">
				<div class="comment-name">
					<?php printf( __( '<cite class="fn">%s</cite>' , 'kumonosu_blog'), get_comment_author_link() ); ?>
				</div>
				<div class="comment-date">
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php
					/* translators: 1: date, 2: time */
					printf( __('<i class="far fa-calendar-alt"></i> %1$s <i class="far fa-clock"></i> %2$s', 'kumonosu_blog'), get_comment_date('M j, Y'),  get_comment_time() ); ?></a>
				</div>
			</div>
			<div class="comment-content flex-shrink-0 flex-grow-1">
			<?php echo get_comment_text(); ?>
			</div>

			<div class="d-flex flex-shrink-1" >					
				<div class="edit mx-1">
					<?php edit_comment_link( __( '<button class="btn-sm btn-light"><i class="fas fa-edit"></i> Edit</button>', 'kumonosu_blog' ), '  ', '' );?></i>
				</div>
				
					<div class="reply mx-1">
			
						
						<?php comment_reply_link( array_merge( $args, array( 
							'add_below' => $add_below, 
							'depth'     => $depth, 
							'reply_text'	=>	__('<button class="btn-sm btn-primary"><i class="fas fa-reply"></i> Reply</button>', 'kumonosu_blog'),
							'max_depth' => $args['max_depth'] 
						) ) ); ?>
					</div>
			</div>
				
			</div>

			<?php if ( 'div' != $args['style'] ) : ?>
			</div>
		<?php endif; ?>
		<?php
	}