<?php
function dominium_enqueue_debug_console() {
    if ( ! defined('WP_DEBUG') || ! WP_DEBUG ) {
        return;
    }

    global $wp_styles, $wp_scripts;

    // Funkcja pomocnicza: zwróć skróconą ścieżkę od 'themes/'
    $shorten_path = function($src) {
        if (strpos($src, '/themes/') !== false) {
            return substr($src, strpos($src, '/themes/')); // od 'themes/' włącznie
        }
        return null; // pomijamy wszystko, co nie jest plikiem motywu
    };

    $styles  = array_filter(array_map(
        fn($h) => $shorten_path($wp_styles->registered[$h]->src ?? ''),
        $wp_styles->done ?? []
    ));

    $scripts = array_filter(array_map(
        fn($h) => $shorten_path($wp_scripts->registered[$h]->src ?? ''),
        $wp_scripts->done ?? []
    ));

    echo '<script>';
    echo 'console.group("%cDominium Theme Enqueue Debug","color:#4CAF50;font-weight:bold;");';
    echo 'console.log("🧩 Theme styles loaded:");';
    echo 'console.table(' . json_encode(array_values($styles)) . ');';
    echo 'console.log("⚙️ Theme scripts loaded:");';
    echo 'console.table(' . json_encode(array_values($scripts)) . ');';
    echo 'console.groupEnd();';
    echo '</script>';
}
add_action('wp_print_footer_scripts', 'dominium_enqueue_debug_console', 9999);
