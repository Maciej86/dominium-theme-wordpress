<section class="count js-count">
    <div class="container">
      <?php
        $defaults = require get_template_directory() . '/inc/theme-defaults.php';
        $counts = $defaults['counts'];

        for ( $i = 1; $i <= 4; $i++ ) :
          $title = get_theme_mod( "count_title_$i", $counts[$i]['title'] );
          $number = get_theme_mod( "count_number_$i", $counts[$i]['number']);
  
          if ( $title && $number ) : 
            ?>
              <div class="count__box">
                <h3 class="count__box__title js-counter" data-count="<?php echo esc_html( $number ); ?>">0</h3>
                <p class="count__box__description"><?php echo wp_kses( $title, array( 'sup' => array() ) ); ?></p>
              </div>
            <?php
          endif;
        endfor;
      ?>
    </div>
  </section>