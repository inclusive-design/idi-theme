<?php
/*
Template Name: Institution
*/
?>
<?php get_header(); ?>

<div class="fl-centered fl-col-mixed fl-site-wrapper">
	<?php
		$page_data = get_page(get_the_ID());
		echo '<h1>'. $page_data->post_title .'</h1>';
		echo apply_filters('the_content', $page_data->post_content);
	?>
</div>
		
<?php get_footer(); ?>
