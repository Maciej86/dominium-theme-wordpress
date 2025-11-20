<?php 
  get_header();

  $cat_id = get_queried_object_id();
  $layout = get_theme_mod('dominium_category_' . $cat_id . '_layout', 'layout-grid');
  $template_part = locate_template("template-parts/category_layout/{$layout}.php");

  $category = get_category($cat_id);
  $category_name = $category ? $category->name : __('Kategoria', 'dominium');
?>

<main class="page_main">
  <div class="container">
    <h1 class="title_section"><?php echo esc_html($category_name); ?></h1>
    
      <?php
        if ($template_part) {
          set_query_var('category_id', $cat_id);
          load_template($template_part, true);
        } else {
          echo '<p>' . __('Nie znaleziono szablonu dla wybranego układu.', 'dominium') . '</p>';
        }
      ?>

    </div>
  </div>
</main>

<?php get_footer(); ?>
