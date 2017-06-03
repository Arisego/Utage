<?php
function utage_setup() {
	load_theme_textdomain( 'utage', get_template_directory() . '/languages' );

	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'utage' ) );
	
	$args = array(
		'default-color' => '000000',
		'default-image' => get_template_directory_uri() . '/images/rockywall_2X.png',
	);
	add_theme_support( 'custom-background', $args );
	
}
add_action( 'after_setup_theme', 'utage_setup' );

/* 文章meta */
if ( ! function_exists( 'utage_entry_meta' ) ) :
function utage_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post meta-cell"><i class="icon icon-exclamation-sign"></i>' . __( 'Sticky', 'utage' ) . '</span>';
	
	// 显示日期
	echo '<span class="meta-cell"><i class="icon icon-calendar"></i><time class="entry-date" title="'.sprintf( __('发布于 %1$s 最后编辑于 %2$s ', 'utage'), get_the_time('Y-m-d H:i:s'), get_the_modified_time('Y-m-d H:i:s') ).'" datetime="'.get_the_date( 'c' ).'"  itemprop="datePublished">'.get_the_date().'</time></span>';
	
	// 显示评论
	echo '<span class="meta-cell"><i class="icon icon-comment"></i><a href="'.get_permalink().'#comments" itemprop="discussionUrl" itemscope itemtype="http://schema.org/Comment"><span itemprop="interactionCount">'.get_comments_number().'</span></a></span>';

	/* 不显示标签
	$categories_list = get_the_category_list( __( ', ', 'utage' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links meta-cell"><i class="icon icon-folder-open"></i>' . $categories_list . '</span>';
	}*/

}
endif;

//文章归档分页导航
if ( ! function_exists( 'utage_paginate' ) ) :
function utage_paginate($wp_query=''){
	if(empty($wp_query)) global $wp_query;
	$pages = $wp_query->max_num_pages;
	if ( $pages >= 2 ):
		$big = 999999999;
		$paginate = paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $pages,
			'type' => 'array'
		) );
		echo '<div class="pagination pagination-centered"><ul role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">';
		foreach ($paginate as $value) {
			echo '<li itemprop="name">'.$value.'</li>';
		}
		echo '</ul></div>';
	endif;
}
endif;

function utage_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Area', 'utage' ),
		'id'            => 'sidebar-main',
		'description'   => __( 'Appears on posts and pages in the sidebar.', 'utage' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'utage_widgets_init' );

function utage_scripts_styles() {
	/*-- Bootstrap核心CSS -*/
	wp_enqueue_style( 'utage-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '2015-04-16' );
	wp_enqueue_style( 'utage-bootstrapres-css', get_template_directory_uri() . '/css/bootstrap-responsive.min.css', array(), '2015-04-16' );

	/*-- 网站核心CSS -*/
	wp_enqueue_style( 'utage-main-css', get_template_directory_uri() . '/css/main.css', array(), '2015-04-16' );

	/*--[if lte IE 6]--*/
		wp_enqueue_style( 'utage-bsie-css', get_template_directory_uri() . '/css/bootstrap-ie6.min.css', array(), '2013-07-18' );
		wp_enqueue_style( 'utage-ie-css', get_template_directory_uri() . '/css/ie.css', array(), '2013-07-18' );
		wp_style_add_data( 'utage-bsie-css', 'conditional', 'lt IE 7' );	
		wp_style_add_data( 'utage-ie-css', 'conditional', 'lt IE 7' );	
	/*[endif]-*/
	
	
	/*-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -*/
	/*--[if lt IE 9] -*/
		wp_enqueue_script('utage-html5shivs', get_template_directory_uri() . '/js/html5shiv.min.js', array(), '3.7.2', false );
		wp_enqueue_script('utage-html5shiv-print', get_template_directory_uri() . '/js/html5shiv-printshiv.min.js', array(), '3.7.2', false );
		wp_enqueue_script('rutage-espondjs', get_template_directory_uri() . '/js/respond.min.js', array(), '1.4.2', false );

		wp_script_add_data('utage-html5shivs', 'conditional', 'lt IE 9' );
		wp_script_add_data('utage-html5shiv-print', 'conditional', 'lt IE 9' );
		wp_script_add_data('utage-respondjs', 'conditional', 'lt IE 9' );
	/*[endif]-*/
	wp_enqueue_script('utage-json2', get_template_directory_uri() . '/js/json2.js', array(), '1.0.0', false );
	wp_enqueue_script('utage-underscore', get_template_directory_uri() . '/js/underscore-min.js', array(), '1.7.0', false );
	wp_enqueue_script('utage-jquery', get_template_directory_uri() . '/js/jquery-1.11.2.min.js', array(), '1.11.2', false );
	wp_enqueue_script('utage-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', false );
	wp_enqueue_script('utage-knockout', get_template_directory_uri() . '/js/knockout-3.3.0.js', array(), '3.3.0', false );
	
	/*--[if lte IE 6]-*/
		wp_enqueue_script('utage-bsie', get_template_directory_uri() . '/js/bootstrap-ie.js', array(), '1.0.4', false );
	/*[endif]-*/


}
add_action( 'wp_enqueue_scripts', 'utage_scripts_styles' );

function utage_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'utage' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'utage_wp_title', 10, 2 );

// Remove Open Sans that WP adds from frontend
if (!function_exists('remove_wp_open_sans')) :
    function remove_wp_open_sans() {
        wp_deregister_style( 'open-sans' );
        wp_register_style( 'open-sans', false );
    }
     // 前台删除Google字体CSS
    add_action('wp_enqueue_scripts', 'remove_wp_open_sans');
    // 后台删除Google字体CSS
    add_action('admin_enqueue_scripts', 'remove_wp_open_sans');
endif;

add_filter( 'the_content_feed' ,'dw_readmore_rss' );
add_filter('the_excerpt_rss', 'dbt_custom_feed');
//在RSS 中Feed 输出支持“More”标签 devework.com
function dw_readmore_rss( $content ){
    $teaser = preg_split( '/<span id="(more-\d+)"><\/span>/', $content );
    $readmore = '<br/><p><a href="'.get_permalink().'">[  前往 '.get_bloginfo('name').' 阅读全文...  ]</a></p><hr/>';
    $cprightfeed = '<p></p>
                    <br/><span style="font-weight:bold;">版权声明：</span> 本文采用 <a rel="nofollow" href="http://creativecommons.org/licenses/by-nc-sa/3.0/" title="署名-非商业性使用-相同方式共享">BY-NC-SA</a> 协议进行授权 | '.get_bloginfo('name').' ，版权所有，转载请用明链标明本文地址。
                    <br/>
                    </p>
                    ';
    $content = $teaser[0].$readmore.$cprightfeed;
    return $content;
}

function dbt_custom_feed( $content ){
    $teaser = preg_split( '/<!--more-->/', $content );
    $readmore = '<br/><p><a href="'.get_permalink().'">[  前往 '.get_bloginfo('name').' 阅读全文...  ]</a></p><hr/>';
    $cprightfeed = '<p></p><span style="font-weight:bold;">原文链接：</span>来自 <a href="'.home_url().'">'.get_bloginfo('name').'</a> | <a rel="bookmark" title="'.get_the_title().'" href="'.get_permalink().'">'.get_permalink().'</a>
                    <br/><span style="font-weight:bold;">版权声明：</span> 本文采用 <a rel="nofollow" href="http://creativecommons.org/licenses/by-nc-sa/3.0/" title="署名-非商业性使用-相同方式共享">BY-NC-SA</a> 协议进行授权 | '.get_bloginfo('name').' ，版权所有，转载请用明链标明本文地址。
                    <br/>
                    </p>
                    ';
    //$content = $teaser[0].$readmore.$cprightfeed;
    $content = $teaser[0];
    return $content;
}


//~ 载入 Bootstrap 菜单类
require_once( get_template_directory() . '/inc/bootstrap_navwalker.php' );
require_once( get_template_directory() . '/inc/comment_walker.php' );

?>