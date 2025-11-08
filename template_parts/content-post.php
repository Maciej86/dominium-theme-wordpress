<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="header_article">
    <h1 class="title_page"><?php the_title(); ?></h1>

    <?php if (get_post_type() === 'post') : ?>
      <?php $post_date = dominium_get_post_date_for_custom_category(); ?>
        <?php if ($post_date) : ?>
            <div class="page_date">
                <span class="material-symbols-outlined">calendar_month</span>
                <?php echo $post_date; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
  </div>

  <?php 
  if (has_post_thumbnail()) : ?>
    <div class="top_image_page js-image-background" data-image="<?php the_post_thumbnail_url('large'); ?>"></div>
  <?php endif; ?>

  <?php the_content(); ?>
  
</article>