<?php
  $defaults = require get_template_directory() . "/inc/theme-defaults.php";
  $favicon = get_theme_mod("favicon", $defaults["header"]["favicon"]);
  $logo_text = get_theme_mod("header_logo_text", $defaults["header"]["logo"]);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0 viewport-fit=cover"
    />
    <meta name="theme-color" content="#0e1c2b" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta
      name="apple-mobile-web-app-status-bar-style"
      content="black-translucent"
    />

    <title>
        <?php wp_title('-', true, 'right'); ?>    
    </title>

    <?php if ( function_exists( 'has_site_icon' ) && has_site_icon() ) : ?>
      <?php wp_site_icon(); ?>
    <?php else : ?>
      <link rel="icon" href="<?php echo esc_url( $favicon ); ?>" type="image/x-icon">
    <?php endif; ?>

    <?php wp_head(); ?>
  </head>
  <body class="archivo-200">
    <div class="container_nav">

      <?php get_template_part('template_parts/header','contact'); ?>

      <nav class="nav">
        <div class="container">

          <div class="nav__logo">
            <?php
              if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
                the_custom_logo();
              } elseif ( !empty( get_bloginfo( 'name' ))) {
                echo '<a href="' . esc_url( home_url( '/' )) . '" class="logo-text">' . esc_html( get_bloginfo( 'name' )) . '</a>';
              } else {
                echo '<a href="' . esc_url( home_url( '/' )) . '" class="logo-text">' . esc_html( $logo_text ) . '</a>';
              }
            ?>
          </div>

          <div class="nav__menu js-menu">
            <div class="nav__menu_hiden_mobile">
              <button class="nav__menu_mobile__button js-hidden-menu">
                <span class="material-symbols-outlined">close</span>
              </button>
            </div>

            <?php
              wp_nav_menu([
                  'theme_location' => 'primary',
                  'container' => false,
              ]);
            ?>

          </div>
          <div class="nav__menu_show_mobile">
            <button class="nav__menu_mobile__button js-show-menu">
              <span class="material-symbols-outlined">menu</span>
            </button>
          </div>
        </div>
      </nav>
    </div>