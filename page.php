<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>


<div id="content" class="site-content span9 pull-left" role="main">
<?php if ( have_posts() ) : ?>

	<?php /* The loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', get_post_format() ); ?>
	<?php endwhile; ?>
	
		<?php /* 文章前后篇章导航 */ ?>
		<?php if ( is_single() ) : ?>
			<ul class="pager">
			<li class="pull-left">		
				<?php 
					$prev_post = get_adjacent_post(false, '', true);
					if(!empty($prev_post)) 
					{
						echo '<a href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '"><span>上一篇：</span>' . $prev_post->post_title . '</a>'; 
					}
				?>
			</li>
			<li class="pull-right">
				<?php 
					$next_post = get_adjacent_post(false, '', false);
					if(!empty($next_post)) 
					{
						echo '<a href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '"><span>下一篇：</span>' . $next_post->post_title . '</a>'; 
					}
				?>			
			</li>
			</ul>
		<?php endif; ?>
		<?php comments_template(); ?>
		
		
<?php else : ?>
	<?php get_template_part( 'content', 'none' ); ?>
<?php endif; ?>

</div><!-- #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>