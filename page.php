<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



<?php get_template_part('inc/rich-snippets'); ?>


<?php if( '' !== get_post()->post_content ) { ?>
	<section id="main-content" class="small-padding long-text">		
		<div class="wrapper thin-wrapper">
			<h1><?php the_title(); ?></h1>
	        <?php the_content(); ?>
	    </div>
	</section>
<?php } ?>



<?php endwhile; endif; ?>
<?php get_footer(); ?>