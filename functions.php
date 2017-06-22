<?php
add_theme_support( 'post-thumbnails' );

// Override the default UIO strings
$uio_strings_custom = 'showText: "Preferences", hideText: "Preferences"';

// This site uses The Twitter Feed Wordpress Plugin found at
//     http://pleer.co.uk/wordpress/plugins/wp-twitter-feed/

$twitter_feed_opts = ' followlink="no" num="1" linktotweet="no" tweetintent="no" img="no" tprefix="" tsuffix="ago" other=”yes” ulclass="twitter-list" liclass="twitter-tweet"';

/**
 *  Add IDI-specific JS files to the header
 */
function add_idi_files() {
    $baseurl = get_stylesheet_directory_uri();

    // The font fix for Chrome and Firefox on windows
    // Lato font is too light to read with chrome on windows, use arial/helvetica instead
    $userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
    if (strpos($userAgent, "windows") && (strpos($userAgent, "chrome") || strpos($userAgent, "firefox"))) {
        echo '<link rel="stylesheet" type="text/css" media="all" href="'. $baseurl. '/style-windows.css" />'. "\n";
    }

    echo '<script type="text/javascript" src="' . $baseurl . '/lib/parallax-scrolling.js" ></script>' . "\n";
    echo '<script type="text/javascript" src="' . $baseurl . '/idi.js" ></script>' . "\n";
    echo '<!--[if lt IE 8]>'  . "\n";
    echo '<script type="text/javascript" src="' . $baseurl . '/idi-ltie8.js" ></script>' . "\n";
    echo '<![endif]-->'  . "\n";

}
add_action('wp_head', 'add_idi_files');

/**
 * Customize the 'more' link at the end of a post excerpt
 */
function idi_excerpt_more($more) {
    global $post;
    return '<p><a class="idi-more idi-no-tab-focus" title="'. $post->post_title .'" alt="'. $post->post_title .'" href="'. get_permalink($post->ID) . '">read article</a></p>';

}
add_filter('excerpt_more', 'idi_excerpt_more');

/**
 * Brand the login page with IDI-specific styling
 */
function brand_login_page() {
    echo '<link rel="stylesheet" type="text/css" media="all" href="'. get_stylesheet_directory_uri() .'/login-page.css" />';
    echo '<script type="text/javascript" src="' . get_template_directory_uri() .'/infusion/MyInfusion.js"></script>';
    echo '<script type="text/javascript">
        function loginalt() {
            var logoLink = $("#login a");
            logoLink.attr({
                href: "' . site_url() . '",
                title: "' . get_bloginfo('name') . '"
            });
        }
    window.onload=loginalt;
    </script>';
}
add_action('login_head', 'brand_login_page');

/**
 * Taken from the Wordpress Codex documentation for conditional tags
 * Determines if the current page or post is a descendent of the given page
 */
function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
    global $post;         // load details about this page
    $anc = get_post_ancestors( $post->ID );
    foreach($anc as $ancestor) {
        if(is_page() && $ancestor == $pid) {
            return true;
        }
    }
    if(is_page()&&(is_page($pid)))
               return true;   // we're at the page or at a sub page
    else
               return false;  // we're elsewhere
};

function idi_generate_top_nav() {
    $pages = get_pages( array ('parent' => '0', 'sort_column' => 'menu_order'));
    $out = "<ul>";
    foreach ( $pages as $pagg ) {
        $out .= '<li><a class="idi-nav-' . $pagg->post_name;
        if (is_tree($pagg->ID)) {
            $out .= ' current_page_item';
        }
        $out .= '" href="' . get_page_link($pagg->ID) . '">';
        $out .= $pagg->post_name . '</a></li>';
    }
    $out .= "</ul>";

    echo $out;
}

/**
 *  Removed the attribute id="content" that's inherited from the parent theme "wordpress-fss-theme"
 *  if the idi-theme template needs to have "skip to content" link leads to a more specific content
 *  section.
 */
function remove_parent_contentID() {
    echo '<script type="text/javascript">' . "\n";
    echo '$(document).ready(function () {' . "\n";
    echo '  $(".fl-site-main-body[id=\'content\']").removeAttr("id");' . "\n";
    echo '});' . "\n";
    echo '</script>' . "\n";
}


/**
 * Stay on login panel when login errors occur, instead of redirecting to login screen
 */
add_action( 'wp_login_failed', 'panel_login_fail' );  // hook failed login

function panel_login_fail( $username ) {
    $referrer = $_SERVER['HTTP_REFERER'];

    // if there's a valid referrer, and it's not the default log-in screen
    if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
        $referrer = explode('?', $referrer);
        parse_str($referrer[1], $referrer_args);
        unset($referrer_args['idilogout']);     //unset old idilogout arg if set
        $referrer_args['idilogin'] = "failed";     //let theme know there are errors

        wp_redirect( $referrer[0]."?".http_build_query($referrer_args) );
        exit;
    }
}

function idi_display_twitter_feed($twitter_un) {
    /*
    We use the oAuth Twitter plugin to help us get the twitter information.
    https://wordpress.org/plugins/oauth-twitter-feed-for-developers/
    */
    $num_tweets = 1;
    $tweets = getTweets($num_tweets, $twitter_un);

    echo '<div class="idi-box idi-highlight-box twitter-feed-group">
                <div class="idi-box-text">
                    <a class="twitter-follow-button" rel="external nofollow" href="http://twitter.com/'.$twitter_un.'" title="Follow @'.$twitter_un.'">@'.$twitter_un.'</a>
                    <ul>';
    foreach($tweets as $tweet){
        if($tweet['text']){
            $the_tweet = $tweet['text'];
            /*
            Format the Twitter information for output. This is a modified version of the source script. It's been changed to match our classnames and layout.
            Source: https://github.com/stormuk/storm-twitter-for-wordpress/wiki/Example-code-to-layout-tweets


            Convert Tweet Entities within the Tweet text to link to their URLs on Twitter. */

            // Convert User_mentions to link to user profiles.
            if(is_array($tweet['entities']['user_mentions'])){
                foreach($tweet['entities']['user_mentions'] as $key => $user_mention){
                    $the_tweet = preg_replace(
                        '/@'.$user_mention['screen_name'].'/i',
                        '<a href="http://www.twitter.com/'.$user_mention['screen_name'].'" target="_blank">@'.$user_mention['screen_name'].'</a>',
                        $the_tweet);
                }
            }

            // Convert hashtag text to link to hashtag queries.
            if(is_array($tweet['entities']['hashtags'])){
                foreach($tweet['entities']['hashtags'] as $key => $hashtag){
                    $the_tweet = preg_replace(
                        '/#'.$hashtag['text'].'/i',
                        '<a href="https://twitter.com/search?q=%23'.$hashtag['text'].'&src=hash" target="_blank">#'.$hashtag['text'].'</a>',
                        $the_tweet);
                }
            }

            // Convert URL text to proper links.
            if(is_array($tweet['entities']['urls'])){
                foreach($tweet['entities']['urls'] as $key => $link){
                    $the_tweet = preg_replace(
                        '`'.$link['url'].'`',
                        '<a href="'.$link['url'].'" target="_blank">'.$link['url'].'</a>',
                        $the_tweet);
                }
            }

            echo '<li class="tweet">'.$the_tweet;
            echo '<div class="tweet-date">
                      <a href="https://twitter.com/'.$twitter_un.'/status/'.$tweet['id_str'].'" target="_blank">
                          '.get_gmt_from_date ($tweet['created_at'], 'F jS, Y g:ia').'
                      </a>
                  </div></li>';
        } else {
            echo '<li><p>no tweets found</p></li>';
        }
    }

    echo '</ul></div></div>';
}
?>
