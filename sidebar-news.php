<div>
	<?php get_template_part('searchform'); ?>

	<div class="idi-article-list">
		<h3>Newest articles</h3>
		<ul>
		<?php
		query_posts('posts_per_page=5'); // query to show all posts independant from what is in the center;
		if (have_posts()) :
		   while (have_posts()) :
		      the_post(); ?>
		<li>
		      <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</li>
		<?php
			endwhile;
		endif;
		wp_reset_query();
		?>
		</ul>

	</div>

	<?php get_template_part("mailing-list-form"); ?>

	<?php get_template_part('tweets', 'aegisprog') ?>
	<?php get_template_part('tweets', 'SNOWocad') ?>
	<?php get_template_part('tweets', 'FluidProject') ?>
</div>