<?php 
get_header();

$defaults = require get_template_directory() . '/inc/theme-defaults.php';
$default_sections = $defaults['sections_front_page'];

$custom_order = get_theme_mod('sortable_custom_list');
$sections = [];

if ( !empty($custom_order) ) {
  $decoded = json_decode($custom_order, true);

  if (is_array($decoded)) {
    foreach ($decoded as $item) {
      if (!empty($item['visible']) && !empty($item['section'])) {
        $sections[] = $item['section'];
      }
    }
  }
}

if (empty($sections)) {
  $sections = array_column($default_sections, 'section');
}

?>

<main>
  <?php 
  get_template_part('template_parts/front_page/header','main');

  foreach ( $sections as $section_id ) {
    $allowed = array_column($default_sections, 'section');
    if ( in_array($section_id, $allowed, true) ) {
      get_template_part('template_parts/front_page/' . $section_id, 'main');
    }
  }
  ?>
</main>

<?php get_footer(); ?>
