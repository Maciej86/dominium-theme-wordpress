<?php
function dominium_custom_contact_page_support( $wp_customize ) {
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';

// Section Contact page
$wp_customize->add_section( 'contact_section', array(
  'title'       => __( 'Ustawienia strony kontaktowej', 'dominium' ),
  'description' => __( 'Tutaj możesz ustawić zawartość strony kontaktowej.', 'dominium' ),
  'priority'    => 80,
) );

// Page data contact
$wp_customize->add_setting( 'contact_page_content', array(
  'sanitize_callback' => 'absint',
));

$wp_customize->add_control( 'contact_page_content', array(
  'label'   => __( 'Strona z danymi kontaktowymi', 'dominium' ),
  'section' => 'contact_section',
  'type'    => 'dropdown-pages',
));

// Form contact - shortcode CF7
$wp_customize->add_setting( 'contact_form_shortcode', array(
  'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control( 'contact_form_shortcode', array(
  'label'       => __( 'Shortcode formularza kontaktowego', 'dominium' ),
  'description' => __( 'Wklej shortcode np. [contact-form-7 id="123" title="Formularz"]', 'dominium' ),
  'section'     => 'contact_section',
  'type'        => 'text',
));

// Maps Google iframe
$wp_customize->add_setting( 'contact_map_iframe', array(
  'default'           => $defaults['map_google'],
  'sanitize_callback' => function( $input ) {
    return wp_kses( $input, array(
      'iframe' => array(
        'src'             => true,
        'width'           => true,
        'height'          => true,
        'style'           => true,
        'allowfullscreen' => true,
        'loading'         => true,
        'referrerpolicy'  => true,
      ),
    ));
  },
));

$wp_customize->add_control( 'contact_map_iframe', array(
  'label'       => __( 'Mapa Google (pełny kod iframe)', 'dominium' ),
  'description' => __( 'Wklej cały kod iframe z Google Maps (np. zaczynający się od &lt;iframe ...&gt;).', 'dominium' ),
  'section'     => 'contact_section',
  'type'        => 'textarea',
));

}
add_action( 'customize_register', 'dominium_custom_contact_page_support' );
