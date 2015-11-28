<?php
function create_post_type($type, $single, $plural) {
    $labels = array(
        'name'               => _x( $plural, $plural, 'leaguejs' ),
        'singular_name'      => _x( $single, $single, 'leaguejs' ),
        'menu_name'          => _x( $plural, 'admin menu', 'leaguejs' ),
        'name_admin_bar'     => _x( $single, 'add new on admin bar', 'leaguejs' ),
        'add_new'            => _x( 'Add New', $single, 'leaguejs' ),
        'add_new_item'       => __( 'Add New '.$single, 'leaguejs' ),
        'new_item'           => __( 'New '.$single, 'leaguejs' ),
        'edit_item'          => __( 'Edit '.$single, 'leaguejs' ),
        'view_item'          => __( 'View '.$single, 'leaguejs' ),
        'all_items'          => __( 'All '.$plural, 'leaguejs' ),
        'search_items'       => __( 'Search '.$plural, 'leaguejs' ),
        'parent_item_colon'  => __( 'Parent '.$plural, 'leaguejs' ),
        'not_found'          => __( 'No '.$plural.' found.', 'leaguejs' ),
        'not_found_in_trash' => __( 'No '.$plural.' found in Trash.', 'leaguejs' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( $plural.'.', 'leaguejs' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => $type ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' )
    );

    register_post_type( $type, $args );
}