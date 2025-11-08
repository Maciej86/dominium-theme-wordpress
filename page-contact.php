<?php 
/**
 * Template Name: Kontakt
 */
  get_header();
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';
  
  $contact_page_id = get_theme_mod( 'contact_page_content' );
  $contact_form_shortcode = get_theme_mod( 'contact_form_shortcode' );
  $contact_map_iframe = get_theme_mod( 'contact_map_iframe');
  $cookie_all = isset($_COOKIE['cookie_consent']) && $_COOKIE['cookie_consent'] === 'all';

  if ( empty( $contact_map_iframe ) ) {
    $contact_map_iframe = $defaults['map_google'];
  }
?>

  <main class="page_main page_main_contact">
    <div class="container">
      <div class="contanct page_style">
        <div class="contanct__data">
          <?php
            if ( $contact_page_id ) {
              $contact_page = get_post( $contact_page_id );
              if ( $contact_page ) {
                echo apply_filters( 'the_content', $contact_page->post_content );
              }
            }
          ?>
        </div>
        <div class="contact__form">
          <?php
            if ( $contact_form_shortcode ) {
              echo do_shortcode( $contact_form_shortcode );
            }
          ?>
        </div>
      </div>
    </div>
    <div class="map <?php echo $cookie_all ? '' : 'map--empty'; ?>">
      <?php
        if ($cookie_all) {
          echo $contact_map_iframe;
        } else {
          if ( preg_match( '/src=["\']([^"\']+)["\']/', $contact_map_iframe, $matches ) ) {
            $map_src = $matches[1];
          } else {
            $map_src = '';
          }

          ?>
            <div class="container">
              <?php
                get_template_part('template_parts/cookie/iframe-placeholder', null, [
                  'domain' => 'maps.google.com',
                  'iframe_src' => $map_src
                ]);
              ?>
            </div>
          <?php

        }
      ?>
    </div>
  </main>

<?php get_footer(); ?>