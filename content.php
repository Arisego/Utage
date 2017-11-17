<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<article class="well normel-back" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">


		<?php if ( is_single() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php endif; // is_single() ?>

		<div class="entry-meta">
			<?php utage_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'utage' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php if (! is_single() && 'page' != get_post_type() ) : ?>
		<div class="exp-main">

			<?php the_content(  '', 'utage' ); ?>

			<div  style="text-align: left;">
				<a  href="<?php the_permalink() ?>" class="btn btn-small"><i class="icon icon-share-alt"></i>&nbsp;<?php _e('Read More', 'utage'); ?></a>
			</div>

		 </div>	
		<?php else : ?>
		<div class="single-main hero" >
			<?php the_content(); 
			wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'utage' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
			?>
			
			<!-- #Tags&Catgory -->			
			<div class="tag-lists">
				<?php
					/* 不显示标签
					$categories = get_the_category();
					if($categories){
						foreach($categories as $category) {
							$cats[] = '<a href="'.get_category_link( $category->term_id ).'" rel="category" itemprop="articleSection">'.$category->name.'</a>';
						}
						$output .= '<i class="icon icon-folder-open"></i>' . join(' | ',$cats);
					}*/
					$tags = get_the_tag_list('<i class="icon icon-tags"></i>',' | ');
					if($tags) $output .= '<span itemprop="keywords">'.$tags.'</span>';
					echo $output;
				?>
			</div>

			
			<!-- #Info Begin -->

			<!-- #Info End -->		
			<div class="row-fluid" id="ccinfo">
				<div class="text-right">			
					<span class="muted">本博客所有内容遵循<a rel="nofollow" target="_blank" href="http://creativecommons.org/licenses/by-nc-sa/3.0/cn/">CC BY-NC-SA 3.0</a>协议，</span>
					<span class="muted">如有转载，请注明出处。</span>
				</div>
			</div>			
			
		</div>
		<?php endif ?>

	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">

	</footer><!-- .entry-meta -->
</article><!-- #post -->
