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
					<h3>IDI Institutions</h3>
					<p>Find out more about their ongoing research</p>
					<ul class="idi-institution-list">
						<li><a href="about/ocadu">OCAD University</a></li>
						<li><a href="ryerson">Ryerson University</a></li>
						<li><a href="about/york">York University</a></li>
						<li><a href="about/uoit">UOIT</a></li>
						<li><a href="about/utoronto">University of Toronto</a></li>
						<li><a href="about/sheridan">Sheridan College</a></li>
						<li><a href="about/george-brown">George Brown College</a></li>
						<li><a href="about/seneca">Seneca College</a></li>
					</ul>
					<h3>Contact us!</h3>
					<div class="idi-mailing-address">
						Inclusive Design Institute
						<a href="http://maps.google.com/maps?q=205+Richmond+Street+West,+Toronto,+ON,+Canada&hl=en&sll=37.0625,-95.677068&sspn=40.137381,47.8125&oq=205+richmon&hnear=205+Richmond+St+W,+Toronto,+Toronto+Division,+Ontario+M5V+1V6,+Canada&t=m&z=16">
							205 Richmond Street West</a>
						2nd Floor
						Toronto, ON M5V 1V3
						Canada
					</div>
					<div class="idi-phone">
						(416) 977-6000, x3968
					</div>
					<div class="idi-email">
						<a href="mailto:idi@ocadu.ca">idi@ocadu.ca</a>
					</div>
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