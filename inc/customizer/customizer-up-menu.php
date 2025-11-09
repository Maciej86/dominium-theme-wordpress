<?php
// Settings up menu
function dominium_custom_up_menu_support( $wp_customize ) {
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';

  // Add panel up menu
  $wp_customize->add_section( "up_menu_section", array(
    "title"       => __( "Ustawienia bleki nad menu", "dominium" ),
    "description" => __( "Ustawienia skecji Nad nawigacją", "dominium" ),
    "priority"    => 60,
  ));

  // Visibility checkbox
  $wp_customize->add_setting( "up_menu_visible", array(
    "default"           => $defaults['up_menu']['visible'],
    "sanitize_callback" => "wp_validate_boolean", 
  ));

  $wp_customize->add_control( "up_menu_visible_control", array(
    "label"    => __( "Pokaż sekcję nad menu", "dominium" ),
    "section"  => "up_menu_section",
    "settings" => "up_menu_visible",
    "type"     => "checkbox",
    "description" => __( "Zaznacz, aby sekcja nad menu była widoczna. Odznacz, aby ją ukryć.", "dominium" ),
  ));

  // Phone number
  $wp_customize->add_setting( "up_menu_phone", array(
    "default"           =>   $defaults['up_menu']['phone'],
    "sanitize_callback" => "sanitize_text_field",
  ));

  // Add contrl phone number customizer
  $wp_customize->add_control( "up_menu_phone_control", array(
    "label"    => __( "Numer telefonu", "dominium" ),
    "section"  => "up_menu_section",
    "settings" => "up_menu_phone",
    "type"     => "text",
    "description" => __( "Podaj numer z kierunkowym, np. +48 123 456 789. Numer ten będzie przypisany również do stopki", "dominium" ),
  ));

  // Email
  $wp_customize->add_setting( "up_menu_email", array(
    "default"           =>   $defaults['up_menu']['email'],
    "sanitize_callback" => "sanitize_text_field",
  ));

  // Add contrl email customizer
  $wp_customize->add_control( "up_menu_email_control", array(
    "label"    => __( "Adres e-mail", "dominium" ),
    "section"  => "up_menu_section",
    "settings" => "up_menu_email",
    "type"     => "text",
    "description" => __( "Adres ten będzie przypisany również do stopki", "dominium" ),
  ));

  $wp_customize->add_setting( 'separator_1', [
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  
  $wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'separator_1',
    [
      'section'     => 'up_menu_section',
      'settings'    => 'separator_1',
      'type'        => 'hidden',
      'description' => '<hr style="margin:15px 0;border:0;border-top:1px solid #ccc;">',
    ]
  ));

  // Facebook
  $wp_customize->add_setting( "up_menu_facebook", array(
    "default"           =>   $defaults['up_menu']['facebook'],
    "sanitize_callback" => "sanitize_text_field",
  ));

  // Add contrl email customizer
  $wp_customize->add_control( "up_menu_facebook_control", array(
    "label"    => __( "Profil na Facebook", "dominium" ),
    "section"  => "up_menu_section",
    "settings" => "up_menu_facebook",
    "type"     => "text",
    "description" => __( "Podaj pełny adres strony wraz z https. Brak adresu spowoduje brak wyświetlenia ikony.", "dominium" ),
  ));

  // Instagram
  $wp_customize->add_setting( "up_menu_instagram", array(
    "default"           =>   $defaults['up_menu']['instagram'],
    "sanitize_callback" => "sanitize_text_field",
  ));

  // Add contrl email customizer
  $wp_customize->add_control( "up_menu_instagram_control", array(
    "label"    => __( "Profil na Instagram", "dominium" ),
    "section"  => "up_menu_section",
    "settings" => "up_menu_instagram",
    "type"     => "text",
    "description" => __( "Podaj pełny adres strony wraz z https. Brak adresu spowoduje brak wyświetlenia ikony.", "dominium" ),
  ));

  // Tik-Tok
  $wp_customize->add_setting( "up_menu_tiktok", array(
    "default"           =>   $defaults['up_menu']['tiktok'],
    "sanitize_callback" => "sanitize_text_field",
  ));

  // Add contrl email customizer
  $wp_customize->add_control( "up_menu_tiktok_control", array(
    "label"    => __( "Profil na Tik Tok", "dominium" ),
    "section"  => "up_menu_section",
    "settings" => "up_menu_tiktok",
    "type"     => "text",
    "description" => __( "Podaj pełny adres strony wraz z https. Brak adresu spowoduje brak wyświetlenia ikony.", "dominium" ),
  ));

    // Tik-Tok
    $wp_customize->add_setting( "up_menu_x", array(
      "default"           =>   $defaults['up_menu']['x'],
      "sanitize_callback" => "sanitize_text_field",
    ));
  
    // Add contrl email customizer
    $wp_customize->add_control( "up_menu_tiktok_control", array(
      "label"    => __( "Profil na X", "dominium" ),
      "section"  => "up_menu_section",
      "settings" => "up_menu_x",
      "type"     => "text",
      "description" => __( "Podaj pełny adres strony wraz z https. Brak adresu spowoduje brak wyświetlenia ikony.", "dominium" ),
    ));
  
};
add_action( "customize_register", "dominium_custom_up_menu_support" );
?>