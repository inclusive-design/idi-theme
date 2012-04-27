<div>
	<form class="idi-search-form" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	        <input class="idi-search-field" type="text" value="" name="s" id="s" placeholder="search"/>
	</form>

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
		<?php  endwhile; ?>
		<li>
			<!-- this still need the href -->
			<a href="#" class="idi-more">view archive</a>
		</li>
		<?php endif;
		wp_reset_query();
		?>
		</ul>

	</div>

	<div class="idi-mailing-list-reminder">
		<h3>Stay updated,<br/>join our mailing list:</h3>
		<?php get_template_part("mailing-list-form"); ?>
	</div>

	<?php get_template_part('tweets', 'aegisprog') ?>
	<?php get_template_part('tweets', 'SNOWocad') ?>
	<?php get_template_part('tweets', 'FluidProject') ?>
</div>