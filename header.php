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


<body>


	<div class="mobile-overlay">
		<div class="close-nav">
			<span></span>
			<span></span>
		</div>
	</div>
	<div class="overlay-menu">
		<a href="<?php the_permalink(); ?>/about/">About Us</a>
		<a href="#footer">Get in Touch</a>
		<a href="https://thunderstruckag.com/category/products/rrv-canola-disk/" target="_blank">Shop Now</a>
		<?php if( get_field('phone','option') ): ?>
			<a href="tel:<?php the_field('phone','option'); ?>"><?php the_field('phone','option'); ?></a>
		<?php endif; ?>
	</div>


	<div id="container">
		<header>
			<nav>
				<a class="nav-item" href="<?php the_permalink(); ?>/about/">About Us</a>
				<a class="nav-item" href="#footer">Get in Touch</a>
				<a href="<?php bloginfo('url'); ?>/" class="header-logo-link">
					<?php get_template_part('inc/logo'); ?>
				</a>
				<a class="nav-item" href="https://thunderstruckag.com/category/products/rrv-canola-disk/" target="_blank">Shop Now</a>
				<?php if( get_field('phone','option') ): ?>
					<a class="nav-item" href="tel:<?php the_field('phone','option'); ?>"><?php the_field('phone','option'); ?></a>
				<?php endif; ?>
			</nav>

			<div class="hamburger">
				<div class="bun-top"></div>
				<div class="meat"></div>
				<div class="bun-bottom"></div>
			</div>
		</header>

		<main>