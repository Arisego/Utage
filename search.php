<?php

get_header(); ?>


<div id="content" class="site-content span9 pull-left" role="main">
<ul class="breadcrumb">
  <li><a href="#">搜索</a> <span class="divider">/</span></li>
  <li><a href="#"><?php echo get_search_query(); ?></a></li>
</ul>

<?php if ( have_posts() ) : ?>

	<?php /* The loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', get_post_format() ); ?>
	<?php endwhile; ?>
	<?php utage_paginate(); ?>
<?php else : ?>
	<?php get_template_part( 'content', 'none' ); ?>
<?php endif; ?>
<script>
$('.search-field').val('<?php echo get_search_query(); ?>');
</script>
</div><!-- #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>