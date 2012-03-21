<?php get_header(); ?>
	
<div class="fl-centered fl-col-mixed fl-site-wrapper">
	<nav role="navigation" id="research-clusters" class="fl-centered fl-clearfix">
		<ul id="menu-research-clusters" class="nav">
			<li>
				<a href="design-and-development"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/cluster-logo.png"/> Design and Development</a>
			</li>
			<li>
				<a href="implementation-and-information-practices/"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/cluster-logo.png"/> Implementation and Information Practices</a>
			</li>
			<li>
				<a href="business-case-policies-standards-and-legislation/"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/cluster-logo.png"/> Business Case, Policies, Standards and Legislation</a>
			</li>
			<li>
				<a href="mobile-and-pervasive-computing/"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/cluster-logo.png"/> Mobile and Pervasive Computing</a>
			</li>
		</ul>				
	</nav>
 	
	<div class="fl-col-flex3 front-cols">
		<?php 

		$the_query = new WP_Query( array('posts_per_page'=>2) ); 
		while ($the_query->have_posts()): 
			$the_query->the_post(); 		
			global $more; 
			$more = 0; 
		?>
 		<div class="fl-col post"> 						
			<?php		
			echo '<h2 class="fl-font-size-130">';
			the_title();
			echo '</h2>';			
			echo '<div class="date">';
			the_time('F jS, Y');
			echo '</div>';
			the_content("<div class='fl-site-read-more'>More</div>");
			?>
 		</div>
 		<?php endwhile; ?>

 		<div class="fl-col"> 	
 			<?php get_sidebar('tweets'); ?>
 		</div>
 	</div> 	
 </div>
 
<?php get_footer(); ?>