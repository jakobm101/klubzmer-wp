<?php
function mytheme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(['main-menu' => 'Main Menu']);
}
add_action('after_setup_theme', 'mytheme_setup');

function mytheme_scripts() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', [], false, true);
}
add_action('wp_enqueue_scripts', 'mytheme_scripts');
