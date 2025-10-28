<?php
/**
 * Custom Updates Custom Post Type
 *
 * @package Postali Parent
 * @author Postali LLC
 */

function create_custom_post_type_updates() {

// set up labels
    $labels = array(
        'name' => 'Updates',
        'singular_name' => 'Update',
        'add_new' => 'Add New Update',
        'add_new_item' => 'Add New Update',
        'edit_item' => 'Edit Updates',
        'new_item' => 'New Update',
        'all_items' => 'All Updates',
        'view_item' => 'View Update',
        'search_items' => 'Search Updates',
        'not_found' =>  'No Updates Found',
        'not_found_in_trash' => 'No Updates found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Updates',

    );
    //register post type
    register_post_type( 'Updates', array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-businessman',
        'has_archive' => true,
        'public' => true,
        'supports' => array( 'title', 'editor', 'excerpt' ),  
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'updates', 'with_front' => true ), // Allows for /legal-blog/ to be the preface to non pages, but custom posts to have own root
        )
    );

}
add_action( 'init', 'create_custom_post_type_updates' );