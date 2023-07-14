<?php
function wpdocs_theme_name_scripts() {
    //styles
    wp_enqueue_style('styles', get_template_directory_uri() . '/dist/styles/main.bundle.css?' . rand(), array());

    //scripts
    //wp_enqueue_script( 'jquery' );
    wp_enqueue_script('scripts', get_template_directory_uri() . '/dist/scripts/main.bundle.js', array(), '', true);
}

add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );