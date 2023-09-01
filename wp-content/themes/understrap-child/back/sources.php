<?php
add_action( 'wp_enqueue_scripts', 'loadAssets' );
function loadAssets() {
	wp_enqueue_style( 'main', get_stylesheet_uri() );
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', [], false, true);
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/js/main.js', ['jquery'], '1', true );
	wp_localize_script( 'main', 'ajaxpatch',
		[
			'url' => admin_url('admin-ajax.php')
		]
	);
}