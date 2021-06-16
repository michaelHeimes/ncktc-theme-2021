<?php

$labels = [
	'name'               => __( 'Virtual Recruitment', 'nck' ),
	'singular_name'      => __( 'Virtual Recruitment', 'nck' ),
	'add_new'            => _x( 'Add Blank Post', 'nck', 'nck' ),
	'add_new_item'       => __( 'Add Blank Post', 'nck' ),
	'edit_item'          => __( 'Edit Post', 'nck' ),
	'new_item'           => __( 'New Blank Post', 'nck' ),
	'view_item'          => __( 'View Post', 'nck' ),
	'search_items'       => __( 'Search Posts', 'nck' ),
	'not_found'          => __( 'No Posts found', 'nck' ),
	'not_found_in_trash' => __( 'No Posts found in Trash', 'nck' ),
	'parent_item_colon'  => __( 'Parent Blank Post:', 'nck' ),
	'menu_name'          => __( 'Virtual Recruit.', 'nck' ),
];

$args = [
	'labels'              => $labels,
	'hierarchical'        => false,
	'description'         => '',
	'taxonomies'          => [],
	'public'              => true,
	'show_ui'             => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'show_in_rest'		  => false,
	'menu_icon'           => 'dashicons-welcome-add-page',
	'show_in_nav_menus'   => false,
	'publicly_queryable'  => true,
	'exclude_from_search' => false,
	'has_archive'         => false, // main NCK Go listing
	'query_var'           => true,
	'can_export'          => true,
	'rewrite'             => true,
	'capability_type'     => 'post',
	'supports'            => [ 'editor', 'title' ],
];
register_post_type( 'go', $args );