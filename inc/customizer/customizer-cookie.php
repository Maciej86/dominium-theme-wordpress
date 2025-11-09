<?php
function dominium_custom_cookie_support( $wp_customize ) {
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';

  // Add panel cookie
  $wp_customize->add_section( "cookie_section", array(
    "title"       => __( "Ustawienia ciasteczek", "dominium" ),
    "description" => __( "Ustawienia wyświetlania informacji o ciasteczkach.", "dominium" ),
    "priority"    => 80,
  ));

    // Visibility checkbox
    $wp_customize->add_setting( "cookie_visible", array(
      "default"           => $defaults['cookie']['visible'],
      "sanitize_callback" => "wp_validate_boolean", 
    ));
  
    $wp_customize->add_control( "cookie_visible_control", array(
      "label"    => __( "Włącz lub wyłącz domyślną obsługę ciastek (cookie).", "dominium" ),
      "section"  => "cookie_section",
      "settings" => "cookie_visible",
      "type"     => "checkbox",
      "description" => __( "Motyw Dominium, domyślnie obsługuje ciasteczka (cookie). Odznacz aby wyłączyć domyślną obsługę ciasteczek. Wówczas możesz zainstalować dowolną wtyczkę do obłsugi ciastek.", "dominium" ),
    ));
  

  // Description cookie
  $wp_customize->add_setting( 'cookie_message_text', array(
    'default'           => $defaults['cookie']['description'],
    'sanitize_callback' => 'sanitize_textarea_field',
  ));

  $wp_customize->add_control( 'cookie_message_text', array(
    'label'   => __( 'Treść komunikatu o ciasteczkach', 'dominium' ),
    'section' => 'cookie_section',
    'type'    => 'textarea',
  ));

  // Select page
  $wp_customize->add_setting( 'cookie_page_link', array(
    'sanitize_callback' => 'absint', 
  ));

  $wp_customize->add_control( 'cookie_page_link', array(
    'label'   => __( 'Strona z polityką cookies', 'dominium' ),
    'section' => 'cookie_section',
    'type'    => 'dropdown-pages',
  ));

  // Button accept all cookie
  $wp_customize->add_setting( 'cookie_accept_all_text', array(
    'default' => $defaults['cookie']['button_all'],
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control( 'cookie_accept_all_text', array(
    'label'   => __( 'Tekst przycisku: Akceptuj wszystkie', 'dominium' ),
    'section' => 'cookie_section',
    'type'    => 'text',
  ));

  // Button accept necessary cookie
  $wp_customize->add_setting( 'cookie_accept_necessary_text', array(
    'default' => $defaults['cookie']['button_necessary'],
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control( 'cookie_accept_necessary_text', array(
    'label'   => __( 'Tekst przycisku: Akceptuj niezbędne', 'dominium' ),
    'section' => 'cookie_section',
    'type'    => 'text',
  ));

  // More info
  $wp_customize->add_setting( 'cookie_more_info_text', array(
    'default'           => __( 'Więcej informacji', 'dominium' ),
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control( 'cookie_more_info_text', array(
    'label'   => __( 'Tekst przycisku: Więcej informacji', 'dominium' ),
    'section' => 'cookie_section',
    'type'    => 'text',
  ));

  // Separator
  $wp_customize->add_setting( 'separator_cookie_1', [
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  
  $wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'separator_cookie_1',
    [
      'section'     => 'cookie_section',
      'settings'    => 'separator_cookie_1',
      'type'        => 'hidden',
      'description' => '<hr style="margin:15px 0;border:0;border-top:1px solid #ccc;">',
    ]
  ));

  // --- Nowe ustawienie dla blokowanych domen iframe ---
  $wp_customize->add_setting( 'blocked_iframe_domains', [
    'default'           => "youtube.com\nvimeo.com\ngoogle.com/maps",
    'sanitize_callback' => function( $input ) {
      $lines = array_map( 'trim', explode( "\n", $input ) );
      return implode( "\n", array_filter( $lines ) );
    },
  ]);

  $wp_customize->add_control( 'blocked_iframe_domains', [
    'label'       => __( 'Blokowane domeny iframe', 'dominium' ),
    'description' => __( 'Podaj listę domen, które wymagają akceptacji wszystkich plików cookie. Jedna domena w linii (np. youtube.com, vimeo.com, google.com/maps).', 'dominium' ),
    'section'     => 'cookie_section',
    'type'        => 'textarea',
  ]);

  $wp_customize->add_setting( 'cookie_iframe_text', array(
    'default'           => 'Aby wyświetlić zawartość z <strong>{{DOMAIN}}</strong>, zaakceptuj wszystkie pliki cookie.',
    'sanitize_callback' => function( $input ) {
        // Zezwalamy tylko na <strong>
        return wp_kses( $input, array( 'strong' => array() ) );
    },
  ));

  $wp_customize->add_control( 'cookie_iframe_text', array(
      'type'        => 'textarea',
      'section'     => 'cookie_section', // ← Twoja sekcja
      'label'       => __( 'Treść komunikatu blokady iframe', 'dominium' ),
      'description' => __( 'Użyj {{DOMAIN}} jako miejsca, gdzie pojawi się nazwa źródła (np. youtube.com).', 'dominium' ),
  ));

  $wp_customize->add_setting( 'cookie_iframe_button', array(
      'default'           => 'Ustaw cookies',
      'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control( 'cookie_iframe_button', array(
      'type'        => 'text',
      'section'     => 'cookie_section',
      'label'       => __( 'Tekst przycisku blokady iframe', 'dominium' ),
  ));

  // Separator
  $wp_customize->add_setting( 'separator_cookie_2', [
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  
  $wp_customize->add_control( new WP_Customize_Control(
    $wp_customize,
    'separator_cookie_2',
    [
      'section'     => 'cookie_section',
      'settings'    => 'separator_cookie_2',
      'type'        => 'hidden',
      'description' => '<hr style="margin:15px 0;border:0;border-top:1px solid #ccc;">',
    ]
  ));

  // Display type (full / modal)
  $wp_customize->add_setting( 'cookie_display_type', array(
    'default'           => $defaults['cookie']['display_type'],
    'sanitize_callback' => function( $input ) {
      $valid = array( 'full', 'modal' );
      return in_array( $input, $valid, true ) ? $input : 'full';
    },
  ) );
  
  $wp_customize->add_control( 'cookie_display_type', array(
    'label'       => __( 'Sposób wyświetlania komunikatu', 'dominium' ),
    'section'     => 'cookie_section',
    'type'        => 'select',
    'choices'     => array(
      'full'  => __( 'Pełna szerokość', 'dominium' ),
      'modal' => __( 'Okienko modalne', 'dominium' ),
    ),
    'description' => __( '"Okienko modalne" przy mniejszej rozdzielczości, na przykłąd na telefonie, będzie wyświetlane na całą szerokość.', 'dominium' ),
  ));

  // Display side (left / right)
  $wp_customize->add_setting( 'cookie_display_side', array(
    'default'           => $defaults['cookie']['display_side'],
    'sanitize_callback' => function( $input ) {
      $valid = array( 'left', 'right' );
      return in_array( $input, $valid, true ) ? $input : 'full';
    },
  ) );
  
  $wp_customize->add_control( 'cookie_display_side', array(
    'label'       => __( 'Określ położenie modala', 'dominium' ),
    'section'     => 'cookie_section',
    'type'        => 'select',
    'choices'     => array(
      'left'  => __( 'Po lewej stronie', 'dominium' ),
      'right' => __( 'Po prawej stronie', 'dominium' ),
    ),
    'description' => __( 'To ustawienie działa tylko kiedy w "Sposób wyświetlania komunikatu" wybrano "Okienko modalne".', 'dominium' ),
  ));

};
add_action( "customize_register", "dominium_custom_cookie_support" );
?>