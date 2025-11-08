<?php
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';

  $title_empyt = get_theme_mod("up_menu_email", $defaults["aside"]["title_empyt"]);
  $description_empty = get_theme_mod("up_menu_phone", $defaults["aside"]["description_empty"]);
?>

<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
  <?php dynamic_sidebar( 'main-sidebar' ); ?>
<?php else : ?>
  <div class="aside_box">
    <h3><?php echo esc_html( $title_empyt ); ?></h3>
    <p><?php echo esc_html( $description_empty ); ?></p>
  </div>
<?php endif; ?>
