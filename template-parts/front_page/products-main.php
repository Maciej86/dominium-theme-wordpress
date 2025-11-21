
<?php
$product_cat_id = get_theme_mod('products_post_category');
$products_count = get_theme_mod('products_home_posts_count', 3);
$products_layout = get_theme_mod('dominium_category_' . $product_cat_id . '_layout', 'layout-grid');

if (!empty($product_cat_id) && term_exists($product_cat_id, 'category')) {
  $category = get_category($product_cat_id);
  $category_name = $category->name;
  $category_description = $category->description;

  $section_id = sanitize_title($category_name);
} else {
  $category_name = __('Konstrukcje', 'dominium');
  $category_description = "";
  $section_id = 'konstrukcje';
}

if ( $products_count === 0 ) {
  $products_count = -1;
}
?>

<section id="<?php echo esc_attr($section_id); ?>" class="cards scroll_margin">
  <div class="container">

    <h1 class="title_section"><?php echo esc_html($category_name); ?></h1>
    <?php if (!empty($category_description)) : ?>
      <p class="cards__description"><?php echo esc_html($category_description); ?></p>
    <?php endif; ?>

    <?php
      if (!empty($product_cat_id) && term_exists($product_cat_id, 'category')) {
        $args = array(
          'posts_per_page' => (int) $products_count,
          'cat' => (int) $product_cat_id,
          'post_status' => 'publish',
        );

        $query = new WP_Query($args);
        set_query_var('query', $query);
        set_query_var('category_id', $product_cat_id);
        get_template_part('template-parts/category_layout/' . $products_layout);

      } else {
        // not catgory
      }
    ?>
    
  </div>
</section>