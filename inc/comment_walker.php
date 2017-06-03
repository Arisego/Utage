<?php
	class comment_walker extends Walker_Comment {
		var $tree_type = 'comment';
		var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );
 
		// constructor – wrapper for the comments list
		function __construct() { ?>

			<section class="comments-list">

		<?php }

		// start_lvl – wrapper for child comments list
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$GLOBALS['comment_depth'] = $depth + 2; ?>
			
			<section class="child-comments comments-list">

		<?php }
	
		// end_lvl – closing wrapper for child comments list
		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$GLOBALS['comment_depth'] = $depth + 2; ?>

			</section>

		<?php }

		// start_el – HTML for comment template
		function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
			$depth++;
			$GLOBALS['comment_depth'] = $depth;
			$GLOBALS['comment'] = $comment;
			$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); 
	
			if ( 'article' == $args['style'] ) {
				$tag = 'article';
				$add_below = 'comment';
			} else {
				$tag = 'article';
				$add_below = 'comment';
			} ?>

			<article <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
				<div class="media">
					<div class="pull-left">
						<?php // 显示评论作者头像 
						  echo get_avatar( $comment, 64 ); 
						?>
					</div>
					<div class="comment-author-info">
						<a rel="nofollow" class="comment-author-link" href="<?php comment_author_url(); ?>" itemprop="author"><?php comment_author(); ?></a><br>
						<time class="comment-meta-item" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished"><?php comment_date('Y年Fd日') ?> <?php comment_time() ?></a></time>
					</div>		
					<div class="media-body">
						<div class="comment_text">
							<?php // 显示评论内容
								comment_text(); 
							?>						
						</div>
						<ul class="breadcrumb">
							<?php 
								$com_rep = get_comment_reply_link( array_merge( $args, array( 
									'reply_text' =>  __( '回复', 'utage' ),  
									'depth'      =>  $depth, 
									'max_depth'  =>  $args['max_depth'] ) ) ); 
								if(!($com_rep  === NULL)) : ?>
								<li>
									<i class="icon-share-alt comment-icon"></i>
									<?php echo $com_rep; ?>
									
								</li>
							<?php else : ?>
								<li class="active">
									<i class="icon-minus-sign comment-icon"></i>
									<a class="disabled muted">禁用</a>
									
								</li>							
							<?php endif; ?>
							<?php edit_comment_link( __( 'Edit', 'utage' ), '<li><i class="icon-pencil comment-icon"></i>', '</li>' ); ?>			
							<?php if ( '0' == $comment->comment_approved ) : ?>
								<li class="active comment-awaiting-moderation"><i class="icon-time comment-icon"></i>
									<a class="disabled muted">待审</a>
								</li>
							<?php endif; ?>
						  
						</ul>

					</div>					
				</div>
			

					

				


		<?php }

		// end_el – closing HTML for comment template
		function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>

			</article>

		<?php }

		// destructor – closing wrapper for the comments list
		function __destruct() { ?>

			</section>
		
		<?php }

	}
?>