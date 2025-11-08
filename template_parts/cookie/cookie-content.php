<?php
$defaults = require get_template_directory() . '/inc/theme-defaults.php';

$cookie_text = get_theme_mod( 'cookie_message_text', $defaults['cookie']['description'] );
$cookie_page_id = get_theme_mod( 'cookie_page_link' );
$button_accept_all = get_theme_mod( 'cookie_accept_all_text', $defaults['cookie']['button_all'] );
$cookie_accept_necessary = get_theme_mod( 'cookie_accept_necessary_text', $defaults['cookie']['button_necessary'] );
$button_more_info = get_theme_mod( 'cookie_more_info_text', 'Więcej informacji' );

$cookie_display_type = get_theme_mod( 'cookie_display_type', $defaults['cookie']['display_type'] );
$cookie_display_side = get_theme_mod( 'cookie_display_side', $defaults['cookie']['display_side'] );
$cookie_class = "";

if ($cookie_display_type === "full") {
  $cookie_class = "cookie--full";
} else {
  if($cookie_display_side === "left") {
    $cookie_class = "cookie--modal cookie--left";
  } else {
    $cookie_class = "cookie--modal cookie--right";
  }
  
}
?>

<div class="cookie <?php echo esc_attr( $cookie_class ); ?>">
  <div class="container">
    <div class="cookie__content">
      <div class="cookie__content__text page_style">
        <p><?php echo esc_html( $cookie_text ); ?></p>
      </div>
      <div class="cookie__content__buttons">
        <button class="button_link button_link_more_cookie"><?php echo esc_html( $button_accept_all ); ?></button>
        <button class="button_link button_link_more_cookie"><?php echo esc_html( $cookie_accept_necessary ); ?></button>
        <?php if ( $cookie_page_id ) : ?>
          <a 
            class="button_link button_link_more_cookie" 
            href="<?php echo esc_url( get_permalink( $cookie_page_id ) ); ?>"
          >
            <?php echo esc_html( $button_more_info ); ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>