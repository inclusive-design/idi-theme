<?php
/*
Template Name: Research Cluster
*/
?>
<?php get_header(); ?>

<div class="fl-centered fl-col-mixed fl-site-wrapper idi-cluster">
	<div class="idi-underlay idi-<?php echo $post->post_name; ?>-underlay"></div>

	<aside class="idi-project-leads fl-col-fixed fl-force-left">
		<h3>Cluster leads</h3>
		<?php get_template_part("cluster-leads", $post->post_name); ?>
	</aside>

    <div class="fl-col-flex idi-one-column">
    	<section>
	    	<div class="idi-breadcrumbs">
				<a href="<?php echo get_home_url(); ?>/research">Back to Research Clusters</a>
	    	</div>
	
			<div id="content">
				<h2><?php the_title(); ?></h2>
		
				<div class="idi-cluster-description">
					<?php get_template_part("cluster-description", $post->post_name); ?>
				</div>

				<?php get_template_part("cluster-projects", $post->post_name); ?>
		
				<div class="idi-cluster-description fl-push">
					<?php get_template_part("cluster-description-extra", $post->post_name); ?>
				</div>
			</div>
		</section>
	</div>

</div>
		
<?php 
// Remove the id="content" attribute that is inherited from the parent theme "wordpress-fss-theme".
// This attribute/value pair is re-defined in this page.
remove_parent_contentID();

get_footer(); 
?>

