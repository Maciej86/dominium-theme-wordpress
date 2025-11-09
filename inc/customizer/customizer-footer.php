<?php
function dominium_custom_footer_support( $wp_customize ) {
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';

  // Add panel footer
  $wp_customize->add_section( "footer_section", array(
    "title"       => __( "Sekcja stopki", "dominium" ),
    "description" => __( "Dane kontaktowe (numer telefonu, email) oraz linki do kont społecznościowych ustawiane są w Sekcja nad menu. Natomiast nawigację w stopcę ustawiamy w sekcji Menu.", "dominium" ),
    "priority"    => 70,
  ));

  // Company name
  $wp_customize->add_setting( "company_shortname", array(
    "default"           =>   $defaults['footer']['company_shortname'],
    "sanitize_callback" => "sanitize_text_field",
  ));

  $wp_customize->add_control( "company_shortname_control", array(
    "label"    => __( "Skrócona nazwa firmy", "dominium" ),
    "section"  => "footer_section",
    "settings" => "company_shortname",
    "type"     => "text",
  ));

  // Company fullname
  $wp_customize->add_setting( "company_fullname", array(
    "default"           =>   $defaults['footer']['company_fullname'],
    "sanitize_callback" => "sanitize_text_field",
  ));

  $wp_customize->add_control( "company_fullname_control", array(
    "label"    => __( "Pełna nazwa firmy", "dominium" ),
    "section"  => "footer_section",
    "settings" => "company_fullname",
    "type"     => "text",
  ));

  // Address 1
  $wp_customize->add_setting( "company_addres_1", array(
    "default"           =>   $defaults['footer']['company_address_1'],
    "sanitize_callback" => "sanitize_text_field",
  ));

  $wp_customize->add_control( "company_address_1_control", array(
    "label"    => __( "Adres", "dominium" ),
    "section"  => "footer_section",
    "settings" => "company_addres_1",
    "type"     => "text",
  ));

  // Address 2
  $wp_customize->add_setting( "company_addres_2", array(
    "default"           =>   $defaults['footer']['company_address_2'],
    "sanitize_callback" => "sanitize_text_field",
  ));

  $wp_customize->add_control( "company_address_2_control", array(
    "label"    => __( "Dalszy ciąg adresu", "dominium" ),
    "section"  => "footer_section",
    "settings" => "company_addres_2",
    "type"     => "text",
  ));

  // NIP
  $wp_customize->add_setting( "company_nip", array(
    "default"           =>   $defaults['footer']['company_nip'],
    "sanitize_callback" => "sanitize_text_field",
  ));

  $wp_customize->add_control( "company_nip_control", array(
    "label"    => __( "NIP", "dominium" ),
    "section"  => "footer_section",
    "settings" => "company_nip",
    "type"     => "text",
  ));

  // REGON
  $wp_customize->add_setting( "company_regon", array(
    "default"           =>   $defaults['footer']['company_regon'],
    "sanitize_callback" => "sanitize_text_field",
  ));

  $wp_customize->add_control( "company_regon_control", array(
    "label"    => __( "REGON", "dominium" ),
    "section"  => "footer_section",
    "settings" => "company_regon",
    "type"     => "text",
  ));

  // Other 1
  $wp_customize->add_setting( "other_1", array(
    "default"           =>   $defaults['footer']['other_1'],
    "sanitize_callback" => "sanitize_text_field",
  ));

  $wp_customize->add_control( "other_1_control", array(
    "label"    => __( "Inne dane 1", "dominium" ),
    "section"  => "footer_section",
    "settings" => "other_1",
    "type"     => "text",
  ));

  // Other 2
  $wp_customize->add_setting( "other_2", array(
    "default"           =>   $defaults['footer']['other_2'],
    "sanitize_callback" => "sanitize_text_field",
  ));

  $wp_customize->add_control( "other_2_control", array(
    "label"    => __( "Inne dane 2", "dominium" ),
    "section"  => "footer_section",
    "settings" => "other_2",
    "type"     => "text",
  ));

  // Separator
  $wp_customize->add_setting( 'separator_copyright', [
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  
  $wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'separator_copyright',
    [
      'section'     => 'footer_section',
      'settings'    => 'separator_copyright',
      'type'        => 'hidden',
      'description' => '<hr style="margin:15px 0;border:0;border-top:1px solid #ccc;">',
    ]
  ));

  // Title copyright
  $wp_customize->add_setting( "title_copyright", array(
    "default"           =>   $defaults['footer']['title_copyright'],
    "sanitize_callback" => "sanitize_text_field",
  ));

  $wp_customize->add_control( "title_copyright_control", array(
    "label"    => __( "Tytuł praw autorskich", "dominium" ),
    "section"  => "footer_section",
    "settings" => "title_copyright",
    "type"     => "text",
  ));

  // Description copyright
  $wp_customize->add_setting( "description_copyright", array(
    "default"           =>   $defaults['footer']['description_copyright'],
    "sanitize_callback" => "sanitize_textarea_field",
  ));

  $wp_customize->add_control( "description_copyright_control", array(
    "label"    => __( "Opis praw autorskich", "dominium" ),
    "section"  => "footer_section",
    "settings" => "description_copyright",
    "type"     => "textarea",
  ));
};
add_action( "customize_register", "dominium_custom_footer_support" );
?>