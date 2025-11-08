<?php
/**
 * Cookie management script and data passing
 */
function dominium_enqueue_cookie() {

    wp_enqueue_style('dominium-cookie-style', get_stylesheet_directory_uri() . '/assets/css/cookie.css', [], filemtime(get_stylesheet_directory() . '/assets/css/cookie.css'), 'all');
    wp_enqueue_script('dominium-cookie', get_template_directory_uri() . '/assets/js/dominium-cookie.js', [], '1.0', true);

    // Prepare data from Customizer
    $blocked_domains_raw = get_theme_mod('blocked_iframe_domains', "youtube.com\nvimeo.com\ngoogle.com/maps");
    $blocked_domains = array_map( 'trim', explode( "\n", $blocked_domains_raw ));

    $iframe_text   = get_theme_mod('cookie_iframe_text', 'To view content from <strong>{{DOMAIN}}</strong>, please accept all cookies.');
    $iframe_button = get_theme_mod('cookie_iframe_button', 'Set cookies');

    ob_start();
    include get_template_directory() . '/template_parts/cookie/iframe-placeholder.php';
    $iframe_placeholder_html = ob_get_clean();

    // Pass data to JS
    wp_localize_script('dominium-cookie', 'dominiumCookieData', [
        'blockedDomains'   => $blocked_domains,
        'iframePlaceholder'=> $iframe_placeholder_html,
        'iframeText'       => $iframe_text,
        'iframeButton'     => $iframe_button,
    ]);
}
dominium_enqueue_cookie();
