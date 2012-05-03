<?php
/*
Template Name: Research Cluster
*/
?>
<?php get_header(); ?>

<div class="fl-centered fl-col-mixed fl-site-wrapper idi-cluster">
<div class="idi-overlay idi-<?php echo $post->post_name; ?>-overlay">
</div>
	<div class="idi-cluster-leads fl-col-fixed fl-force-left"> 	

		<div class="idi-project-leads">
			<h3>Project leads</h3>
			<?php get_template_part("cluster-leads", $post->post_name); ?>
		</div>

	</div>

    <div class="fl-col-flex idi-one-column">

    	<div class="idi-breadcrumbs">
			<a href="/research">Research Clusters</a> > <?php the_title(); ?>
    	</div>

		<h2><?php the_title(); ?></h2>

		<?php get_template_part("cluster-projects", $post->post_name); ?>

		<div class="idi-cluster-description">
			<?php get_template_part("cluster-description", $post->post_name); ?>
		</div>
		
	</div>

</div>
		
<?php get_footer(); ?>
