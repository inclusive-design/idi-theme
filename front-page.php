<?php
/*
Template Name: Front Page
*/
?>

<?php get_header(); ?>
	
<div class="fl-centered fl-col-mixed fl-site-wrapper">
	<nav role="navigation" class="idi-research-clusters fl-centered fl-clearfix">
		<div class="idi-research-cluster idi-dev-cluster">
			<a href="design-and-development"> <div class="idi-dev-cluster-circle"></div> </a>
			<div class="idi-cluster-arrow idi-dev-cluster-arrow"> </div>
			<a class="idi-cluster-name idi-dev-cluster-name" href="design-and-development"> Design & Development</a>
		</div>
		<div class="idi-research-cluster idi-info-cluster">
			<a class="idi-cluster-name idi-info-cluster-name" href="implementation-and-information-practices"> Information & Implementation Practices</a>
			<div class="idi-cluster-arrow idi-info-cluster-arrow"> </div>
			<a href="implementation-and-information-practices"> <div class="idi-info-cluster-circle"></div> </a>
		</div>
		<div class="idi-research-cluster idi-policy-cluster">
			<a href="design-and-development"> <div class="idi-policy-cluster-circle"></div> </a>
			<div class="idi-cluster-arrow idi-policy-cluster-arrow"> </div>
			<a class="idi-cluster-name idi-policy-cluster-name" href="design-and-development"> Business Case, Policies, Standards & Legislation</a>
		</div>
		<div class="idi-research-cluster idi-mobile-cluster">
			<a href="design-and-development"> <div class="idi-mobile-cluster-circle"></div> </a>
			<div class="idi-cluster-arrow idi-mobile-cluster-arrow"> </div>
			<a class="idi-cluster-name idi-mobile-cluster-name" href="design-and-development"> Moble & Pervasive Computing</a>
		</div>

	</nav>

	<div class="fl-col-flex4 front-cols">
		<?php
		$the_query = new WP_Query( array('posts_per_page'=>2) ); 
		while ($the_query->have_posts()): 
			$the_query->the_post(); 		
			global $more; 
			$more = 0; 
			?>
			<div class="fl-col">
				<div class="idi-box idi-highlight-box post">
					<?php if(has_post_thumbnail()) {
						the_post_thumbnail();
					} ?>
					<div class="idi-box-text">
					    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				        <div class="idi-date"><?php the_time('F jS, Y') ?></div>
			            <div class="entry">
			                <?php the_excerpt(); ?>
			            </div>
					</div>
				</div>
			</div>
 		<?php endwhile; ?>

		<div class="fl-col">
			<?php get_template_part('tweets', 'aegisprog') ?>
			<?php get_template_part('tweets', 'SNOWocad') ?>

		</div>

		<div class="fl-col">
			<?php get_template_part('tweets', 'FluidProject') ?>

			<div class="idi-box idi-institutions">
				<div class="idi-box-text">
					<?php get_template_part("institution-list"); ?>
					<?php get_template_part("contact-info"); ?>
					<div class="idi-mailing-list">
						Mailing list sign up
						<?php get_template_part("mailing-list-form"); ?>
					</div>
				</div>
			</div>
		</div>

 	</div> 	
 </div>
 
<?php get_footer(); ?>