<?php
class Dominium_Simple_Category_Posts_Widget extends WP_Widget {

  public function __construct() {
    parent::__construct(
      'dominium_simple_category_posts',
      __('Ostatnie wpisy z bieżącej kategorii', 'dominium'),
      ['description' => __('Wyświetla listę tytułów wpisów z aktualnej kategorii lub kategorii bieżącego wpisu', 'dominium')]
    );
  }

  public function widget($args, $instance) {
    echo $args['before_widget'];

    $title = !empty($instance['title']) ? $instance['title'] : __('Ostatnie wpisy', 'dominium');
    $count = !empty($instance['count']) ? intval($instance['count']) : 5;

    $category_id = 0;

    if (is_single()) {
      $categories = get_the_category();
      if (!empty($categories)) {
        $category_id = $categories[0]->term_id;
      }
    } elseif (is_category()) {
      $category_id = get_queried_object_id();
    }

    if ($category_id) {
      echo $args['before_title'] . esc_html($title) . $args['after_title'];

      $query = new WP_Query([
        'cat' => $category_id,
        'posts_per_page' => $count,
        'post__not_in' => [get_the_ID()],
      ]);

      if ($query->have_posts()) {
        echo '<ul class="widget_category_posts">';
        while ($query->have_posts()) {
          $query->the_post();
          echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
        }
        echo '</ul>';
        wp_reset_postdata();
      } else {
        echo '<p>Brak wpisów w tej kategorii.</p>';
      }
    }

    echo $args['after_widget'];
  }

  public function form($instance) {
    $title = !empty($instance['title']) ? $instance['title'] : __('Ostatnie wpisy', 'dominium');
    $count = !empty($instance['count']) ? intval($instance['count']) : 5;
    ?>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Tytuł:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
             name="<?php echo $this->get_field_name('title'); ?>" type="text"
             value="<?php echo esc_attr($title); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Ilość wpisów:'); ?></label>
      <input class="tiny-text" id="<?php echo $this->get_field_id('count'); ?>"
             name="<?php echo $this->get_field_name('count'); ?>" type="number" step="1" min="1"
             value="<?php echo esc_attr($count); ?>" size="3">
    </p>
    <?php
  }

  public function update($new_instance, $old_instance) {
    $instance = [];
    $instance['title'] = sanitize_text_field($new_instance['title']);
    $instance['count'] = intval($new_instance['count']);
    return $instance;
  }
}

function dominium_register_simple_category_widget() {
  register_widget('Dominium_Simple_Category_Posts_Widget');
}
add_action('widgets_init', 'dominium_register_simple_category_widget');
