<?php
// This sidebar uses The Twitter Feed Wordpress Plugin found at
//     http://pleer.co.uk/wordpress/plugins/wp-twitter-feed/

$twitter_feed_opts = ' followlink="no" num="1" img="no" tprefix="" tsuffix="ago" other=”yes”';
?>

<div class="sidebar-tweets">
	<h2 class="widgettitle">Recent tweets</h2>
	<div>
		<div class="twitter-feed-group">
			<a class="twitter-follow-button" rel="external nofollow" href="http://twitter.com/aegisproj">@aegisproj</a>
			<?php echo do_shortcode('[twitter-feed username="aegisproj"' . $twitter_feed_opts . ']'); ?>	
		</div>
		
		<div class="twitter-feed-group">
			<a class="twitter-follow-button" rel="external nofollow" href="http://twitter.com/FluidProject">@FluidProject</a>
			<?php echo do_shortcode('[twitter-feed username="FluidProject"' . $twitter_feed_opts . ']'); ?>
		</div>
		
		<div class="twitter-feed-group">
			<a class="twitter-follow-button" rel="external nofollow" href="http://twitter.com/SNOWocad">@SNOWocad</a>
			<?php echo do_shortcode('[twitter-feed username="SNOWocad"' . $twitter_feed_opts . ']'); ?>
		</div>
	</div>
</div>
