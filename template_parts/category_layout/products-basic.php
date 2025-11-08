<?php
$query = get_query_var('query');
$cat_id = get_query_var('category_id');
$products_date_display = get_theme_mod('dominium_category_' . $cat_id . '_date_display', 'created');

if (empty($query)) {
  global $wp_query;
  $query = $wp_query;
}

if ($query->have_posts()) :

  while ($query->have_posts()) : $query->the_post(); 

    ?>
      <div class="products__box">
        <div
          class="products__box_image js-image-background"
          data-image="<?php the_post_thumbnail_url('medium'); ?>"
        ></div>
        <div class="products__box__description">
          <div>
            <h2 class="products__box__description__title"><?php the_title(); ?></h2>

            <div class="page_style"><?php the_content(''); ?></div>

            <?php
              if ($products_date_display !== 'none') {
            ?>
              <p class="page_date">
                <span class="material-symbols-outlined">calendar_month</span>
                <?php 
                  if ($products_date_display === 'created') {
                      echo get_the_date('d.m.Y');
                  } elseif ($products_date_display === 'modified') {
                      echo get_the_modified_date('d.m.Y');
                  } 
                ?>
              </p>
            <?php
              }
            ?>
          </div>
          <div class="products__box__description__more">
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
      <a href="<?php echo esc_url(get_category_link($cat_id)); ?>" class="button_link">zobacz wszystkie</a>
    <?php endif; ?>
  <?php
else:
  ?>
    <div class="page_style" style="flex: 1"><h4 style="text-align: center;">Brak wpisów</h4></div>
  <?php
endif;
?>