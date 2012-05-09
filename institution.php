<?php
/*
Template Name: Institution
*/
?>
<?php get_header(); ?>

<div class="fl-centered fl-site-wrapper fl-col-mixed idi-institution">
	<aside class="fl-col-fixed fl-force-left">
			<?php get_sidebar($post->post_name); ?>
	</aside>


	<div class="fl-col-flex idi-one-column">
		<?php
			$page_data = get_page(get_the_ID());
			echo '<h1>'. $page_data->post_title .'</h1>';
		?>

		<div class="idi-inst-content">
			<?php
				echo apply_filters('the_content', $page_data->post_content);
			?>
		</div>
</div>

<?php get_footer(); ?>
