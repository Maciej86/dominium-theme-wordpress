<?php
// Settings stepers
function dominium_custom_stepers_support( $wp_customize ) {
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';

  $wp_customize->add_section( "steps_section", array(
    "title"       => __( "Sekcja - Kroki", "dominium" ),
    "description" => __( "Ustawienia sekcji kroków na stronie głównej", "dominium" ),
    "panel"       => "homepage_panel",
    "priority"    => 30,
  ));

  foreach ( $defaults['steps'] as $i => $step ) {
    // Add title steps
    $wp_customize->add_setting( "step_title_$i", array(
      "default"           => $step["title"],
      "sanitize_callback" => "sanitize_text_field",
      "transport"         => "refresh",
    ));

    $wp_customize->add_control( "step_title_control_$i", array(
      "label"    => sprintf( __('Tytuł kroku %d', 'dominium'), $i ),
      "section"  => "steps_section",
      "settings" => "step_title_$i",
      "type"     => "text",
    ));

    // Add description steps
    $wp_customize->add_setting( "step_description_$i", array(
      "default"           => $step["description"],
      "sanitize_callback" => "sanitize_textarea_field",
      "transport"         => "refresh",
    ));

    $wp_customize->add_control( "step_description_control_$i", array(
      "label"    => sprintf( __('Treść kroku %d', 'dominium'), $i ),
      "section"  => "steps_section",
      "settings" => "step_description_$i",
      "type"     => "textarea",
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
        'section'     => 'steps_section',
        'settings'    => $separator_id,
        'type'        => 'hidden',
        'description' => '<hr style="margin:15px 0;border:0;border-top:1px solid #ccc;">',
      ]
    ));
  };
};
add_action( "customize_register", "dominium_custom_stepers_support" );
?>