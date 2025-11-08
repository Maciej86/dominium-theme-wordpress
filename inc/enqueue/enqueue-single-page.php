<?php
/**
 * Styles for single post and page templates
 */
function dominium_enqueue_single_page() {
    wp_enqueue_style('dominium-aside', get_stylesheet_directory_uri() . '/assets/css/aside.css', [], filemtime(get_stylesheet_directory() . '/assets/css/aside.css'), 'all');
    wp_enqueue_style('dominium-contact', get_stylesheet_directory_uri() . '/assets/css/contact.css', [], filemtime(get_stylesheet_directory() . '/assets/css/contact.css'), 'all');
}
dominium_enqueue_single_page();
