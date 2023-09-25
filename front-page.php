<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<div id="scroll-snap">
	<section id="home-hero" class="screen-height bg-black">
		<video id="storm-video" autoplay playsinline muted loop>
			<source src="<?php bloginfo('url'); ?>/wp-content/themes/tsm2023/videos/home-banner-bg.mp4" type="video/mp4" />
			<source src="<?php bloginfo('url'); ?>/wp-content/themes/tsm2023/videos/home-banner-bg.webm" type="video/webm" />
		</video>

		<h1><span>Leave Your Customers</span> Thunderstruck</h1>
		<div id="title-flare"><span>Leave Your Customers</span> Thunderstruck</div>

		<a href="#mfg-map" id="mouse-scroller-icon">
			<div class="scroller-mouse"></div>
			<div class="mouse-scroll-dot"></div>
		</a>
	</section>




	<section id="mfg-map" class="screen-height">
		<div class="dot-map-heading">
			<h2 id="dot-map-title">Global Reach</h2>
		</div>

		<div class="dot-map-container">
			<div class="dot-map-wrapper">
				<div class="dot-map-popups">

				</div>
				<?php get_template_part('inc/dot-map'); ?>
			</div>
		</div>

		<div class="flags-container">
			<div class="flag-group territories">
				<h3><span>Thunderstruck</span> Situated In</h3>
				<div class="flags">
					<span class="flag"><?php include 'images/flags/ca.svg' ?></span>
					<span class="flag"><?php include 'images/flags/us.svg' ?></span>
					<span class="flag"><?php include 'images/flags/au.svg' ?></span>
				</div>
			</div>

			<div class="flag-group sold-to">
				<h3><span>Equipment</span> Sold To</h3>
				<div class="flags">
					<span class="flag"><?php include 'images/flags/fr.svg' ?></span>
					<span class="flag"><?php include 'images/flags/de.svg' ?></span>
					<span class="flag"><?php include 'images/flags/lt.svg' ?></span>
					<span class="flag"><?php include 'images/flags/ee.svg' ?></span>
					<span class="flag"><?php include 'images/flags/bo.svg' ?></span>
					<span class="flag"><?php include 'images/flags/br.svg' ?></span>
					<span class="flag"><?php include 'images/flags/ug.svg' ?></span>
					<span class="flag"><?php include 'images/flags/za.svg' ?></span>
				</div>
			</div>
		</div>
	</section>



	<?php $query_args = array(
	    'post_type'     => 'post',
	    'category_name' => 'mfgs',
	    'meta_query'    => array(
	    	array(
	            'key'       => 'show_on_home_page',
	            'value'     => 'yes',
	            'compare'   => 'IN',
	        )
	    ),
	    'posts_per_page' => 100,
	    'orderby'        => 'rand',
	);
	$the_query = new WP_Query( $query_args ); if( $the_query->have_posts() ): 
	$postid = $post->ID; ?>
	    <section id="manufacturers" class="screen-height bg-white">
	    	<div class="home-section-content">
			    <div class="wrapper">
			        <div class="section-header">
		        		<h2>Manufacturer's We Represent</h2>
		        	</div>
		        </div>

	        	<div class="mfg-thread xsmall-padding-top">
	        		<div class="mfg-thread-logos">
			        	<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
			        		<div class="mfg-logo-container">
			            		<?php the_post_thumbnail(); ?>
			                </div>
			            <?php endwhile; ?>
			        </div>
		        </div>

		        <div class="mfg-excerpts">
		        	<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
		        		<div class="mfg-excerpt">
		        			<div class="mfg-excerpt-content">
			            		<?php $mfgIMG = get_field('home_mfg_image'); if( !empty( $mfgIMG ) ): ?>
				            		<div class="mfg-excerpt-image">
										<img src="<?php echo esc_url($mfgIMG['url']); ?>" alt="<?php echo esc_attr($mfgIMG['alt']); ?>" />
									</div>
								<?php endif; ?>
								<div class="mfg-excerpt-info">
									<?php $tags = get_the_tags($post->ID); if ( $tags ): ?>
										<div class="tags mfg-tags">
									        <?php foreach ( $tags as $tag ): $term = get_queried_object(); ?>
									            <span class="tag mfg-tag" style="background: <?php the_field('highlight', 'term_'.$tag->term_id); ?>;">
									            	<?php echo esc_html( $tag->name ); ?>
									            </span>
									        <?php endforeach; ?>
									    </div>
								    <?php endif; ?>

									<div class="mfg-excerpt-text">
										<?php the_field('home_writeup'); ?>
									</div>
								</div>
							</div>
		                </div>
		            <?php endwhile; ?>
		        </div>
			</div>
		</section>
	<?php endif; wp_reset_query(); ?>
</div>



<?php endwhile; endif; ?>
<?php get_footer(); ?>