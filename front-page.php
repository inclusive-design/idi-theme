<?php
/*
Template Name: Front Page
*/
?>

<?php get_header(); ?>
	
<div class="fl-centered fl-col-mixed fl-site-wrapper">
	<div class="idi-name">Inclusive Design Institute</div>
	<div class="fl-col-flex3 front-cols">
		<nav role="navigation" id="research-clusters" class="fl-centered fl-clearfix">
			<ul id="menu-research-clusters" class="nav">
				<li>
					<a href="design-and-development"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/cluster-logo.png"/> Design & Development</a>
				</li>
				<li>
					<a href="implementation-and-information-practices/"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/cluster-logo.png"/> Implementation & Information Practices</a>
				</li>
				<li>
					<a href="business-case-policies-standards-and-legislation/"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/cluster-logo.png"/> Business Case, Policies, Standards & Legislation</a>
				</li>
				<li>
					<a href="mobile-and-pervasive-computing/"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/cluster-logo.png"/> Mobile & Pervasive Computing</a>
				</li>
			</ul>
		</nav>

		<div class="fl-col">
			<?php get_sidebar('tweets'); ?>
		</div>

		<?php
		$the_query = new WP_Query( array('posts_per_page'=>2) ); 
		while ($the_query->have_posts()): 
			$the_query->the_post(); 		
			global $more; 
			$more = 0; 
		?>
		<div class="fl-col post">
		    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	        <div class="date"><?php the_time('F jS, Y') ?></div>
            <div class="entry">
                <?php the_excerpt(); ?>
            </div>
 		</div>
 		<?php endwhile; ?>

 	</div> 	
 </div>
 
<?php get_footer(); ?>