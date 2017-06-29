<?php
add_theme_support( 'post-thumbnails' );

// Override the default UIO strings
$uio_strings_custom = 'showText: "Preferences", hideText: "Preferences"';

// The number of tweets to display on a twitter feed.
define ('TWEET_COUNT', 3);

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
        unset($referrer_args['idilogout']); 	//unset old idilogout arg if set
        $referrer_args['idilogin'] = "failed"; 	//let theme know there are errors

        wp_redirect( $referrer[0]."?".http_build_query($referrer_args) );
        exit;
    }
}

function idi_display_twitter_feed($twitter_username) {

    /* Use the "oAuth Twitter for Developers" plugin to get the Twitter feed.
       https://en-ca.wordpress.org/plugins/oauth-twitter-feed-for-developers/ */
    if (function_exists('getTweets')) {
        $tweets = getTweets($twitter_username, TWEET_COUNT);

        if (empty($tweets[error])) {
            $out = '<div class="idi-box idi-highlight-box twitter-feed-group"><div class="idi-box-text"><a class="twitter-follow-button" rel="external nofollow" href="http://twitter.com/';
            $out .= $twitter_username.'" title="Follow @'.$twitter_username.'">@'.$twitter_username.'</a><ul>';
            if (!empty($tweets)) {
                foreach ($tweets as $tweet) {
                    $out .= '<li class="tweet"><div class="tweet-date">'.substr($tweet[created_at], 0, 16).'</div>'.$tweet[text].'</li>';
                }
            } else {
                $out .= '<p>no tweets found</p>';
            }
            $out .= '</ul></div></div>';
            echo $out;
        }
    }
}

?>
