<?php
class Dominium_sortable_sections_homepage extends WP_Customize_Control {
  public $type = 'custom_list';
  private $defaults;

  public function __construct($manager, $id, $args = []) {
    $this->defaults = require get_template_directory() . '/inc/theme-defaults.php';
    parent::__construct($manager, $id, $args);
  }

  public function enqueue() {
    wp_enqueue_style(
      'dominium-style-sortable-list-control',
      get_template_directory_uri() . '/assets/css/customizer/sortable.css'
    );
    wp_enqueue_script(
      'dominium-sortable-list-control',
      get_template_directory_uri() . '/assets/js/customizer/dominium-sortable.js',
      ['customize-controls'],
      null,
      true
    );
  }

  public function render_content() {
    $items = $this->defaults['sections_front_page'];

    $saved_value = $this->value();
    $saved_order = [];
    if (!empty($saved_value)) {
      $saved_order = json_decode($saved_value, true);
    }

    if (!empty($saved_order)) {
      usort($items, function($a, $b) use ($saved_order) {
        $posA = array_search($a['section'], array_column($saved_order, 'section'));
        $posB = array_search($b['section'], array_column($saved_order, 'section'));
        return $posA - $posB;
      });

      foreach ($items as &$item) {
        foreach ($saved_order as $saved_item) {
          if ($saved_item['section'] === $item['section']) {
            $item['visible'] = $saved_item['visible'];
          }
        }
      }
    }
    ?>

    <h3 class="sortable_title">Przeciągnij lub wyłącz sekcje</h3>
    <ul class="sortable_list js-sortable-list">
      <?php foreach ($items as $item): ?>
        <li
          draggable="true"
          data-value="<?php echo esc_attr($item['section']); ?>"
          data-visible="<?php echo $item['visible'] ? 'true' : 'false'; ?>"
          class="sortable_list__item js-sortable-item <?php echo !$item['visible'] ? 'is-hidden' : ''; ?>"
        >
          <label class="sortable_list__label">
            <span class="sortable_list__item_handle">⋮⋮</span>
            <input type="checkbox" class="js-toggle-visibility" <?php checked($item['visible']); ?>>
            <span><?php echo esc_html($item['name']); ?></span>
          </label>
        </li>
      <?php endforeach; ?>
    </ul>
    <input type="hidden" <?php $this->link(); ?> value='<?php echo esc_attr(json_encode($items)); ?>'>
    <?php
  }
}
?>
