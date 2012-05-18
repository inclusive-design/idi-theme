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
	echo '<script type="text/javascript" src="' . $baseurl . '/lib/parallax-scrolling.js" ></script>' . "\n";
	echo '<script type="text/javascript" src="' . $baseurl . '/idi.js" ></script>' . "\n";	
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
    echo '	$(".fl-site-main-body[id=\'content\']").removeAttr("id");' . "\n";
    echo '});' . "\n";
	echo '</script>' . "\n";
}

?>
