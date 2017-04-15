<?php
/**
 * The sidebar containing the secondary widget area
 *
 * Displays on posts and pages.
 *
 * If no active widgets are in this sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
	<div id="tertiary" class="sidebar-container span3" role="complementary">
		<div class="sidebar-inner">
			<div class="widget-area well">
				<?php dynamic_sidebar( 'sidebar-main' ); ?>
			</div><!-- .widget-area -->
		</div><!-- .sidebar-inner -->
	</div><!-- #tertiary -->
<?php endif; ?>