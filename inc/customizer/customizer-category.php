<?php
function dominium_custom_category( $wp_customize ) {
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';

  // Download all category
  $categories = get_categories( array( 'hide_empty' => false ) );

  // Section in customizer
  $wp_customize->add_panel( 'dominium_category_panel', array(
      'title'       => __( 'Ustawienia kategorii', 'dominium' ),
      'description' => __( 'Wybierz sposób wyświetlania daty i layoutu dla każdej kategorii.', 'dominium' ),
      'priority'    => 40,
  ) );

  foreach ( $categories as $category ) {
      $cat_id = $category->term_id;
      $cat_label = $category->name;
      $section_id = 'dominium_category_' . $cat_id . '_section';

      $wp_customize->add_section( $section_id, array(
        'title'    => sprintf( __( 'Kategoria: %s', 'dominium' ), $cat_label ),
        'panel'    => 'dominium_category_panel',
        'priority' => 10 + $cat_id,
    ));

    // Date post
    $date_setting_id = 'dominium_category_' . $cat_id . '_date_display';

    $wp_customize->add_setting( $date_setting_id, array(
        'default'           => 'created',
        'sanitize_callback' => 'dominium_sanitize_date_display',
    ));

    $wp_customize->add_control( $date_setting_id, array(
        'label'    => __( 'Data wpisu', 'dominium' ),
        'section'  => $section_id,
        'type'     => 'select',
        'choices'  => array(
            'created'  => __( 'Pokaż datę utworzenia', 'dominium' ),
            'modified' => __( 'Pokaż datę modyfikacji', 'dominium' ),
            'none'     => __( 'Nie pokazuj daty', 'dominium' ),
        ),
    ));

    // Layout 
    $layout_setting_id = 'dominium_category_' . $cat_id . '_layout';

    $wp_customize->add_setting( $layout_setting_id, array(
        'default'           => 'blog-basic',
        'sanitize_callback' => 'dominium_sanitize_layout_choice',
    ));

    $wp_customize->add_control( $layout_setting_id, array(
        'label'    => __( 'Układ wpisów', 'dominium' ),
        'section'  => $section_id,
        'type'     => 'select',
        'choices'  => $defaults['category_layouts'],
    ));
  }
}
add_action( 'customize_register', 'dominium_custom_category' );

function dominium_sanitize_date_display( $value ) {
    $allowed = array( 'created', 'modified', 'none' );
    return in_array( $value, $allowed, true ) ? $value : 'created';
}

function dominium_sanitize_layout_choice( $value ) {
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';
  $allowed = array_keys( $defaults['category_layouts'] );
  return in_array( $value, $allowed, true ) ? $value : 'blog-basic';
}
?>