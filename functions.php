<?php
function cara_support_include() {
    load_theme_textdomain("ifmyespts");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
}
add_action("after_setup_theme", "cara_support_include");

function cara_css_js() {
    // CSS
    wp_enqueue_style('wpcore', get_template_directory_uri().'/asset/css/wp-core.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri().'/asset/font-awesome-pro/all.css');
    wp_enqueue_style('mmenu-lite', get_template_directory_uri().'/asset/css/mmenu-light.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/asset/css/bootstrap.min.css');
    wp_enqueue_style('Main-style', get_template_directory_uri().'/asset/css/style.css', array(), null, 'all');
    wp_enqueue_style('myespt-style', get_stylesheet_uri());//this is root path style.css 
   
    // JS
    wp_enqueue_script('jquery');
    wp_enqueue_script('font-awesome', get_template_directory_uri().'/asset/font-awesome-pro/all.js', array(), null, true);
    wp_enqueue_script('mmenu-lite', get_template_directory_uri().'/asset/js/mmenu-light.js', array(), null, true);
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/asset/js/bootstrap.bundle.min.js', array(), null, true);
    wp_enqueue_script('mainJS', get_template_directory_uri().'/asset/js/main.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'cara_css_js');

register_nav_menu('main_menu', __('Main Menu', 'cara'));

require_once 'inc/acf_option.php';
require_once 'inc/wc-customize.php';
include  'inc/acf-save-changes-keyshort.php' ;
include  'inc/acf_choice_field_up_category.php' ;