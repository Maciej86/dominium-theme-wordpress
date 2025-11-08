<?php
$defaults = require get_template_directory() . '/inc/theme-defaults.php';
$default_image = get_template_directory_uri() . '/images/' . $defaults['write_to_us']['image'];

$title = get_theme_mod('write_to_us_title', $defaults['write_to_us']['title']);
$description = get_theme_mod('write_to_us_description', $defaults['write_to_us']['description']);
$button_text = get_theme_mod('write_to_us_button_text', $defaults['write_to_us']['button-text']);
$contact_page_id = get_theme_mod('write_to_us_url');
$contact_page_url = $contact_page_id ? get_permalink($contact_page_id) : '#';
$image = get_theme_mod('write_to_us_image', $default_image);
?>

<section class="write_to_us js-image-background" data-image="<?php echo esc_url($image); ?>">
    <div class="container">
      <div class="write_to_us__conteiner">
        <div class="write_to_us__conteiner__left">
          <h2 class="write_to_us__conteiner__left__title"><?php echo esc_html($title); ?></h2>
          <div class="page_style"><?php echo esc_html($description); ?></div>
        </div>
        <div class="write_to_us__conteiner__right">
          <a href="<?php echo esc_url($contact_page_url); ?>" class="write_to_us__conteiner__right__link"><?php echo esc_html($button_text); ?></a>
        </div>
      </div>
    </div>
  </section>