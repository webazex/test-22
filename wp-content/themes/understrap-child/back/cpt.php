<?php
//adding cpt
require_once get_stylesheet_directory().'/back/classes/CPT.php';
function registerCustomPostType(){
	CPT::create([
		'type' => 'estates',
		'name' => 'Real estates',
		's_name' => 'Real estate',
		'add_new' => 'Add new real estate',
		'add_new_item' => 'Add new title for real estate',
		'edit_item' => 'Edit real estate',
		'new_item' => 'New real estate',
		'view_item' => 'View real estate',
		'search_item' => 'Search real estate',
		'not_found' => 'Real estate not found',
		'not_found_in_trash' => 'Real estate not found in trash',
		'parent_item_colon' => '',
		'menu_name' => 'Real estates',
		'desc' => 'Custom post type real estates',
		'public' => true,
		'position' => 5,
		'icon' => '',
		'has_archive' => true,
	], 'understrap-child');
	flush_rewrite_rules();
};
add_action('init', 'registerCustomPostType');