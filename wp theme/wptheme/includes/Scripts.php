<?php

function AddScripts()
{
	$path = get_template_directory_uri();
	wp_enqueue_script('jquery-js',$path . '/assets/js/jquery.min.js', array(), rand(111,9999), 'all');
	wp_enqueue_script('scrolly-js',$path . '/assets/js/jquery.scrolly.min.js', array(), rand(111,9999), 'all');
	wp_enqueue_script('scrollex-js',$path . '/assets/js/jquery.scrollex.min.js', array(), rand(111,9999), 'all');
	wp_enqueue_script('skel-js',$path . '/assets/js/skel.min.js', array(), rand(111,9999), 'all');
	wp_enqueue_script('util-js',$path . '/assets/js/util.js', array(), rand(111,9999), 'all');
	wp_enqueue_script('main-js',$path . '/assets/js/main.js', array(), rand(111,9999), 'all');
}


add_action('wp_footer','AddScripts');