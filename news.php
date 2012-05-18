<?php
/*
Template Name: News
*/
?>
<?php get_header(); ?>

<div class="fl-centered fl-col-mixed fl-site-wrapper">

	<div class="fl-col-fixed fl-force-left">
		<?php get_sidebar('news'); ?>
	</div>

	<div id="content" class="fl-col-flex idi-news-summary idi-one-column">
		<?php query_posts( 'posts_per_page=5' );
			  if(have_posts()) :
				while(have_posts()) : the_post(); ?>
				<div class="idi-box idi-highlight-box post">
					<?php the_post_thumbnail(); ?>
					<div class="idi-box-text">
						<h2><a class="idi-article-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="idi-date"><?php the_time('F jS, Y') ?></div>
						<div class="entry">
							<?php the_excerpt(); ?>
						</div>
					</div>
				</div>
				<?php endwhile;
				wp_reset_query();
			endif; ?>
	</div>

</div>
		
<?php 
// Remove the id="content" attribute that is inherited from the parent theme "wordpress-fss-theme".
// This attribute/value pair is re-defined in this page.
remove_parent_contentID();

get_footer(); 
?>
