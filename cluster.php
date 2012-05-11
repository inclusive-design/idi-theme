<?php
/*
Template Name: Research Cluster
*/
?>
<?php get_header(); ?>

<div class="fl-centered fl-col-mixed fl-site-wrapper idi-cluster">
	<div class="idi-underlay idi-<?php echo $post->post_name; ?>-underlay"></div>

	<aside class="idi-project-leads fl-col-fixed fl-force-left">
		<h3>Project leads</h3>
		<?php get_template_part("cluster-leads", $post->post_name); ?>
	</aside>

    <section class="fl-col-flex idi-one-column">
    	<div class="idi-breadcrumbs">
			<a href="/research">&lt; Back to Research Clusters</a>
    	</div>

		<h2><?php the_title(); ?></h2>

		<?php get_template_part("cluster-projects", $post->post_name); ?>

		<div class="idi-cluster-description">
			<?php get_template_part("cluster-description", $post->post_name); ?>
		</div>
	</section>

</div>
		
<?php get_footer(); ?>
