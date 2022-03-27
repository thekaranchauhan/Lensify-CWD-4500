<?php
/**
 * Functions which enhance the theme by creating custom post types
 * 
 * @package Lensify
 */

function lensify_post_types() {
    $labels = array(
        'name'                  => _x( 'Lens', 'Post type general name', 'lensify' ),
        'singular_name'         => _x( 'Lens', 'Post type singular name', 'lensify' ),
        'menu_name'             => _x( 'Lens', 'Admin Menu text', 'lensify' ),
        'name_admin_bar'        => _x( 'Lens', 'Add New on Toolbar', 'lensify' ),
        'new_item'              => __( 'New lens', 'lensify' ),
        'add_new_item'          => __( 'Add New Lens', 'lensify' ),
        'add_new'               => __( 'Add New', 'lensify' ),
        'view_item'             => __( 'View Lens', 'lensify' ),
        'all_items'             => __( 'All lens', 'lensify' ),
        'search_items'          => __( 'Search lens', 'lensify' ),
        'parent_item_colon'     => __( 'Parent lens:', 'lensify' ),
        'not_found'             => __( 'No lens found.', 'lensify' ),
        'not_found_in_trash'    => __( 'No lens found in Trash.', 'lensify' ),
        'featured_image'        => _x( 'Lens Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'lensify' ),
        'set_featured_image'    => _x( 'Set lens image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'lensify' ),
        'remove_featured_image' => _x( 'Remove lens image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'lensify' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'lensify' ),
        'archives'              => _x( 'Lens archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'lensify' ),
        'insert_into_item'      => _x( 'Insert lens', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'lensify' ),
        'uploaded_to_this_item' => _x( 'Uploaded this lens', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'lensify' ),
        'filter_items_list'     => _x( 'Filter lens list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'lensify' ),
        'items_list_navigation' => _x( 'Lens list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'lensify' ),
        'items_list'            => _x( 'Lens list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'lensify' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'Lens custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'lens' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'show_in_rest'       => true
    );
    
    register_post_type( 'lensify_lensify', $args );
}
add_action( 'init', 'lensify_post_types' );