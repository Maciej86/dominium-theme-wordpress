<?php get_header(); ?>

  <main class="page_main">
    <div class="container">
      <div class="page_style__post">
        <div class="page_style">
          <div class="page_style__post__content">

            <?php
              if (have_posts()) :
                while (have_posts()) : the_post();
                  get_template_part('template_parts/content-post','main');
                endwhile;
              endif;
            ?>

          </div>
        </div>
        <aside class="aside">
          <?php
            get_template_part('template_parts/sidebar');
          ?>
        </aside>
      </div>
    </div>
  </main>

<?php get_footer(); ?>