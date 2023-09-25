<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php wp_title() ?></title>
	
	<meta charset="utf-8">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="540">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-PV5KBQH');</script>
	<!-- End Google Tag Manager -->

	<?php wp_head(); ?> <!-- Retrieves the css from functions file -->

	<!-- mobile address bar colour -->
	<meta name="theme-color" content="#ffffff">
	<meta name="msapplication-navbutton-color" content="#ffffff">
	<meta name="apple-mobile-web-app-capable" content="no">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

	<?php get_template_part('inc/rich-snippets'); ?>
</head>


<body <?php body_class($post->post_name); ?> >


	<div class="mobile-overlay">
		<div class="close-nav">
			<span></span>
			<span></span>
		</div>
	</div>
	<div class="overlay-menu">
		<?php $defaults = array(
			'container' => false,
			'theme_location' => 'primary-nav',
			'menu_id' => 'mobile-main-menu'
		);
		wp_nav_menu( $defaults ); ?>
	</div>


	<div id="container">
		<header>
			<a href="<?php bloginfo('url'); ?>/" class="header-logo-link">
				<?php get_template_part('inc/logo'); ?>
			</a>

			<nav>
				<?php
					$defaults = array(
						'container' => false,
						'theme_location' => 'primary-nav',
						'menu_id' => 'main-menu'
					);

					wp_nav_menu( $defaults );
				?>
			</nav>

			<div class="hamburger">
				<div class="bun-top"></div>
				<div class="meat"></div>
				<div class="bun-bottom"></div>
			</div>
		</header>

		<main>