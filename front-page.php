<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



<section id="home-hero">

</section>


<section id="main-content" class="large-padding bg-black">
	<div class="wrapper thin-wrapper">
		<?php the_content(); ?>
	</div>
</section>


<section id="magic-slider">

</section>


<section id="products" class="bg-white">

</section>


<section id="quote" class="bg-white">

</section>



<?php endwhile; endif; ?>
<?php get_footer(); ?>