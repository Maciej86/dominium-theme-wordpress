<?php
// Settings count
function dominium_custom_count_support( $wp_customize ) {
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';

  $wp_customize->add_section( "count_section", array(
    "title"       => __( "Sekcja - Odliczanie", "dominium" ),
    "description" => __( "Ustawienia sekcji odliczania na stronie głównej", "dominium" ),
    "panel"       => "homepage_panel",
    "priority"    => 40,
  ));

  foreach ( $defaults['counts'] as $i => $count ) {
    // Add title count
    $count_title = "count_title_$i";
    
    $wp_customize->add_setting( $count_title , array(
      "default"           => $count["title"],
      "sanitize_callback" => "sanitize_text_field",
      "transport"         => "refresh",
    ));

    $wp_customize->add_control( "count_title_control_$i", array(
      "label"    => sprintf( __('Tytuł odliczania %d', 'dominium'), $i ),
      "section"  => "count_section",
      "settings" => $count_title,
      "type"     => "text",
    ));

    // Add number count
    $count_number = "count_number_$i";

    $wp_customize->add_setting( $count_number, array(
      "default"           => $count["number"],
      "sanitize_callback" => "absint",
      "transport"         => "refresh",
    ));

    $wp_customize->add_control( "count_number_control_$i", array(
      "label"    => sprintf( __('Wartość odliczania %d', 'dominium'), $i ),
      "section"  => "count_section",
      "settings" => $count_number,
      "type"     => "number",
    ));

    // Separator
    $separator_id = "separator_steps_$i";

    $wp_customize->add_setting( $separator_id, [
      'sanitize_callback' => 'sanitize_text_field',
    ]);
    
    $wp_customize->add_control( new WP_Customize_Control(
      $wp_customize,
      $separator_id,
      [
        'section'     => 'count_section',
        'settings'    => $separator_id,
        'type'        => 'hidden',
        'description' => '<hr style="margin:15px 0;border:0;border-top:1px solid #ccc;">',
      ]
    ));
  };
};
add_action( "customize_register", "dominium_custom_count_support" );
?>