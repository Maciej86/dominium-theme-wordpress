// DO PRZEROBIENIA

<?php get_header(); ?>

<main class="site-main">
  <?php if ( have_posts() ) : ?>
    
    <div class="container">
      <div class="page_style">
        
        <?php
          if (have_posts()) :
            while (have_posts()) : the_post();
              get_template_part('template_parts/content-post','main');
            endwhile;
          endif;
        ?>

      </div>
    </div>

    <?php the_posts_pagination(); ?>

  <?php else : ?>
    <p><?php esc_html_e( 'Nie znaleziono żadnych wpisów.', 'dominium' ); ?></p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
