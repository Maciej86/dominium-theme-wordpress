<?php
/**
 * Dynamically load CSS styles for category archive pages
 *
 * Loads only the stylesheet that matches the layout selected
 * for the current category in the Customizer.
 * If no layout is assigned, loads the default: layout-grid.
 */

function dominium_enqueue_category_layout() {

    $category = get_queried_object();

    if ( ! isset( $category->term_id ) ) {
        return;
    }

    $cat_id = $category->term_id;

    // Get selected layout or fallback to default 'layout-grid'
    $layout = get_theme_mod( "dominium_category_{$cat_id}_layout", 'layout-grid' );

    // Sanitize and build path
    $layout_slug = sanitize_key( $layout );
    $style_path  = get_stylesheet_directory() . "/assets/css/category/{$layout_slug}.css";

    // If user-assigned layout CSS file doesn't exist → fallback to layout-grid
    if ( ! file_exists( $style_path ) ) {
        $layout_slug = 'layout-grid';
        $style_path  = get_stylesheet_directory() . "/assets/css/category/layout-grid.css";
    }

    // Enqueue the layout stylesheet
    wp_enqueue_style(
        "dominium-category-{$layout_slug}",
        get_stylesheet_directory_uri() . "/assets/css/category/{$layout_slug}.css",
        [],
        filemtime( $style_path ),
        'all'
    );
}

// call immediately instead of hooking (since we're already inside wp_enqueue_scripts)
dominium_enqueue_category_layout();
