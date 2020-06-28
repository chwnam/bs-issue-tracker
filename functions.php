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

/**
 * Register Custom Post Type
 */
require get_stylesheet_directory() . '/models/issue.php';


/**
 * Register a issue post type, with REST API support
 *
 * Based on example at: https://codex.wordpress.org/Function_Reference/register_post_type
 */

add_action( 'init', 'issue_cpt' );

function issue_cpt() {
    $args = array(
      'public'       => true,
      'show_in_rest' => true,
      'label'        => 'Issues'
    );
    register_post_type( 'issue', $args );
}