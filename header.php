<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php
			/*
			 * Print the <title> tag based on what is being viewed.
			 * We filter the output of wp_title() a bit -- see
			 * twentyten_filter_wp_title() in functions.php.
			 */
			wp_title( '|', true, 'right' );
		
			?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" rel="shortcut icon">	
		<link href='<?php bloginfo('template_directory'); ?>/images/favicon.png' rel='icon' type='image/png'>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<!--[if lt IE 9]>
			<script src="<?php bloginfo('template_directory'); ?>/javascripts/html5.js"></script>
		<![endif]-->
		<script src="<?php bloginfo('template_directory'); ?>/javascripts/jquery.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/javascripts/minigrid.js"></script>
		<?php
			/* We add some JavaScript to pages with the comment form
			 * to support sites with threaded comments (when in use).
			 */
			if ( is_singular() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );
		
			/* Always have wp_head() just before the closing </head>
			 * tag of your theme, or you will break many plugins, which
			 * generally use this hook to add elements to <head> such
			 * as styles, scripts, and meta tags.
			 */
			wp_head();
		?>
	</head>

	<body <?php body_class(); ?>>
		<div class="wrap">
			<header>
				<h1>
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>
				<p><?php bloginfo( 'description' ); ?></p>
			</header>
			<nav id="access" role="navigation">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
			</nav>
			<section id="main">