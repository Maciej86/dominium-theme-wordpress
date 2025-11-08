<?php
/**
 * Dynamically enqueue homepage styles based on Customizer category selections
 */
function dominium_enqueue_homepage() {
     // ---------- Homepage-specific styles ----------
     $homepage_styles = [
        'dominium-header-content' => '/assets/css/parts/header-content.css',
        'dominium-steps'          => '/assets/css/parts/steps.css',
        'dominium-counts'         => '/assets/css/parts/counts.css',
        'dominium-write-to-us'    => '/assets/css/parts/write-to-us.css',
    ];

    foreach ( $homepage_styles as $handle => $file ) {
        $path = get_stylesheet_directory() . $file;
        if ( file_exists( $path ) ) {
            wp_enqueue_style( $handle, get_stylesheet_directory_uri() . $file, [], filemtime( $path ), 'all' );
        }
    }

    // ---------- Categories assigned to homepage ----------
    $category_settings = [
        'products' => get_theme_mod( 'products_post_category', 0 ),
        'blog'     => get_theme_mod( 'blog_post_category', 0 ),
    ];

    $defaults = require get_template_directory() . '/inc/theme-defaults.php';

    foreach ( $category_settings as $section => $cat_id ) {
        if ( ! $cat_id ) {
            continue; // skip if no category selected
        }

        // Get layout assigned to this category (fallback to default blog-basic)
        $layout = get_theme_mod( "dominium_category_{$cat_id}_layout", 'blog-basic' );
        $layout_slug = sanitize_key( $layout );
        $css_file = "/assets/css/category/{$layout_slug}.css";
        $css_path = get_stylesheet_directory() . $css_file;

        // Fallback if CSS file doesn't exist
        if ( ! file_exists( $css_path ) ) {
            $layout_slug = 'blog-basic';
            $css_file = "/assets/css/category/{$layout_slug}.css";
            $css_path = get_stylesheet_directory() . $css_file;
        }

        wp_enqueue_style(
            "dominium-homepage-{$section}-{$layout_slug}",
            get_stylesheet_directory_uri() . $css_file,
            [],
            filemtime( $css_path ),
            'all'
        );
    }

    // ---------- Homepage-only JS ----------
    $js_file = '/assets/js/dominium-counter.js';
    $js_path = get_template_directory() . $js_file;
    if ( file_exists( $js_path ) ) {
        wp_enqueue_script(
            'dominium-counter',
            get_template_directory_uri() . $js_file,
            [],
            '1.0',
            true
        );
    }
}
dominium_enqueue_homepage();
