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
			<div class="row-fluid" id="ccinfo">
			
				<div class="tabbable tabs-left blog-infos">
				  <ul class="nav nav-tabs">
					<li class="active"><a href="#lA" data-toggle="tab"><i class="icon-info-sign info-icon"></i>&nbsp;<span>关于</span></a></li>
					<li class=""><a href="#lB" data-toggle="tab"><i class="icon-gift info-icon"></i>&nbsp;<span>赞赏</span></a></li>
					<li class=""><a href="#lC" data-toggle="tab"><i class="icon-envelope info-icon"></i>&nbsp;<span>联系</span></a></li>
				  </ul>
				  <div class="tab-content">
					<div class="tab-pane blog-info active" id="lA">
					  	如果本文对你有帮助，欢迎在下方留言，你的肯定是对我最好的鼓励。<br>
						如果你愿意，也可以考虑请我喝杯咖啡，点击左方<span class="label label-success">赞赏</span>继续操作<br>
					</div>
					<div class="tab-pane blog-info" id="lB">
						<span>感谢你的支持，用微信扫描下方赞赏码即可~</span>
						<div class="row-fluid">
							<ul class="thumbnails">
							  <li class="span3 offset4">
								<div alt="微信赞赏码" class="thumbnail">
								  <img class="donate-img" alt="微信赞赏码" src="<?php echo get_template_directory_uri(); ?>/img/donate.jpg">
								</div>
							  </li>
							</ul>
						  </div>
					</div>
					<div class="tab-pane blog-info " id="lC">
						联系方式请参见右边顶部哦~
					</div>
				  </div>
				</div>			
			</div>
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
