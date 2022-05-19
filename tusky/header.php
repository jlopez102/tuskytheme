<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tusky
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&display=swap" rel="stylesheet">
	 <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js" integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
	 
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-barba="wrapper">
<div class="load-container">
            <div class="loading-screen"></div>
</div>
        
<div class="loader"></div>
<?php wp_body_open(); ?>
<div id="page" class="site">
		<header id="masthead" class="site-header">
	
		<div class="menu" id="menu">
		<button class="nav-trigger" id="nav-trigger"><span></span></button>
		<nav id="site-navigation" class="main-navigation">
			
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
		<div class="logo">
			<a href="<?php bloginfo('url'); ?>">TUSK</a>
		</div>
		</div>
	</header><!-- #masthead -->
	<div class="cursor cursor--small"></div>
