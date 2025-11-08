<?php
/**
 * Theme Functions and Definitions
 *
 * @package YourThemeName
 */

// ========== ALWAYS LOADED ==========
require get_template_directory() . '/inc/enqueue.php';          // styles and scripts
require get_template_directory() . '/inc/basic-settings.php';   // theme setup: menus, thumbnails, etc.
require get_template_directory() . '/inc/get-post-date.php';    // helper functions

// ========== CUSTOMIZER ==========
/**
 * Load Customizer files only when the theme customizer is active.
 */
if (is_customize_preview() || is_admin()) {

    // Main Customizer sections
    require get_template_directory() . '/inc/customizer/customizer-homepage.php';
    require get_template_directory() . '/inc/customizer/customizer-category.php';
    require get_template_directory() . '/inc/customizer/customizer-footer.php';
    require get_template_directory() . '/inc/customizer/customizer-up-menu.php';
    require get_template_directory() . '/inc/customizer/customizer-cookie.php';
    require get_template_directory() . '/inc/customizer/customizer-contact-page.php';

    // Homepage-specific Customizer settings
    require get_template_directory() . '/inc/customizer/settings-theme-homepage/customizer-sortable-sections.php';
    require get_template_directory() . '/inc/customizer/settings-theme-homepage/customizer-header.php';
    require get_template_directory() . '/inc/customizer/settings-theme-homepage/customizer-steps.php';
    require get_template_directory() . '/inc/customizer/settings-theme-homepage/customizer-count.php';
    require get_template_directory() . '/inc/customizer/settings-theme-homepage/customizer-write-to-us.php';
    require get_template_directory() . '/inc/customizer/settings-theme-homepage/customizer-homepage-posts.php';
};

// ==========  ==========
/**
 * Load widgets only in the admin area.
 */
if ( is_admin() ) {
    require get_template_directory() . '/inc/widget/dominium-single-post-widget.php';
    require get_template_directory() . '/inc/widget/dominium-related-category-posts-widget.php';
}

// ========== OPTIONAL: FRONT-END CONDITIONAL INCLUDES ==========
/**
 * Example: load specific files only for certain types of pages (homepage, category, 404, etc.)
 * You can extend this section as your theme grows.
 */
add_action( 'wp', function() {
    // Examples:
    // if ( is_front_page() ) {
    //     require get_template_directory() . '/inc/homepage-functions.php';
    // }
    // if ( is_category() ) {
    //     require get_template_directory() . '/inc/category-functions.php';
    // }
});
