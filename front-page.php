<?php
/*
Template Name: Front Page
*/
?>

<?php get_header(); ?>
	
<div class="fl-centered fl-col-mixed fl-site-wrapper">
	<nav role="navigation" class="idi-research-clusters fl-centered fl-clearfix">
		<div class="idi-clusters-overlay"></div>

		<a class="idi-design-cluster-circle idi-cluster-circle-link idi-design-link idi-no-tab-focus" href="research/design" title="Design & Development"></a>
		<div class="idi-cluster-circle idi-design-cluster-circle idi-design-cluster-circle-colour"></div>
		<div class="idi-cluster-arrow idi-design-cluster-arrow"> </div>
		<a class="idi-cluster-name idi-design-cluster-name" href="research/design">Design & Development</a>

		<a class="idi-implementation-cluster-circle idi-implementation-link idi-cluster-circle-link idi-no-tab-focus" href="research/implementation" title="Implementation & Information Practices"></a>
		<div class="idi-cluster-circle idi-implementation-cluster-circle idi-implementation-cluster-circle-colour"></div>
		<div class="idi-cluster-arrow idi-implementation-cluster-arrow"> </div>
		<a class="idi-cluster-name idi-implementation-cluster-name" href="research/implementation">Implementation & Information Practices</a>

		<a class="idi-policies-cluster-circle idi-policies-link idi-cluster-circle-link idi-no-tab-focus" href="research/policies" title="Business Case, Policies, Standards & Legislation"></a>
		<div class="idi-cluster-circle idi-policies-cluster-circle idi-policies-cluster-circle-colour"></div>
		<div class="idi-cluster-arrow idi-policies-cluster-arrow"> </div>
		<a class="idi-cluster-name idi-policies-cluster-name" href="research/policies">Business Case, Policies, Standards & Legislation</a>

		<a class="idi-mobile-cluster-circle idi-mobile-link idi-cluster-circle-link idi-no-tab-focus" href="research/mobile" title="Mobile & Pervasive Computing"></a>
		<div class="idi-cluster-circle idi-mobile-cluster-circle idi-mobile-cluster-circle-colour"></div>
		<div class="idi-cluster-arrow idi-mobile-cluster-arrow"> </div>
		<a class="idi-cluster-name idi-mobile-cluster-name" href="research/mobile">Mobile & Pervasive Computing</a>
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
					    <h2><a class="idi-article-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				        <div class="idi-date"><?php the_time('F jS, Y') ?></div>
			            <div class="entry">
			                <?php the_excerpt(); ?>
			            </div>
					</div>
				</div>
			</div>
 		<?php endwhile; ?>

		<div class="fl-col">
			<?php get_template_part('tweets', 'FluidProject') ?>
			<?php get_template_part('tweets', 'SNOWocad') ?>

		</div>

		<div class="fl-col">
			<div class="idi-box">
				<div class="idi-mailing-list">
					<?php get_template_part("mailing-list-form"); ?>
				</div>
				<div class="idi-box idi-box-text">
					<?php get_template_part("institution-list"); ?>
					<?php get_template_part("contact-info"); ?>
				</div>
			</div>
		</div>

 	</div> 	
 </div>
 
<?php get_footer(); ?>