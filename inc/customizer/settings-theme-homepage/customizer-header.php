<?php
// Settings header
function dominium_custom_header_support( $wp_customize ) {
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';

  // Logo text
  $wp_customize->add_setting( 'header_logo_text', array(
    'default'           => $defaults['header']['logo'],
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'refresh',
  ));
  
  $wp_customize->add_control( 'header_logo_text_control', array(
    'label'       => __( 'Tekst zamiast logo', 'dominium' ),
    'description' => __( 'Wpisz tekst, jeśli nie chcesz używać obrazka logo. Jeżeli został ustawiony obrazek na logo tekst nie zostanie wyświetlony. Tekst na stronie zawsze jest wyświetlany małymi literami.', 'dominium' ),
    'section'     => 'header_section',
    'settings'    => 'header_logo_text',
    'type'        => 'text',
  ));


  $wp_customize->add_setting( 'separator_logo', [
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  
  $wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'separator_logo',
    [
      'section'     => 'header_section',
      'settings'    => 'separator_logo',
      'type'        => 'hidden',
      'description' => '<hr style="margin:15px 0;border:0;border-top:1px solid #ccc;">',
    ]
  ));
  

  // Add panel header
  $wp_customize->add_section( "header_section", array(
    "title"       => __( "Sekcja - Nagłówek", "dominium" ),
    "description" => __( "Ustawienia nagłówka na stronie głównej", "dominium" ),
    "panel"       => "homepage_panel",
    "priority"    => 20,
  ));

  // Title header
  $wp_customize->add_setting( "header_title", array(
    "default"           => $defaults['header']['title'],
    "sanitize_callback" => "sanitize_text_field",
  ));

  // Add contrl title customizer
  $wp_customize->add_control( "header_title_control", array(
    "label"    => __( "Treść nagłówka", "dominium" ),
    "section"  => "header_section",
    "settings" => "header_title",
    "type"     => "text",
  ));

  // Subitle header
  $wp_customize->add_setting( "header_subtitle", array(
    "default"           => $defaults['header']['subtitle'],
    "sanitize_callback" => "sanitize_text_field",
  ));

  // Add contrl subtitle customizer
  $wp_customize->add_control( "header_subtitle_control", array(
    "label"    => __( "Treść pod nagłówkiem", "dominium" ),
    "section"  => "header_section",
    "settings" => "header_subtitle",
    "type"     => "text",
  ));

  // Description header
  $wp_customize->add_setting( "header_description", array(
    "default"           => $defaults['header']['description'],
    "sanitize_callback" => "sanitize_textarea_field",
  ));

  // Add contrl subtitle customizer
  $wp_customize->add_control( "header_description_control", array(
    "label"    => __( "Opis pod nagłówkiem", "dominium" ),
    "section"  => "header_section",
    "settings" => "header_description",
    "type"     => "textarea",
  ));

  $wp_customize->add_setting( 'separator_1', [
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  
  $wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'separator_1',
    [
      'section'     => 'header_section',
      'settings'    => 'separator_1',
      'type'        => 'hidden',
      'description' => '<hr style="margin:15px 0;border:0;border-top:1px solid #ccc;">',
    ]
  ));

  foreach ( $defaults["header"]["buttons"] as $i => $button ) {
    // Add text button
    $wp_customize->add_setting( "header_button_text_$i", array(
      "default"           => $button["text"],
      "sanitize_callback" => "sanitize_text_field",
      "type"              => "theme_mod",
      "capability"        => "edit_theme_options",
      "transport"         => "refresh",
    ));
  
    $wp_customize->add_control( "header_button_text_control_$i", array(
      "label"    => sprintf( __( "Tekst przycisku %d", "dominium" ), $i ),
      "section"  => "header_section",
      "settings" => "header_button_text_$i",
      "type"     => "text",
    ));
  
    // Add url button
    $wp_customize->add_setting( "header_button_url_$i", array(
      "default"           => $button["url"],
      "sanitize_callback" => "esc_url_raw",
      "type"              => "theme_mod",
      "capability"        => "edit_theme_options",
      "transport"         => "refresh",

    ));
  
    $wp_customize->add_control( "header_button_url_control_$i", array(
      "label"    => sprintf( __( "Adres URL przycisku %d", "dominium" ), $i ),
      "section"  => "header_section",
      "settings" => "header_button_url_$i",
      "type"     => "url",
      'description'       => 'Jeżeli przycisk ma przewijać stronę główną do wpisów z kategorii w polu wpisz nazwę uproszczoną kategorii. Jeżeli przycisk ma przenosić do innej podstrony podaj pełny adres z https.',
    ));
  }

  // Separator between other data and copyright
  $wp_customize->add_setting( 'separator_header', [
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  
  $wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'separator_header',
    [
      'section'     => 'header_section',
      'settings'    => 'separator_header',
      'type'        => 'hidden',
      'description' => '<hr style="margin:15px 0;border:0;border-top:1px solid #ccc;">',
    ]
  ));

  // Header background image
  $wp_customize->add_setting( "header_background_image", array(
    "default"           => $defaults['header']['background_image'],
    "sanitize_callback" => "esc_url_raw",
  ));

  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "header_background_image_control", array(
    "label"    => __( "Obrazek tła nagłówka", "dominium" ),
    "section"  => "header_section",
    "settings" => "header_background_image",
    'description' => 'Zdjęcie powinno mieć rozmiar nie mniejszy niż 1920x1080px. Jeżeli obrazek jest za mały, zostanie powiększony. Przyciemnienie do zdjęcia zostanie wykonane automatycznie.',
  )));

};
add_action( "customize_register", "dominium_custom_header_support" );
?>