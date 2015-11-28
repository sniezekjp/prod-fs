<?php
/**
 * Register a new taxonomy
 *
 * @param $tax
 * @param $single
 * @param $plural
 * @param $post_types
 */
function league_register_taxonomy($tax, $single, $plural, $post_types = array('team')) {
    $labels = array(
        'name'                       => _x( $plural, 'taxonomy general name' ),
        'singular_name'              => _x( $single, 'taxonomy singular name' ),
        'search_items'               => __( 'Search '.$plural ),
        'popular_items'              => __( 'Popular '.$plural ),
        'all_items'                  => __( 'All '.$plural ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit '.$single ),
        'update_item'                => __( 'Update '.$single ),
        'add_new_item'               => __( 'Add New '.$single ),
        'new_item_name'              => __( 'New '.$single.' Name' ),
        'separate_items_with_commas' => __( 'Separate '.$plural.' with commas' ),
        'add_or_remove_items'        => __( 'Add or remove '.$plural ),
        'choose_from_most_used'      => __( 'Choose from the most used '.$plural ),
        'not_found'                  => __( 'No '.$plural.' found.' ),
        'menu_name'                  => __( $plural ),
    );

    $args = array(
        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => $tax ),
    );

    register_taxonomy( $tax, $post_types, $args );
}