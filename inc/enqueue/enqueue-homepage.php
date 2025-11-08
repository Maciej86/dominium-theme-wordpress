<?php
/**
 * Styles and scripts for the homepage
 */
function dominium_enqueue_homepage() {
    wp_enqueue_style('dominium-header-content', get_stylesheet_directory_uri() . '/assets/css/parts/header-content.css', [], filemtime(get_stylesheet_directory() . '/assets/css/parts/header-content.css'), 'all');
    wp_enqueue_style('dominium-steps', get_stylesheet_directory_uri() . '/assets/css/parts/steps.css', [], filemtime(get_stylesheet_directory() . '/assets/css/parts/steps.css'), 'all');
    wp_enqueue_style('dominium-counts', get_stylesheet_directory_uri() . '/assets/css/parts/counts.css', [], filemtime(get_stylesheet_directory() . '/assets/css/parts/counts.css'), 'all');
    wp_enqueue_style('dominium-write-to-us', get_stylesheet_directory_uri() . '/assets/css/parts/write-to-us.css', [], filemtime(get_stylesheet_directory() . '/assets/css/parts/write-to-us.css'), 'all');

    // Shared with homepage & category
    wp_enqueue_style('dominium-blog-basic', get_stylesheet_directory_uri() . '/assets/css/category/blog-basic.css', [], filemtime(get_stylesheet_directory() . '/assets/css/category/blog-basic.css'), 'all');
    wp_enqueue_style('dominium-products-basic', get_stylesheet_directory_uri() . '/assets/css/category/products-basic.css', [], filemtime(get_stylesheet_directory() . '/assets/css/category/products-basic.css'), 'all');

    // Homepage-only JS
    wp_enqueue_script('dominium-counter', get_template_directory_uri() . '/assets/js/dominium-counter.js', [], '1.0', true);
}
dominium_enqueue_homepage();
