<?php
function add_idi_files() {
	$baseurl = get_stylesheet_directory_uri();
	echo '<script type="text/javascript" src="' . $baseurl . '/idi.js" ></script>' . "\n";	
}
add_action('wp_head', 'add_idi_files');
?>