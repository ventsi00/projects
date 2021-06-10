<?php

function AddStyles()
{
	$path = get_template_directory_uri();
	wp_enqueue_style('main-css',$path . '/assets/css/layout.php', array(), rand(111,9999), 'all');
	wp_enqueue_style('bootstrap-css',$path . '/assets/css/bootstrap.min.css', array(), rand(111,9999), 'all');
}

add_action('wp_enqueue_scripts','AddStyles');