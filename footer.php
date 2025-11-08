<?php
  $defaults = require get_template_directory() . '/inc/theme-defaults.php';
  $logo_svg = require get_template_directory() . '/template_parts/logo-svg.php';

  $up_menu_email = get_theme_mod("up_menu_email", $defaults["up_menu"]["email"]);
  $up_menu_phone = get_theme_mod("up_menu_phone", $defaults["up_menu"]["phone"]);
  $up_menu_facebook = get_theme_mod("up_menu_facebook", $defaults["up_menu"]["facebook"]);
  $up_menu_instagram = get_theme_mod("up_menu_instagram", $defaults["up_menu"]["instagram"]);
  $up_menu_tiktok = get_theme_mod("up_menu_tiktok", $defaults["up_menu"]["tiktok"]);
  $up_menu_x = get_theme_mod("up_menu_x", $defaults["up_menu"]["x"]);

  $company_shortname = get_theme_mod("company_shortname", $defaults["footer"]["company_shortname"]);
  $company_fullname = get_theme_mod("company_fullname", $defaults["footer"]["company_fullname"]);
  $company_address_1 = get_theme_mod("company_address_1", $defaults["footer"]["company_address_1"]);
  $company_address_2 = get_theme_mod("company_address_2", $defaults["footer"]["company_address_2"]);
  $company_nip = get_theme_mod("company_nip", $defaults["footer"]["company_nip"]);
  $company_regon = get_theme_mod("company_regon", $defaults["footer"]["company_regon"]);
  $other_1 = get_theme_mod("other_1", $defaults["footer"]["other_1"]);
  $other_2 = get_theme_mod("other_2", $defaults["footer"]["other_2"]);
  $title_copyright = get_theme_mod("title_copyright", $defaults["footer"]["title_copyright"]);
  $description_copyright = get_theme_mod("description_copyright", $defaults["footer"]["description_copyright"]);
?>

    <footer class="footer">
      <div class="container">
        <div class="footer__box">
          <h3 class="footer__box__title"><?php echo esc_html( $company_shortname ); ?></h3>
          <ul>
            <li><?php echo esc_html( $company_fullname ); ?></li>
            <li><?php echo esc_html( $company_address_1 ); ?></li>
            <li><?php echo esc_html( $company_address_2 ); ?></li>
            <li>NIP: <?php echo esc_html( $company_nip ); ?></li>
            <li>Regon: <?php echo esc_html( $company_regon ); ?></li>
            <?php if ( !empty( $other_1 ) ) : ?>
              <li><?php echo esc_html( $other_1 ); ?></li>
            <?php endif; ?>
            <?php if ( !empty( $other_2 ) ) : ?>
              <li><?php echo esc_html( $other_2 ); ?></li>
            <?php endif; ?>
          </ul>

          <div class="footer__box__social_media">

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
        <div class="footer__box">
          <h3 class="footer__box__title-small">kontakt</h3>
          <ul class="footer__box__list-contact">
            <li>
              <span class="material-symbols-outlined">mobile_2</span>
              <a href="tel:<?php echo esc_attr(preg_replace('/\s+|-/', '', $up_menu_phone)); ?>"><?php echo esc_html( $up_menu_phone ); ?></a>
            </li>
            <li>
              <span class="material-symbols-outlined"> alternate_email </span>
              <a href="mailto:<?php echo esc_html( $up_menu_email ); ?>"><?php echo esc_html( $up_menu_email ); ?></a>
            </li>
          </ul>
        </div>
        <div class="footer__box">
          <h3 class="footer__box__title-small">menu</h3>
          <?php
              wp_nav_menu([
                  'theme_location' => 'footer',
                  'container' => 'div',
                  'container_class' => 'footer_navigation',
              ]);
            ?>
        </div>
        <div class="footer__box">
          <h3 class="footer__box__title-small"><?php echo esc_html( $title_copyright ); ?></h3>
          <p>
            <?php echo esc_html( $description_copyright ); ?>
          </p>
        </div>
      </div>
    </footer>
    <?php 
      get_template_part('template_parts/cookie/cookie','content');
      wp_footer();
    ?>
  </body>
</html>