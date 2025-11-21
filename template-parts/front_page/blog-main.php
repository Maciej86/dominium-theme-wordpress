
<?php
$blog_cat_id = get_theme_mod('blog_post_category');
$blog_title = get_theme_mod('blog_post_title', __('Ostatnie wpisy na blogu', 'dominium'));
$blog_count = get_theme_mod('blog_home_posts_count', 3);
$blog_layout =  get_theme_mod('dominium_category_' . $blog_cat_id . '_layout', 'layout-grid');

if (!empty($blog_cat_id) && term_exists($blog_cat_id, 'category')) {
  $category = get_category($blog_cat_id);
  $category_name = $category->name;
  $category_description = $category->description;

  $section_id = sanitize_title($category_name);
} else {
  $category_name = __('Ostatnie wpisy na blogu', 'dominium');
  $category_description = "";
  $section_id = 'blog';
}

if ( $blog_count === 0 ) {
  $blog_count = -1;
}
?>

<section id="<?php echo esc_attr($section_id); ?>" class="grid constructions scroll_margin">
  <div class="container">
    <h1 class="title_section"><?php echo esc_html($blog_title); ?></h1>
    <?php if (!empty($category_description)) : ?>
      <p class="grid__description"><?php echo esc_html($category_description); ?></p>
    <?php endif; ?>

    <?php
      if (!empty($blog_cat_id) && term_exists($blog_cat_id, 'category')) {
        $args = array(
          'posts_per_page' => (int) $blog_count,
          'cat' => (int) $blog_cat_id,
          'post_status' => 'publish',
        );

        $query = new WP_Query($args);
        set_query_var('query', $query);
        set_query_var('category_id', $blog_cat_id);
        
        get_template_part('template-parts/category_layout/' . $blog_layout);

      } else {
        // not catgory
      }
    ?>
  </div>
</section>