<?php
// Settings write to us
function dominium_custom_write_to_us_support( $wp_customize ) {
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';
  $default_image = get_template_directory_uri() . '/images/' . $defaults['write_to_us']['image'];

  // Add panel write to us
  $wp_customize->add_section( "write_to_us_section", array(
    "title"       => __( "Sekcja - Napisz od nas", "dominium" ),
    "description" => __( "Ustawienia sekcji w ", "dominium" ),
    "panel"       => "homepage_panel",
    "priority"    => 50,
  ));

  // Title write to us
  $wp_customize->add_setting( "write_to_us_title", array(
    "default"           => $defaults['write_to_us']['title'],
    "sanitize_callback" => "sanitize_text_field",
  ));

  // Add contrl title customizer
  $wp_customize->add_control( "write_to_us_title_control", array(
    "label"    => __( "Tytuł", "dominium" ),
    "section"  => "write_to_us_section",
    "settings" => "write_to_us_title",
    "type"     => "text",
  ));

  // Description write to us
  $wp_customize->add_setting( "write_to_us_description", array(
    "default"           => $defaults['write_to_us']['description'],
    "sanitize_callback" => "sanitize_textarea_field",
  ));

  // Add contrl subtitle customizer
  $wp_customize->add_control( "write_to_us_description_control", array(
    "label"    => __( "Opis pod nagłówkiem", "dominium" ),
    "section"  => "write_to_us_section",
    "settings" => "write_to_us_description",
    "type"     => "textarea",
  ));

  
  // Button text
  $wp_customize->add_setting( "write_to_us_button_text", array(
    "default"           => $defaults['write_to_us']['button-text'],
    "description" => __( "Tekst będzie wyświetlany wielkimi literami", "dominium" ),
    "sanitize_callback" => "sanitize_text_field",
  ));

  // Add contrl button text customizer
  $wp_customize->add_control( "write_to_us_button_text_control", array(
    "label"    => __( "Treść przycisku", "dominium" ),
    "section"  => "write_to_us_section",
    "settings" => "write_to_us_button_text",
    "type"     => "text",
  ));

  // URL contact page (dropdown)
  $wp_customize->add_setting( "write_to_us_url", array(
    "default"           => 0,
    "sanitize_callback" => "absint", // ID strony
  ));

  // Add control - dropdown pages
  $wp_customize->add_control( "write_to_us_url_control", array(
    "label"       => __( "Strona docelowa przycisku", "dominium" ),
    "description" => __( "Wybierz stronę, do której ma prowadzić przycisk 'Napisz do nas'.", "dominium" ),
    "section"     => "write_to_us_section",
    "settings"    => "write_to_us_url",
    "type"        => "dropdown-pages",
  ));

  // Image write to us
  $wp_customize->add_setting( "write_to_us_image", array(
    "default"           => $default_image,
    "sanitize_callback" => "esc_url_raw",
  ));

  // Add contrl image customizer
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "write_to_us_image_control", array(
    "label"    => __( "Tło sekcji (obrazek)", "dominium" ),
    "section"  => "write_to_us_section",
    "settings" => "write_to_us_image",
  )));

};
add_action( "customize_register", "dominium_custom_write_to_us_support" );
?>