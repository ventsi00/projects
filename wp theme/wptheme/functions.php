<?php

include 'includes' . DIRECTORY_SEPARATOR . 'Scripts.php';
include 'includes' . DIRECTORY_SEPARATOR . 'Styles.php';
include 'includes' . DIRECTORY_SEPARATOR . 'AdminPage.php';

function RegisterMenu()
{
	register_nav_menu('header-menu','Header');
}

add_action('init','RegisterMenu');

add_theme_support('post-thumbnails');

function GetPostImageUrl()
{
	return get_the_post_thumbnail_url()
	? get_the_post_thumbnail_url()
	: get_template_directory_uri() . '/assets/images/no-image.jpg';
}

function Get404ImageUrl()
{
	return get_template_directory_uri() . '/assets/images/no-page.png';
}

function GetBannerImageUrl()
{
	return get_template_directory_uri() . '/assets/images/banner.jpg';
}

function RegisterSideBar()
{
	register_sidebar([
		'id' => 'sidebar',
		'name' => 'Sidebar'
	]);
}

add_action('widgets_init','RegisterSideBar');

function RegisterAdminPage()
{
	add_menu_page('Project Theme','Theme Settings','manage_options','project-theme-settings','RenderAdminPage','dashicons-admin-customizer',58);
}

add_action('admin_menu','RegisterAdminPage');

function RenderAdminPage()
{
	AdminPage::Render();
}

function RegisterThemeOptions()
{
	register_setting('home_page','header_name');
	register_setting('home_page','banner_title');
	register_setting('home_page','banner_text');
	register_setting('home_page','banner_button');
	register_setting('home_page','logo_path');
	register_setting('home_page','latest_posts');

	register_setting('home_page_categories','first');
	register_setting('home_page_categories','second');
	register_setting('home_page_categories','full');
	register_setting('home_page_categories','full_title');
	register_setting('home_page_categories','full_description');

	register_setting('post_page','latest_publications');

	register_setting('social_media','twitter');
	register_setting('social_media','facebook');
	register_setting('social_media','instagram');
	register_setting('social_media','snapchat');
}

add_action('admin_init','RegisterThemeOptions');