<div class="comments">  
  <?php 
	// Do not delete these lines 
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
			
	// Standard WordPress comments security
	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.', 'utage' ); ?></p>
		<?php return;
	} ?>
	
	<?php // You can start editing here -- including this comment! 
	if ( have_comments() ): ?>
		<div id="comments" class="well well-small">	
            <legend id="comments-title">
                <?php comments_number(__( 'No Comments', 'utage' ), __( '1 Comment', 'utage' ), __( '% Comments', 'utage' ) );?>
            </legend><!-- #comments -->
    
            <div class="navigation">
                <div class="alignleft">
                    <?php previous_comments_link();?>
                </div>
                <div class="alignright">
                    <?php next_comments_link(); ?>
                </div>
            </div> <!-- .navigation -->
    
            <ul class="commentlist">
                <?php wp_list_comments(array('walker' => new comment_walker()));?>
            </ul>
            
             <div class="navigation clearfix">
                <div class="alignleft">
                    <?php previous_comments_link();?>
                </div>
                <div class="alignright">
                    <?php next_comments_link(); ?>
                </div>
            </div> <!-- .navigation -->
            
     	</div><!-- .comment-wrap -->            
	<?php else: // this is displayed if there are no comments so far

		if (comments_open()): // If comments are open, but there are no comments.
          
		else: // comments are closed ?>
           <p class="nocomments"><?php _e( 'Comments are closed.', 'utage' );?></p>
    	<?php endif; 
		
	endif;?>
	
	<div class="well well-small">
    <?php comment_form(array(
		'class_submit' => 'btn btn-info',
		'comment_notes_after' =>
		'<p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), ' <span class="text-success">' . allowed_tags() . '</span>' ) . '</p>'
	)); ?>
	</div>
</div>