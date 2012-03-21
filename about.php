<?php
/*
Template Name: About Page
*/
?>
<?php get_header(); ?>

<div class="fl-centered fl-col-mixed fl-site-wrapper">
	
	<div class="fl-col-fixed fl-force-left"> 	
		<?php get_sidebar('section-nav'); ?>
	</div>

    <div class="fl-col-flex idi-two-column">
		<h1><?php the_title(); ?></h1>
		<?php the_post(); the_content(); ?> 
	</div>

	<div class="fl-col-fixed fl-force-right"> 	
		<?php get_sidebar('about'); ?>
	</div>

</div>
		
<?php get_footer(); ?>
