<?php
/*
Template Name: Equipment List Details
*/
?>
<?php get_header(); ?>
<?php if(have_posts()) { the_post(); } ?>
<div class="fl-centered fl-col-mixed fl-site-wrapper idi-equipment">
    <div class="fl-col-fixed fl-force-left">
        <?php get_sidebar('equipment');?>
        <?php get_sidebar('equipment-categories');?>
    </div>
    <div id="content" class="fl-col-flex idi-two-column">
    	<div class="idi-breadcrumbs">
			<a href="<?php echo get_home_url(); ?>/booking/equipment">Back to Equipment</a>
    	</div>
		<h2><?php the_title(); ?></h2>
        
		<?php the_content(); ?>
	</div>

</div> 
<?php get_footer(); ?>
