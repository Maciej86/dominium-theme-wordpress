<?php
// Settings theme 
function dominium_custom_theme_support() {

  // Adding a highlight image
  add_theme_support('post-thumbnails');

  // Adding support for custom logo
  add_theme_support('custom-logo', array(
    'height'      => 50, // height of logo
    'width'       => 200, // width of logo
    'flex-height' => false, // if height is flexible
    'flex-width'  => true, // if width is flexible
  ));

  register_nav_menus([
    'primary' => __('Menu główne', 'dominium'),
    'footer'  => __('Menu w stopce', 'dominium'),
  ]);

  register_sidebar([
    'name'          => __('Sidebar główny', 'dominium'),
    'id'            => 'main-sidebar',
    'description'   => __('Pasek boczny z boku strony', 'dominium'),
    'before_widget' => '<div id="%1$s" class="aside_box %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
]);

}
add_action('after_setup_theme', 'dominium_custom_theme_support');
?>