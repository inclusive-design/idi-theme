<?php

/*
Feeds must be authenticated for twitter API 1.1. Do the following, then enter the values
for the valiable below:

1) Register at https://dev.twitter.com/apps/new and create a new app.

2) After registering, fill in App name, e.g. "_domain name_ App",
description, e.g "My Twitter App", and write the address of your
website. Check "I agree" next to their terms of service and click
"create your Twitter application"

3) After this you app will be created. Click "Create my access token"
and you should see at the bottom "access token" and "access token
secret". Refresh the page if you don't see them.

4) Copy to module settings "Consumer key", "Consumer secret", "Access
token" and "Access secret"

*/

    require_once("wp-content/plugins/twitteroauth/twitteroauth/twitteroauth.php");
    $twitter_un = "SNOWocad";
    $num_tweets = 3;
    $consumerkey = "fHDGIckUSPpd4koYiBVOw";
    $consumersecret = "I3KKfzDT34eR9TXekZsXod750SdC2JydGVKj0ZFlU";
    $accesstoken = "199785294-UB4hnT6tsbbRD2bKSUGNgryPnS4hDJjtQpPtFGx7";
    $accesstokensecret = "kcXrb0WzyUYijk97u1RdFrG7hSS5vpyUbWxpfls";
    $connection = new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
    $tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitter_un."&count=".$num_tweets);
    //print_r($tweets);
?>
			
			<div class="idi-box idi-highlight-box twitter-feed-group">
				<div class="idi-box-text">
					<a class="twitter-follow-button" rel="external nofollow" href="http://twitter.com/FluidProject" title="Follow @FluidProject">@FluidProject</a>
					<ul>     <?php   
					$tweets = array_filter($tweets);
					if(!empty($tweets)){
					        foreach($tweets as $tweet) {
                                echo '<li class="even">'.$tweet->text.'<br><a href="https://twitter.com/intent/retweet?tweet_id='.$tweet->id.'">retweet</a><hr style="height:1px;"></li>';
                                
                            } 
                    } else{
                        echo "<p>no tweets found</p>";
                    }
                          ?>
                    </ul>
				</div>
			</div>