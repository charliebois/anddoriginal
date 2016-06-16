<?php
/*
	These are all the variables that will be loaded when the theme gets called
*/
$theme_name = get_option('template');

$home_url = get_option('home');
$theme_url = $home_url . '/wp-content/themes/' . $theme_name . '/';
$stylesheets_url = $theme_url . 'stylesheets/';
$javascript_url = $theme_url . 'javascript/';
$images_url = $theme_url . 'images/';
$upload_url = $home_url . '/wp-content/uploads/';
$videos_url = $home_url . '/wp-content/videos/';

?>
