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
				<div class="idi-shadow-box post">
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

$twitter_feed_opts = ' followlink="no" num="1" linktotweet="no" tweetintent="no" img="no" tprefix="" tsuffix="ago" other=”yes” ulclass="twitter-list" liclass="twitter-tweet"';
?>

		<div class="fl-col">
			<div class="idi-shadow-box twitter-feed-group">
				<a class="twitter-follow-button" rel="external nofollow" href="http://twitter.com/aegisproj">@aegisproj</a>
				<?php echo do_shortcode('[twitter-feed username="aegisproj"' . $twitter_feed_opts . ']'); ?>
			</div>

			<div class="idi-shadow-box twitter-feed-group">
				<a class="twitter-follow-button" rel="external nofollow" href="http://twitter.com/SNOWocad">@SNOWocad</a>
				<?php echo do_shortcode('[twitter-feed username="SNOWocad"' . $twitter_feed_opts . ']'); ?>
			</div>

		</div>

		<div class="fl-col">
			<div class="idi-shadow-box twitter-feed-group">
				<a class="twitter-follow-button" rel="external nofollow" href="http://twitter.com/FluidProject">@FluidProject</a>
				<?php echo do_shortcode('[twitter-feed username="FluidProject"' . $twitter_feed_opts . ']'); ?>
			</div>

			<div class="idi-institutions idi-box">
				<h3>IDI Institutions</h3>
				<p>Find out more about their ongoing research</p>
				<ul class="idi-institution-list">
					<li><a href="http://ocadu.ca">OCAD University</a></li>
					<li><a href="http://ocadu.ca">Ryerson University</a></li>
					<li><a href="http://ocadu.ca">York University</a></li>
					<li><a href="http://ocadu.ca">UOIT</a></li>
					<li><a href="http://ocadu.ca">University of Toronto</a></li>
					<li><a href="http://ocadu.ca">Sheridan College</a></li>
					<li><a href="http://ocadu.ca">George Brown College</a></li>
					<li><a href="http://ocadu.ca">Seneca College</a></li>
				</ul>
				<h3>Contact us!</h3>
				<div class="idi-mailing-address">
					Inclusive Design Institute
					205 Richmond Street West
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
				<script type="text/javascript">
					function submitForm() {
						var listForm = $('#myForm');
						var listEmail = $('#listEmail').val();

						//validate for non-html5 browsers
						var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
					    if(reg.test(listEmail) == false) {
							alert("Invalid email");			//switch to accessible html?
						} else {
							$.ajax({
								url: listForm.attr('action'),
								type: listForm.attr('method'),
								data: {email: listEmail},
								success: function(email) {
									$("#listForm").html("<p>Success! " + email + " has been added to the mailing list. You should receive a confirmation email shortly.</p>"); 	
								}
							});

						}
						return false;
					}
				</script>
				<div class="idi-mailing-list">
					Mailing list sign up
					<form id="idiMailingListSignup" method="post" action="<?php bloginfo('stylesheet_directory'); ?>/mailinglist.php" onsubmit="return submitForm()">
						<input type="email" name="listEmail" id="listEmail" placeholder="Your email address" required />
					</form>
				</div>
			</div>
		</div>

 	</div> 	
 </div>
 
<?php get_footer(); ?>