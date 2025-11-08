<?php
function dominium_homepage_panel( $wp_customize ) {
  $wp_customize->add_panel( 'homepage_panel', array(
    'title'       => __( 'Ustawienia motywu strony głównej', 'dominium' ),
    'description' => __( 'Zarządzaj sekcjami widocznymi na stronie głównej.', 'dominium' ),
    'priority'    => 30,
  ));
}
add_action( 'customize_register', 'dominium_homepage_panel' );
