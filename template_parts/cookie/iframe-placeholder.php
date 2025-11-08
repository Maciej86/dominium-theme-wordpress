<div class="cookie_iframe_placeholder" data-iframe-src="<?php echo esc_attr( $args['iframe_src'] ?? '' ); ?>">
  <p class="cookie_iframe_placeholder__content">
    <?php
      $domain = $args['domain'] ?? '{{DOMAIN}}';
      echo wp_kses(
        str_replace('{{DOMAIN}}', $domain, get_theme_mod('cookie_iframe_text', 'Aby wyświetlić zawartość z <strong>{{DOMAIN}}</strong>, zaakceptuj wszystkie pliki cookie.')),
        [ 'strong' => [] ]
      );
    ?>
  </p>
  <button class="button_link js-show-cookie-modal">
    <?php echo esc_html( get_theme_mod('cookie_iframe_button', 'Ustaw cookies') ); ?>
  </button>
</div>