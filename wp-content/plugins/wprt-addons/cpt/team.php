<?php
if ( ! defined('ABSPATH') ) {
	die('Please do not load this file directly!');
}

add_action('init', 'register_member_post_type');
/**
  * Register member post type
*/
function register_member_post_type() {
    $member_slug = 'member';

    $labels = array(
        'name'               => esc_html__( 'Members', 'prelude' ),
        'singular_name'      => esc_html__( 'Member Item', 'prelude' ),
        'add_new'            => esc_html__( 'Add New', 'prelude' ),
        'add_new_item'       => esc_html__( 'Add New Item', 'prelude' ),
        'new_item'           => esc_html__( 'New Item', 'prelude' ),
        'edit_item'          => esc_html__( 'Edit Item', 'prelude' ),
        'view_item'          => esc_html__( 'View Item', 'prelude' ),
        'all_items'          => esc_html__( 'All Items', 'prelude' ),
        'search_items'       => esc_html__( 'Search Items', 'prelude' ),
        'parent_item_colon'  => esc_html__( 'Parent Items:', 'prelude' ),
        'not_found'          => esc_html__( 'No items found.', 'prelude' ),
        'not_found_in_trash' => esc_html__( 'No items found in Trash.', 'prelude' )
    );

    $args = array(
        'labels'        => $labels,
        'rewrite'       => array( 'slug' => $member_slug ),
        'supports'      => array( 'title', 'thumbnail' ),
        'public'        => true
    );

    register_post_type( 'member', $args );
}

add_filter( 'post_updated_messages', 'member_updated_messages' );
/**
  * Member update messages.
*/
function member_updated_messages( $messages ) {
    $post             = get_post();
    $post_type        = get_post_type( $post );
    $post_type_object = get_post_type_object( $post_type );

    $messages['member'] = array(
        0  => '', // Unused. Messages start at index 1.
        1  => esc_html__( 'Member updated.', 'prelude' ),
        2  => esc_html__( 'Custom field updated.', 'prelude' ),
        3  => esc_html__( 'Custom field deleted.', 'prelude' ),
        4  => esc_html__( 'Member updated.', 'prelude' ),
        5  => isset( $_GET['revision'] ) ? sprintf( esc_html__( 'Member restored to revision from %s', 'prelude' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6  => esc_html__( 'Member published.', 'prelude' ),
        7  => esc_html__( 'Member saved.', 'prelude' ),
        8  => esc_html__( 'Member submitted.', 'prelude' ),
        9  => sprintf(
            esc_html__( 'Member scheduled for: <strong>%1$s</strong>.', 'prelude' ),
            date_i18n( esc_html__( 'M j, Y @ G:i', 'prelude' ), strtotime( $post->post_date ) )
        ),
        10 => esc_html__( 'Member draft updated.', 'prelude' )
    );
    return $messages;
}

add_action( 'init', 'register_member_taxonomy' );
/**
  * Register member taxonomy
*/
function register_member_taxonomy() {
    $cat_slug = 'member_category';

    $labels = array(
        'name'                       => esc_html__( 'Member Categories', 'prelude' ),
        'singular_name'              => esc_html__( 'Category', 'prelude' ),
        'search_items'               => esc_html__( 'Search Categories', 'prelude' ),
        'menu_name'                  => esc_html__( 'Categories', 'prelude' ),
        'all_items'                  => esc_html__( 'All Categories', 'prelude' ),
        'parent_item'                => esc_html__( 'Parent Category', 'prelude' ),
        'parent_item_colon'          => esc_html__( 'Parent Category:', 'prelude' ),
        'new_item_name'              => esc_html__( 'New Category Name', 'prelude' ),
        'add_new_item'               => esc_html__( 'Add New Category', 'prelude' ),
        'edit_item'                  => esc_html__( 'Edit Category', 'prelude' ),
        'update_item'                => esc_html__( 'Update Category', 'prelude' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'prelude' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used categories', 'prelude' ),
        'not_found'                  => esc_html__( 'No Category found.', 'prelude' ),
        'menu_name'                  => esc_html__( 'Categories', 'prelude' ),
    );
    $args = array(
        'labels'        => $labels,
        'rewrite'             => array('slug'=>$cat_slug),
        'hierarchical'  => true,
    );
    register_taxonomy( 'member_category', 'member', $args );
}