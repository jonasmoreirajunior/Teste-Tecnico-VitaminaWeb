<?php
function setup()
{
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'adjacent_posts_rel_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_filter('the_title', 'wptexturize');
    remove_filter('the_content', 'wptexturize');
    remove_filter('the_excerpt', 'wptexturize');
    remove_filter('comment_text', 'wptexturize');
    remove_filter('list_cats', 'wptexturize');
    remove_filter('single_post_title', 'wptexturize');

    if (function_exists('acf_add_options_page')) :
        acf_add_options_page();
    endif;

    add_theme_support(
        'custom-logo',
        array(
            'height'      => 100,
            'width'       => 200,
            'flex-height' => true,
            'flex-width'  => true,
        )
    );

    // register menus
    register_nav_menu('header-menu', __('Menu Principal'));
    register_nav_menu('footer-menu', __('Footer Menu'));
}
add_action('init', 'setup');

function register_custom_image_sizes()
{
    if (!current_theme_supports('post-thumbnails')) {
        add_theme_support('post-thumbnails');
        add_theme_support('600x600');
    }
    add_image_size('600x600', 600, 600, array('right', 'top'));
}
add_action('after_setup_theme', 'register_custom_image_sizes');

function add_custom_image_sizes($sizes)
{
    return array_merge($sizes, array(
        '600x600' => __('Custom 600x600'),
    ));
}
add_filter('image_size_names_choose', 'add_custom_image_sizes');


function tema_customize_register($wp_customize)
{
    $wp_customize->add_section(
        'rodape',
        array(
            'title' => __('Rodapé', 'odin'),
            'priority' => 201,
        )
    );

    $wp_customize->add_setting('copyright');
    $wp_customize->add_control(
        'copyright',
        array(
            'label' => __('Copyright', 'odin'),
            'section' => 'rodape',
        )
    );
}
add_action('customize_register', 'tema_customize_register');
