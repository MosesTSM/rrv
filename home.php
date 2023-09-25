<?php get_header(); ?>



<?php 
/* Create variables to be used in Schema and Social Media Open Graph tags */
$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
$thumb_url = $thumb_url_array[0];

/* Facebook and Twitter Open Graph markup */ ?>
<meta property="og:site_name" content="Flo-rite Seed Firmers" />
<meta property="og:title" content="Products" />
<meta property="og:type" content="product.group" />
<meta property="og:image" content="<?php echo $thumb_url; ?>" />
<meta property="og:url" content="<?php bloginfo('url'); ?>/products/" />

<meta property="twitter:card" content="summary" />
<meta property="twitter:image" content="<?php echo $thumb_url; ?>" />



<section id="product-hotspots" class="small-padding">
	<div class="wrapper">
		<div class="product-highlights">
			<img class="product-highlight-img" src="<?php bloginfo('url'); ?>/wp-content/themes/florite/images/home-banner-crop-FR_FR100.png" alt="Flo-rite FR100" />
			<ul class="highlight-points">
				<li>On-Seed &amp; Y-Band Liquid Nozzles</li>
				<li>Protected Stainless Steel Liquid Tube</li>
				<li>Patent Pending Replaceable Wear Plate</li>
				<li>High Tech Memory Polymer Delivers Optimum Down Pressure</li>
			</ul>
		</div>
		<div class="product-bushel-acre">
			<h2>+6.4 <span>Bushel/Acre</span></h2>
		</div>
	</div>
</section>


<?php if ( have_posts() ) : ?>
	<section id="product-preview-banners" itemscope itemtype="https://schema.org/ItemList">
		<link itemprop="url" href="<?php bloginfo('url'); ?>/products/">
		<div class="wrapper">
			<h1 itemprop="name" class="xsmall-padding center-align"><?php single_post_title(); ?></h1>
		</div>

		<?php while ( have_posts() ) : the_post(); ?>

			<span itemprop="itemListElement" itemscope itemtype="https://schema.org/Product">
				<a class="product-preview-banner" href="<?php the_permalink(); ?>" itemprop="url">
					<div class="wrapper">
						<div class="product-preview-content">
							<h2 itemprop="name"><?php the_title(); ?></h2>
							<?php the_post_thumbnail(); ?>
						</div>
					</div>
					<div class="product-preview-filter"></div>
					<div class="product-preview-bg">
						<?php $bannerbg = get_field('product_banner_bg'); if( !empty( $bannerbg ) ): ?>
						    <img src="<?php echo esc_url($bannerbg['url']); ?>" alt="<?php echo esc_attr($bannerbg['alt']); ?>" />
						<?php else: ?>
							<img class="product-highlight-img" src="<?php bloginfo('url'); ?>/wp-content/themes/florite/images/product-banner-firmers.jpg" alt="crops growing in field" />
						<?php endif; ?>
					</div>
				</a>
			</span>

		<?php endwhile; ?>
	</section>
<?php endif; wp_reset_postdata(); ?>


<?php get_footer(); ?>