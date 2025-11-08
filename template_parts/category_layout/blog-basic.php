<?php
$defaults = require get_template_directory() . '/inc/theme-defaults.php';

$query = get_query_var('query');
$cat_id = get_query_var('category_id');
$blog_date_display = get_theme_mod('dominium_category_' . $cat_id . '_date_display', 'created');
$blog_red_more = get_theme_mod('dominium_category_' . $cat_id . '_readmore_text', $defaults['category_texts']['read_more']);
$blog_see_all = get_theme_mod('dominium_category_' . $cat_id . '_seeall_text', $defaults['category_texts']['see_all']);
$blog_empty_category = get_theme_mod('dominium_category_' . $cat_id . '_empty_text', $defaults['category_texts']['empty_category']);

if (empty($query)) {
  global $wp_query;
  $query = $wp_query;
}

if ($query->have_posts()) :
  ?>
    <div class="blog_container">
  <?php
  
  while ($query->have_posts()) : $query->the_post(); 

    ?>
      <div class="blog_container__box">
        <div
          class="blog_container__box__image js-image-background"
          data-image="<?php the_post_thumbnail_url('medium'); ?>"
        ></div>

        <div class="blog_container__box_content">
          <div>
            <h2 class="blog_container__box__title">
              <a href="<?php the_permalink(); ?>"class="blog_container__box__title__link">
                <?php the_title(); ?>
              </a>
            </h2>
            <div class="page_style"><?php the_content(''); ?></div>
          </div>
          
          <div class="blog_container__box__footer">
            <?php
              if ($blog_date_display !== 'none') {
            ?>
              <div class="page_date">
                <span class="material-symbols-outlined">calendar_month</span>
                <?php 
                  if ($blog_date_display === 'created') {
                      echo get_the_date('d.m.Y');
                  } elseif ($blog_date_display === 'modified') {
                      echo get_the_modified_date('d.m.Y');
                  } 
                ?>
              </div>
            <?php
              }
            ?>
            <p>
              <a href="<?php the_permalink(); ?>" class="blog_container__box__footer__red_more"><?php echo esc_html( $blog_red_more ); ?></a>
            </p>
          </div>

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