<?php
/**
 * Plugin Name: 백석 이슈 트래커
 * Description: 백석 이슈 트래커
 * Author:      백석 이슈 트래커 팀
 * Plugin URI:  https://github.com/chwnam/bs-이슈-tracker
 * Version:     1.0
 * License:     GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'wp_using_themes', '__return_false' );

// Register Custom Post Type
function bs_register_post_type() {
	$labels = [
		'name'                  => _x( '이슈들', 'Post Type General Name', 'bs' ),
		'singular_name'         => _x( '이슈', 'Post Type Singular Name', 'bs' ),
		'menu_name'             => __( '이슈들', 'bs' ),
		'name_admin_bar'        => __( '이슈들', 'bs' ),
		'archives'              => __( '이슈 Archives', 'bs' ),
		'attributes'            => __( '이슈 Attributes', 'bs' ),
		'모든_items'             => __( '모든 이슈들', 'bs' ),
		'add_new_item'          => __( '새 이슈 추가', 'bs' ),
		'add_new'               => __( '새 이슈 추가', 'bs' ),
		'new_item'              => __( '새 이슈', 'bs' ),
		'edit_item'             => __( '이슈 수정', 'bs' ),
		'update_item'           => __( '이슈 갱신', 'bs' ),
		'view_item'             => __( '이슈 보기', 'bs' ),
		'view_items'            => __( '이슈 보기', 'bs' ),
		'search_items'          => __( 'Search 이슈', 'bs' ),
		'not_found'             => __( 'Not found', 'bs' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'bs' ),
		'featured_image'        => __( 'Featured Image', 'bs' ),
		'set_featured_image'    => __( 'Set featured image', 'bs' ),
		'remove_featured_image' => __( 'Remove featured image', 'bs' ),
		'use_featured_image'    => __( 'Use as featured image', 'bs' ),
		'insert_into_item'      => __( 'Insert into 이슈', 'bs' ),
		'uploaded_to_this_item' => __( 'Uploaded to this 이슈', 'bs' ),
		'items_list'            => __( '이슈들 list', 'bs' ),
		'items_list_navigation' => __( '이슈들 list navigation', 'bs' ),
		'filter_items_list'     => __( 'Filter 이슈들 list', 'bs' ),
	];

	$args = [
		'label'               => __( '이슈', 'bs' ),
		'description'         => __( '이슈 Post Type', 'bs' ),
		'labels'              => $labels,
		'supports'            => [ 'title', 'editor', 'author' ],
		'taxonomies'          => array('milestones_categories'),
		'hierarchical'        => false,
		'public'              => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => false,
		'show_in_rest'        => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
	];

	register_post_type( 'issue', $args );
}

add_action( 'init', 'bs_register_post_type' );


//milestone Texomomy

function milestone_taxonomy() {
	register_taxonomy(
			'milestones_categories',
			'issue',
			array(
					'hierarchical' => false,
					'label' => '마일스톤',
					'query_var' => true,
					'rewrite' => array(
							'slug' => 'milestones',
							'with_front' => false  // Don't display the category base before
					)
			)
	);
}
add_action( 'init', 'milestone_taxonomy');