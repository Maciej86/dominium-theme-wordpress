<?php
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';
  $logo_svg = require get_template_directory() . '/template_parts/logo-svg.php';

  $up_menu_email = get_theme_mod("up_menu_email", $defaults["up_menu"]["email"]);
  $up_menu_phone = get_theme_mod("up_menu_phone", $defaults["up_menu"]["phone"]);
  $up_menu_facebook = get_theme_mod("up_menu_facebook", $defaults["up_menu"]["facebook"]);
  $up_menu_instagram = get_theme_mod("up_menu_instagram", $defaults["up_menu"]["instagram"]);
  $up_menu_tiktok = get_theme_mod("up_menu_tiktok", $defaults["up_menu"]["tiktok"]);
  $up_menu_x = get_theme_mod("up_menu_x", $defaults["up_menu"]["x"]);
?>

<div class="header_contact">
  <div class="container">
    <div class="header_contact__contact">
      <ul class="header_contact__contact__list">
        <li class="header_contact__contact__list__item">
          <a href="mailto:<?php echo esc_html( $up_menu_email ); ?>">
            <span class="material-symbols-outlined">alternate_email</span>
            <?php echo esc_html( $up_menu_email ); ?>
          </a>
        </li>
        <li class="header_contact__contact__list__item">
          <a href="tel:<?php echo esc_attr(preg_replace('/\s+|-/', '', $up_menu_phone)); ?>">
            <span class="material-symbols-outlined">mobile_2</span>
            <?php echo esc_html( $up_menu_phone ); ?>
          </a>
        </li>
      </ul>
      <div class="header_contact__contact__social">

        <?php if ( !empty( $up_menu_facebook ) ) : ?>
          <a href="<?php echo esc_url( $up_menu_facebook ); ?>">
            <?php echo $logo_svg['facebook']; ?>
          </a>
        <?php endif; ?>

        <?php if ( !empty( $up_menu_instagram ) ) : ?>
          <a href="<?php echo esc_url( $up_menu_instagram ); ?>">
            <?php echo $logo_svg['instagram']; ?>
          </a>
        <?php endif; ?>

        <?php if ( !empty( $up_menu_tiktok ) ) : ?>
          <a href="<?php echo esc_url( $up_menu_tiktok ); ?>">
            <?php echo $logo_svg['tiktok']; ?>
          </a>
        <?php endif; ?>

        <?php if ( !empty( $up_menu_x ) ) : ?>
              <a href="<?php echo esc_url( $up_menu_x ); ?>">
                <?php echo $logo_svg['x']; ?>
              </a>
            <?php endif; ?>

      </div>
    </div>
  </div>
</div>