<?php get_header(); ?>

  <main class="page_main">
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
  </main>

<?php get_footer(); ?>
