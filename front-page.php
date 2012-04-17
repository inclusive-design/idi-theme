<?php
/*
Template Name: Front Page
*/
?>

<?php get_header(); ?>
	
<div class="fl-centered fl-col-mixed fl-site-wrapper">
	<nav role="navigation" id="research-clusters" class="fl-centered fl-clearfix">
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
				<div class="box post">
				    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			        <div class="date"><?php the_time('F jS, Y') ?></div>
		            <div class="entry">
		                <?php the_excerpt(); ?>
		            </div>
				</div>
			</div>
 		<?php endwhile; ?>

<?php
// This page uses The Twitter Feed Wordpress Plugin found at
//     http://pleer.co.uk/wordpress/plugins/wp-twitter-feed/

$twitter_feed_opts = ' followlink="no" num="1" img="no" tprefix="" tsuffix="ago" other=”yes”';
?>

		<div class="fl-col">
			<div class="box twitter-feed-group">
				<a class="twitter-follow-button" rel="external nofollow" href="http://twitter.com/aegisproj">@aegisproj</a>
				<?php echo do_shortcode('[twitter-feed username="aegisproj"' . $twitter_feed_opts . ']'); ?>
			</div>

			<div class="box twitter-feed-group">
				<a class="twitter-follow-button" rel="external nofollow" href="http://twitter.com/FluidProject">@FluidProject</a>
				<?php echo do_shortcode('[twitter-feed username="FluidProject"' . $twitter_feed_opts . ']'); ?>
			</div>

		</div>

		<div class="fl-col">
			<div class="box twitter-feed-group">
				<a class="twitter-follow-button" rel="external nofollow" href="http://twitter.com/SNOWocad">@SNOWocad</a>
				<?php echo do_shortcode('[twitter-feed username="SNOWocad"' . $twitter_feed_opts . ']'); ?>
			</div>

			<div>
				IDI Institution list,
				contact us,
				<div class="idi-mailing-list">
					<div id="listForm">
						<div>
							Stay updated with our mailing list
						</div>
						<form id="myForm" method="post" action="<?php bloginfo('stylesheet_directory'); ?>/mailinglist.php" onsubmit="return submitForm()">
							<input type="email" name="listEmail" id="listEmail" placeholder="your email address" required />
							<input type="submit" value="submit" />
						</form>
					</div>
				</div>
			</div>
		</div>

 	</div> 	
 </div>
 
<?php get_footer(); ?>