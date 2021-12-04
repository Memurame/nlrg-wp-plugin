<?php
/*
Plugin Name: NLRG - Wordpress Plugin
Plugin URI: https://github.com/Memurame/nlrg-wp-plugin
Description: Plugin für das Neue Land Region Gantrisch
Version: 0.1
Author: Thomas Hirter
License: GPLv2
*/

add_action( 'admin_menu', 'nlrg_admin_menu' );

function nlrg_admin_menu() {
	add_menu_page(
		'NLRG - Wordpress Plugin',
		'NLRG Plugin',
		'manage_options',
		'nlrg-plugin',
		'nlrg_main_page_render',
		plugins_url( 'images/pacman.png', __FILE__ )
	);
}

function nlrg_main_page_render() {
	echo '<h1>NLRG</h1><h2>Wordpress Plugin</h2>';
}
?>