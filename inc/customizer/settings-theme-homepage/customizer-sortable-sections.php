<?php
function dominium_sortable_sections_support( $wp_customize ) {

  require_once get_template_directory() . '/inc/class/class-dominium-sortable-sections-homepage.php';

  $wp_customize->add_section( "sortable_sections", array(
    "title"       => __( "Ustawienia sekcji", "dominium" ),
    "description" => __( "Ustaw kolejność oraz widoczność sekcji", "dominium" ),
    "panel"       => "homepage_panel",
    "priority"    => 10,
  ));
  
  $wp_customize->add_setting('sortable_custom_list', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control(new Dominium_sortable_sections_homepage($wp_customize, 'sortable_custom_list', array(
    'label' => __('Wybierz opcję', 'dominium'),
    'section' => 'sortable_sections',
    'settings' => 'sortable_custom_list',
  )));

}
add_action( "customize_register", "dominium_sortable_sections_support" );
?>