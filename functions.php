<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function bs_register_post_type() {
}

add_action( 'init', 'bs_register_post_type' );


function bs_enqueue_scripts() {
	wp_register_script(
		'bs-normalize',
		get_stylesheet_directory_uri() . '/assets/css/normalize.css',
		[],
		'1.0.0',
		false
	);
}

add_action( 'wp_enqueue_scripts', 'bs_enqueue_scripts', 1 );
