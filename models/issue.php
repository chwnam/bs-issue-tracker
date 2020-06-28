<?php

// Register Custom Post Type
function issue_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Issues', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Issue', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Issues', 'text_domain' ),
		'name_admin_bar'        => __( 'Issues', 'text_domain' ),
		'archives'              => __( 'Issue Archives', 'text_domain' ),
		'attributes'            => __( 'Issue Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Issue:', 'text_domain' ),
		'all_items'             => __( 'All Issues', 'text_domain' ),
		'add_new_item'          => __( 'Add New Issue', 'text_domain' ),
		'add_new'               => __( 'Add New Issue', 'text_domain' ),
		'new_item'              => __( 'New Issue', 'text_domain' ),
		'edit_item'             => __( 'Edit Issue', 'text_domain' ),
		'update_item'           => __( 'Update Issue', 'text_domain' ),
		'view_item'             => __( 'View Issue', 'text_domain' ),
		'view_items'            => __( 'View Issue', 'text_domain' ),
		'search_items'          => __( 'Search Issue', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Issue', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Issue', 'text_domain' ),
		'items_list'            => __( 'Issues list', 'text_domain' ),
		'items_list_navigation' => __( 'Issues list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Issues list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Issue', 'text_domain' ),
		'description'           => __( 'Issue Post Type', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'issue', $args );

}
add_action( 'init', 'issue_custom_post_type', 0 );

?>