<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">

<div style="background-image: url('<?php echo get_template_directory_uri().'/images/head_bg.png'; ?>');" class="headcontainer">
	<div class="container">
		<div class="cm_top"></div>
		<?php if ( get_header_image() ) : ?>
		<div id="site-header">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
			</a>
		</div>
		<?php endif; ?>

		<header id="masthead" role="banner" style="background: transparent url('<?php echo get_template_directory_uri()."/randompic.php" ?>') no-repeat scroll 62% top;">
			<div class="header-main hero">
				<div class="logo-wrap">
					<h1 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 id="site-description"><?php bloginfo('description'); ?></h2>
				</div>
			</div>

			<div class="navbar">
				<div class="navbar-inner primary-nav">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target="#nav-collapse-main">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</a>

						<div id="nav-collapse-main" class="collapse nav-collapse">		
							<?php 
								wp_nav_menu( array(
									'theme_location'    => 'primary',
									'depth'             => 0,
									'container'         => '',
									'container_class'   => '',
									'menu_class'        => 'nav navbar-nav',
									'items_wrap' 		=> '<ul class="%2$s">%3$s</ul>',
									'walker'            => new utage_Bootstrap_Menu()
								)	);
							?>	
							<form role="search" method="get" class="search-form navbar-form pull-right" action="<?php echo site_url(); ?>">
								<input type="search" class="search-field span2" placeholder="搜索…" value="" name="s" title="搜索：">
								<button type="submit" class="btn"><i class="icon icon-search"></i></button>
							</form>
						</div>

					</div>
				</div>
			</div>
		</header><!-- #masthead -->
	</div>	
</div>
<div class="container">
	<div id="main" class="site-main row-fluid">
