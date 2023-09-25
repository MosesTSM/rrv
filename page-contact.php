<?php /* Template Name: Contact */ ?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>




<?php if( '' !== get_post()->post_content ) { ?>
	<section id="main-content" class="screen-height no-padding long-text">		
        <?php the_content(); ?>
	</section>
<?php } ?>



<?php endwhile; endif; ?>
<?php get_footer(); ?>