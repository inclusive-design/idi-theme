<?php
/*
Template Name: Research Page
*/
?>
<?php get_header(); ?>

<div class="fl-centered fl-col-mixed fl-site-wrapper">

	<div class="fl-col-fixed fl-force-right"> 	
		<?php get_sidebar('research'); ?>
	</div>

    <div class="fl-col-flex idi-one-column">
		<h1><?php the_title(); ?></h1>
		<?php the_post(); the_content(); ?> 
	</div>
	

<?php get_footer(); ?>
