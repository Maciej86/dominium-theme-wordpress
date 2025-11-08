<?php
// Import CSS/JS
function dominium_scripts() {
  wp_enqueue_style('dominium-font-google', 'https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&display=swap', array(),null);
  wp_enqueue_style('dominium-incon-google', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200', array(),null);
  wp_enqueue_style('dominium-fonts-class', get_stylesheet_directory_uri() . '/assets/css/fonts.css', array(), filemtime(get_stylesheet_directory().'/assets/css/fonts.css'), 'all');
  wp_enqueue_style('dominium-style', get_stylesheet_uri(), array(), filemtime(get_stylesheet_directory().'/style.css'), 'all');

  wp_enqueue_style('dominium-style-header-contact', get_stylesheet_directory_uri() . '/assets/css/parts/header_contact.css', array(), filemtime(get_stylesheet_directory().'/assets/css/parts/header_contact.css'), 'all');
  wp_enqueue_style('dominium-style-header-content', get_stylesheet_directory_uri() . '/assets/css/parts/header_content.css', array(), filemtime(get_stylesheet_directory().'/assets/css/parts/header_content.css'), 'all');
  wp_enqueue_style('dominium-style-steps', get_stylesheet_directory_uri() . '/assets/css/parts/steps.css', array(), filemtime(get_stylesheet_directory().'/assets/css/parts/steps.css'), 'all');
  wp_enqueue_style('dominium-style-counts', get_stylesheet_directory_uri() . '/assets/css/parts/counts.css', array(), filemtime(get_stylesheet_directory().'/assets/css/parts/counts.css'), 'all');
  wp_enqueue_style('dominium-style-write-to-us', get_stylesheet_directory_uri() . '/assets/css/parts/write_to_us.css', array(), filemtime(get_stylesheet_directory().'/assets/css/parts/write_to_us.css'), 'all');

  wp_enqueue_style('dominium-style-blog-basic', get_stylesheet_directory_uri() . '/assets/css/category/blog_basic.css', array(), filemtime(get_stylesheet_directory().'/assets/css/category/blog_basic.css'), 'all');
  wp_enqueue_style('dominium-style-products-basic', get_stylesheet_directory_uri() . '/assets/css/category/products_basic.css', array(), filemtime(get_stylesheet_directory().'/assets/css/category/products_basic.css'), 'all');
  
  wp_enqueue_style('dominium-style-navigation', get_stylesheet_directory_uri() . '/assets/css/navigation.css', array(), filemtime(get_stylesheet_directory().'/assets/css/navigation.css'), 'all');
  wp_enqueue_style('dominium-style-header', get_stylesheet_directory_uri() . '/assets/css/header.css', array(), filemtime(get_stylesheet_directory().'/assets/css/header.css'), 'all');
  wp_enqueue_style('dominium-style-page', get_stylesheet_directory_uri() . '/assets/css/page.css', array(), filemtime(get_stylesheet_directory().'/assets/css/page.css'), 'all');
  wp_enqueue_style('dominium-style-footer', get_stylesheet_directory_uri() . '/assets/css/footer.css', array(), filemtime(get_stylesheet_directory().'/assets/css/footer.css'), 'all');
  wp_enqueue_style('dominium-style-aside', get_stylesheet_directory_uri() . '/assets/css/aside.css', array(), filemtime(get_stylesheet_directory().'/assets/css/aside.css'), 'all');
  wp_enqueue_style('dominium-style-contact', get_stylesheet_directory_uri() . '/assets/css/contact.css', array(), filemtime(get_stylesheet_directory().'/assets/css/contact.css'), 'all');
  wp_enqueue_style('dominium-style-cookie', get_stylesheet_directory_uri() . '/assets/css/cookie.css', array(), filemtime(get_stylesheet_directory().'/assets/css/cookie.css'), 'all');

  wp_enqueue_script('dominium-cookie', get_template_directory_uri() . '/assets/js/dominium_cookie.js', array(), '1.0', true);

  $blocked_domains_raw = get_theme_mod('blocked_iframe_domains', "youtube.com\nvimeo.com\ngoogle.com/maps");
  $blocked_domains = array_map( 'trim', explode( "\n", $blocked_domains_raw ));

  $iframe_text   = get_theme_mod('cookie_iframe_text', 'Aby wyświetlić zawartość z <strong>{{DOMAIN}}</strong>, zaakceptuj wszystkie pliki cookie.');
  $iframe_button = get_theme_mod('cookie_iframe_button', 'Ustaw cookies');

  ob_start();
  include get_template_directory() . '/template_parts/cookie/iframe-placeholder.php';
  $iframe_placeholder_html = ob_get_clean();

  // Przekaż dane do JS
  wp_localize_script('dominium-cookie', 'dominiumCookieData', [
    'blockedDomains'   => $blocked_domains,
    'iframePlaceholder'=> $iframe_placeholder_html,
    'iframeText'       => $iframe_text,
    'iframeButton'     => $iframe_button,
  ]);

  wp_enqueue_script('dominium-counter', get_template_directory_uri() . '/assets/js/dominium_counter.js', array(), '1.0', true);
  wp_enqueue_script('dominium-image-background', get_template_directory_uri() . '/assets/js/dominium_image_background.js', array(), '1.0', true);
  wp_enqueue_script('dominium-toggle-mobile-menu', get_template_directory_uri() . '/assets/js/dominium_toggle_mobile_menu.js', array(), '1.0', true);
};
add_action('wp_enqueue_scripts', 'dominium_scripts');
?>