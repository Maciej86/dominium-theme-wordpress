<?php
function dominium_style_layout_card_support( $wp_customize ) {
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';

  $wp_customize->add_section( 'style_layout_card_post', array(
    'title'       => __( 'Edycja wpisów typu "Karty pełne" ', 'dominium' ),
    'description' => __( 'Zmień wygląd wpisu w kategorii, dla której przypisano styl "Karty pełne" ', 'dominium' ),
    "panel"       => "style_post_panel",
    'priority'    => 20,
  ));

  // Position image
  $wp_customize->add_setting("layout_card_position_image", array(
    'default'           => $defaults['settings_layout_card']['position_image'],
    'sanitize_callback' => 'dominium_sanitize_layout_position_image',
  ));

  $wp_customize->add_control( "layout_position_image_control", array(
    'label'    => __( 'Wyświetlanie obrazka', 'dominium' ),
    'section'  => 'style_layout_card_post',
    'settings' => 'layout_card_position_image',
    'type'     => 'select',
    'choices'  => array(
        'left'  => __( 'Z lewej strony', 'dominium' ),
        'right' => __( 'Z prawej strony', 'dominium' ),
        'left-right' => __( 'Naprzemiennie', 'dominium' ),
    ),
    "description" => __( "Przy małych rozdzielczościach, na przykład na urządzeniach typu smartphone, elementy będą układać się jeden pod drugim.", "dominium" ),
  ));

  // Position date
  $wp_customize->add_setting("layout_card_date", array(
    'default'           => $defaults['settings_layout_card']['date'],
    'sanitize_callback' => 'dominium_sanitize_layout_card_date',
  ));

  $wp_customize->add_control( "layout_card_date_control", array(
    'label'    => __( 'Wyświetlanie daty', 'dominium' ),
    'section'  => 'style_layout_card_post',
    'settings' => 'layout_card_date',
    'type'     => 'select',
    'choices'  => array(
        'up-title'  => __( 'Nad tytułem', 'dominium' ),
        'down-title' => __( 'Pod Tytułem', 'dominium' ),
        'down-article' => __( 'Pod treścią', 'dominium' ),
    ),
  ));

}

add_action( "customize_register", "dominium_style_layout_card_support" );

function dominium_sanitize_layout_position_image( $value ) {
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';
  $allowed = array( 'left', 'right', 'left-right' );
  return in_array( $value, $allowed, true ) ? $value : $defaults['settings_layout_card']['position_image'];
}

function dominium_sanitize_layout_card_date( $value ) {
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';
  $allowed = array( 'up-title', 'down-title', 'down-article' );
  return in_array( $value, $allowed, true ) ? $value : $defaults['settings_layout_card']['date'];
}

?>