<?php
/**
 * Central enqueue controller
 * Loads CSS and JS conditionally based on page type
 */

add_action( 'wp_enqueue_scripts', function() {
    $defaults = require get_template_directory() . "/inc/theme-defaults.php";
    $cooki_visible = get_theme_mod("cookie_visible", $defaults["cookie"]["visible"]);

    // Always loaded styles/scripts
    require get_template_directory() . '/inc/enqueue/enqueue-global.php';

    // Homepage only
    if ( is_front_page() ) {
        require get_template_directory() . '/inc/enqueue/enqueue-homepage.php';
    }

    // Category pages
    if ( is_category() ) {
        require get_template_directory() . '/inc/enqueue/enqueue-category.php';
    }

    // Single post or page
    if ( is_singular() ) {
        require get_template_directory() . '/inc/enqueue/enqueue-single-page.php';
    }

    if($cooki_visible) {
        // Cookie handling (available globally)
        require get_template_directory() . '/inc/enqueue/enqueue-cookie.php';
    }
    

}, 20);
