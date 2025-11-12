<?php
$defaults = require get_template_directory() . '/inc/theme-defaults.php';

$query = get_query_var('query');
$cat_id = get_query_var('category_id');
$products_date_display = get_theme_mod('dominium_category_' . $cat_id . '_date_display', 'created');
$products_red_more = get_theme_mod('dominium_category_' . $cat_id . '_readmore_text', $defaults['category_texts']['read_more']);
$products_see_all = get_theme_mod('dominium_category_' . $cat_id . '_seeall_text', $defaults['category_texts']['see_all']);
$products_empty_category = get_theme_mod('dominium_category_' . $cat_id . '_empty_text', $defaults['category_texts']['empty_category']);

$setting_layout_position_image = get_theme_mod('layout_card_position_image', $defaults['settings_layout_card']['position_image']);
$setting_layout_date = get_theme_mod('layout_card_date', $defaults['settings_layout_card']['date']);

if (empty($query)) {
  global $wp_query;
  $query = $wp_query;
}

if ($query->have_posts()) :

  while ($query->have_posts()) : $query->the_post(); 

    $date_post = '';
    if ($products_date_display !== 'none') {
      $date_value = ($products_date_display === 'created') 
        ? get_the_date('d.m.Y') 
        : get_the_modified_date('d.m.Y');

      $date_post = '<div class="page_date"><span class="material-symbols-outlined">calendar_month</span>'. $date_value . '</div>';
    }

    ?>
      <div class="products__box products__box--<?php echo $setting_layout_position_image ?>">
        <div
          class="products__box_image products__box_image--<?php echo $setting_layout_position_image ?> js-image-background"
          data-image="<?php the_post_thumbnail_url('medium'); ?>"
        ></div>
        <div class="products__box__description products__box__description--<?php echo $setting_layout_position_image ?>">
          <div>

            <?php if($setting_layout_date === "up-title") : ?>
              <?php echo $date_post; ?>
            <?php endif; ?>

            <h2 class="products__box__description__title">
              <a href="<?php the_permalink(); ?>" class="products__box__description__title_link"><?php the_title(); ?></a>
            </h2>

            <?php if($setting_layout_date === "down-title") : ?>
              <?php echo $date_post; ?>
            <?php endif; ?>
          
            <div class="page_style"><?php the_content(''); ?></div>
          
            <?php if($setting_layout_date === "down-article") : ?>
              <?php echo $date_post; ?>
            <?php endif; ?>
          </div>
          
          <div class="products__box__description__more products__box__description__more--<?php echo $setting_layout_position_image ?>">
            <a href="<?php the_permalink(); ?>">
              <span class="material-symbols-outlined">expand_circle_right</span>
            </a>
          </div>
        </div>
      </div>
    <?php 

  endwhile;
  wp_reset_postdata();

  ?>
    <?php if ( is_front_page() ) : ?>
      <a href="<?php echo esc_url(get_category_link($cat_id)); ?>" class="button_link"><?php echo esc_html( $products_see_all ); ?></a>
    <?php endif; ?>
  <?php
else:
  ?>
    <div class="page_style" style="flex: 1"><h4 style="text-align: center;"><?php echo esc_html( $products_empty_category ); ?></h4></div>
  <?php
endif;
?>