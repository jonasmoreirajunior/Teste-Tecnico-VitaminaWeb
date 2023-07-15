<?php

function posttype_unidades()
{
    $labels = array(
        'name'                => ('Unidades'),
        'singular_name'       => ('Unidades'),
        'menu_name'           => ('Unidades'),
        'parent_item_colon'   => ('Unidades'),
        'all_items'           => ('All'),
        'view_item'           => ('View'),
        'add_new_item'        => ('Add new'),
        'add_new'             => ('Add new'),
        'edit_item'           => ('Edit'),
        'update_item'         => ('Update'),
        'search_items'        => ('Search'),
        'not_found'           => ('Not found'),
        'not_found_in_trash'  => ('Not found')
    );

    register_post_type(
        'unidades',
        array(
            'show_ui' => true,
            'menu_icon'   => 'dashicons-admin-home',
            'labels'      => $labels,
            'public'      => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'menu_position' => 4,
            'has_archive' => false,
            'hierarchical' => false,
            'supports'    => array('title', 'thumbnail'),
            'taxonomies'  => array('uf')
        )
    );

    register_taxonomy(
        'uf',
        'unidades',
        array(
            'label' => __('UF'),
            'rewrite' => array('slug' => 'uf'),
            'hierarchical' => true,
        )
    );
}
add_action('init', 'posttype_unidades');
