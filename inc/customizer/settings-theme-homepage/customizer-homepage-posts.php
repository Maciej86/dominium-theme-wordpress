<?php
// Setings Products
function dominium_custom_homepage_posts_support( $wp_customize ) {
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';
  
  $wp_customize->add_section( 'homepage_posts', array(
    'title'       => __( 'Sekcja - Produkty, Blog', 'dominium' ),
    'description' => __( 'Wybierz kategorię wpisów do wyświetlenia w sekcji Produkty oraz Blog', 'dominium' ),
    "panel"       => "homepage_panel",
    'priority'    => 60,
  ));

  $categories = get_categories( array(
    'hide_empty' => false,
  ));

  if ( empty( $categories )) {
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'no_categories_info',
        array(
          'label'       => __('Brak dostępnych kategorii', 'dominium'),
          'section'     => 'homepage_posts',
          'settings'    => [],
          'type'        => 'hidden',
          'description' => __('Utwórz przynajmniej jedną kategorię, aby móc ją wybrać.', 'dominium'),
        )
    ));
  } else {
    $cat_choices = array();
    foreach ( $categories as $cat ) {
        $cat_choices[$cat->term_id] = $cat->name;
    }
  }

  // === SETTINGS PRODUCTS ==== 

    // Select category Products
    $wp_customize->add_setting( 'products_post_category', array(
      'sanitize_callback' => 'absint',
  ));

  $wp_customize->add_control( 'post_products_category_control', array(
      'label'    => __( 'Wybierz kategorię Produktów', 'dominium' ),
      'section'  => 'homepage_posts',
      'settings' => 'products_post_category',
      'type'     => 'select',
      'choices'  => $cat_choices,
  ));

  // Number of entries to display on the home page
  $wp_customize->add_setting('products_home_posts_count', [
    'default'           => 3,
    'sanitize_callback' => 'absint',
  ]);

  $wp_customize->add_control('products_home_posts_count_control', [
    'label'       => __('Liczba produktów do wyświetlenia na stronie głównej', 'dominium'),
    'section'     => 'homepage_posts',
    'settings'    => 'products_home_posts_count',
    'type'        => 'number',
    "description" => __( "Wartość zero spowoduje wyświetlenie wszystkich wpisów.", "dominium" ),
    'input_attrs' => [
        'min'  => 0,
        'step' => 1,
    ],
  ]);

  // Separator
  $wp_customize->add_setting( 'separator', [
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  
  $wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'separator',
    [
      'section'     => 'homepage_posts',
      'settings'    => 'separator',
      'type'        => 'hidden',
      'description' => '<hr style="margin:15px 0;border:0;border-top:1px solid #ccc;">',
    ]
  ));

  // === SETTINGS BLOG ==== 

  // Select category Blog
  $wp_customize->add_setting( 'blog_post_category', array(
    'sanitize_callback' => 'absint',
  ));

  $wp_customize->add_control( 'blog_post_category_control', array(
    'label'    => __( 'Wybierz kategorię Bloga', 'dominium' ),
    'section'  => 'homepage_posts',
    'settings' => 'blog_post_category',
    'type'     => 'select',
    'choices'  => $cat_choices,
  ));
  
  // Title blog homepage 
  $wp_customize->add_setting( 'blog_post_title', array(
    'default'           => __('Ostatnie wpisy na blogu', 'dominium'),
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control( 'blog_post_title_control', array(
    'label'    => __('Tytuł sekcji bloga na strone głównej', 'dominium'),
    'section'  => 'homepage_posts',
    'settings' => 'blog_post_title',
    'type'     => 'text',
  ));

  // Number of entries to display on the home page
  $wp_customize->add_setting('blog_home_posts_count', [
    'default'           => 3,
    'sanitize_callback' => 'absint',
  ]);

  $wp_customize->add_control('blog_home_posts_count_control', [
    'label'       => __('Liczba artykułów do wyświetlenia na stronie głównej', 'dominium'),
    'section'     => 'homepage_posts',
    'settings'    => 'blog_home_posts_count',
    'type'        => 'number',
    "description" => __( "Wartość zero spowoduje wyświetlenie wszystkich wpisów.", "dominium" ),
    'input_attrs' => [
        'min'  => 0,
        'step' => 1,
    ],
  ]);

};
add_action( "customize_register", "dominium_custom_homepage_posts_support" );

function dominium_sanitize_select( $input, $setting ) {
  $input = sanitize_text_field( $input );
  $choices = $setting->manager->get_control( $setting->id )->choices;
  return ( array_key_exists( $input, $choices ) ? $input : array_key_first( $choices ) );
}
?>