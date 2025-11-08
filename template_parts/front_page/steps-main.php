<section class="steps scroll_margin">
  <div class="container">
    <?php

      $defaults = require get_template_directory() . '/inc/theme-defaults.php';
      $steps = $defaults['steps'];

      for ( $i = 1; $i <= 3; $i++ ) :
        $title = get_theme_mod( "step_title_$i", $steps[$i]['title'] );
        $description = get_theme_mod( "step_description_$i", $steps[$i]['description']);

        if ( $title && $description ) : 
          ?>
            <div class="steps__box">
              <h2 class="steps__box__title"><?php echo esc_html( $title ); ?></h2>
              <p class="steps__box__description"><?php echo esc_html( $description ); ?></p>
            </div> 
          <?php
        endif;
      endfor;

    ?>
  </div>
</section>