<?php
$defaults = require get_template_directory() . '/inc/theme-defaults.php';

$query = get_query_var('query');
$cat_id = get_query_var('category_id');
$blog_date_display = get_theme_mod('dominium_category_' . $cat_id . '_date_display', 'created');
$blog_red_more = get_theme_mod('dominium_category_' . $cat_id . '_readmore_text', $defaults['category_texts']['read_more']);
$blog_see_all = get_theme_mod('dominium_category_' . $cat_id . '_seeall_text', $defaults['category_texts']['see_all']);
$blog_empty_category = get_theme_mod('dominium_category_' . $cat_id . '_empty_text', $defaults['category_texts']['empty_category']);

$setting_layout_title = get_theme_mod('layout_grid_title', $defaults['settings_layout_grid']['title']);
$setting_layout_date = get_theme_mod('layout_grid_date', $defaults['settings_layout_grid']['date']);
$setting_layout_read_more = get_theme_mod('layout_grid_read_more', $defaults['settings_layout_grid']['read_more']);
$setting_layout_background = get_theme_mod('layout_grid_background', $defaults['settings_layout_grid']['background']);

if($setting_layout_date === "down-article") {
  $setting_layout_read_more = "between";
}

if (empty($query)) {
  global $wp_query;
  $query = $wp_query;
}

if ($query->have_posts()) :
  ?>
    <div class="grid__container">
  <?php
  
  while ($query->have_posts()) : $query->the_post(); 

    $date_post = '';
    if ($blog_date_display !== 'none') {
      $date_value = ($blog_date_display === 'created') 
        ? get_the_date('d.m.Y') 
        : get_the_modified_date('d.m.Y');

      $date_post = '<div class="page_date"><span class="material-symbols-outlined">calendar_month</span>'. $date_value . '</div>';
    }
    ?>
      <div class="grid__container__box <?php echo $setting_layout_background ? "grid__container__box--background" : "" ?>">
        <div>
          <div class="grid__container__box__image_title grid__container__box__image_title--<?php echo $setting_layout_title ?>">
            <div
              class="grid__container__box__image js-image-background"
              data-image="<?php the_post_thumbnail_url('medium'); ?>"
            ></div>

            <div>
              <?php if($setting_layout_date === "up-title") : ?>
                <?php echo $date_post; ?>
              <?php endif; ?>

              <h2 class="grid__container__box__title">
                <a href="<?php the_permalink(); ?>"class="grid__container__box__title__link">
                  <?php the_title(); ?>
                </a>
              </h2>
              
              <?php if($setting_layout_date === "down-title") : ?>
                <?php echo $date_post; ?>
              <?php endif; ?>
            </div>
          </div>

          <div class="page_style"><?php the_content(''); ?></div>
        </div>
        <div class="grid__container__box__footer grid__container__box__footer--<?php echo $setting_layout_read_more ?>">
          <?php if($setting_layout_date === "down-article") : ?>
            <?php echo $date_post; ?>
          <?php endif; ?>
          <p>
            <a href="<?php the_permalink(); ?>" class="grid__container__box__footer__red_more"><?php echo esc_html( $blog_red_more ); ?></a>
          </p>
        </div>

      </div>
    <?php

  endwhile;
  wp_reset_postdata();

  ?>
    </div>
    <?php if ( is_front_page() ) : ?>
      <a href="<?php echo esc_url(get_category_link($cat_id)); ?>" class="button_link"><?php echo esc_html( $blog_see_all ); ?></a>
    <?php endif; ?>
  <?php
else:
  ?>
    <div class="page_style" style="flex: 1"><h4 style="text-align: center;"><?php echo esc_html( $blog_empty_category ); ?></h4></div>
  <?php
endif;
?>