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

    // Layout 
    $layout_setting_id = 'dominium_category_' . $cat_id . '_layout';

    $wp_customize->add_setting( $layout_setting_id, array(
			'default'           => 'layout-grid',
			'sanitize_callback' => 'dominium_sanitize_layout_choice',
    ));

    $wp_customize->add_control( $layout_setting_id, array(
			'label'    => __( 'Układ wpisów', 'dominium' ),
			'section'  => $section_id,
			'type'     => 'select',
			'choices'  => $defaults['category_layouts'],
			'description' => 'Wybierz styl w jakim będą wyświetlane wpisy w kategorii.'
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

    /* Read more */
    $readmore_setting_id = 'dominium_category_' . $cat_id . '_readmore_text';
    $wp_customize->add_setting( $readmore_setting_id, array(
			'default'           => $defaults['category_texts']['read_more'],
			'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( $readmore_setting_id, array(
			'label'    => __( 'Tekst przy skrócie wpisu (np. "Czytaj więcej")', 'dominium' ),
			'section'  => $section_id,
			'type'     => 'text',
    ));

    /* See all */
    $seeall_setting_id = 'dominium_category_' . $cat_id . '_seeall_text';
    $wp_customize->add_setting( $seeall_setting_id, array(
			'default'           => $defaults['category_texts']['see_all'],
			'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( $seeall_setting_id, array(
			'label'    => __( 'Tekst linku do wszystkich wpisów (np. "Zobacz wszystkie")', 'dominium' ),
			'section'  => $section_id,
			'type'     => 'text',
    ));

    /* Empty category */
    $empty_setting_id = 'dominium_category_' . $cat_id . '_empty_text';
    $wp_customize->add_setting( $empty_setting_id, array(
			'default'           => $defaults['category_texts']['empty_category'],
			'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( $empty_setting_id, array(
			'label'    => __( 'Tekst przy pustej kategorii (np. "Brak wpisów")', 'dominium' ),
			'section'  => $section_id,
			'type'     => 'text',
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
  return in_array( $value, $allowed, true ) ? $value : 'layout-grid';
}
?>