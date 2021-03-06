<?php
/**
 * themeplace Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package themeplace Child
 * @since 1.0.0
 */

add_action( 'wp_enqueue_scripts', 'themeplace_enqueue_styles' );
function themeplace_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css',array('bootstrap') ); 
}
include_once 'custom_posts/certificados.php';
include_once 'custom_posts/parceiros.php';
include_once 'inc/customizer.php';
include_once 'inc/shortcode.php';
include_once 'inc/loadSources.php';