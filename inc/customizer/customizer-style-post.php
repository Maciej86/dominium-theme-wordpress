<?php
function dominium_style_post_panel( $wp_customize ) {
  $wp_customize->add_panel( 'style_post_panel', array(
    'title'       => __( 'Ustawienia wyglądu wpisów', 'dominium' ),
    'description' => __( 'Konfiguruj wygląd wyświetlania postó w kategoriach', 'dominium' ),
    'priority'    => 50,
  ));
}
add_action( 'customize_register', 'dominium_style_post_panel' );
