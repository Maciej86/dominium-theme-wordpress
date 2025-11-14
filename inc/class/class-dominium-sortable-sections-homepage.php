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
			// Domyślne sekcje
			$defaults = $this->defaults['sections_front_page'];

			// Get save value
			$saved_value = $this->value();
			$saved_order = [];
			if (!empty($saved_value)) {
				$decoded = json_decode($saved_value, true);
				if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
					$saved_order = $decoded;
				}
			}

		// Scalanie domyślnych sekcji z zapisanymi danymi
		$items = array_map(function($item) use ($saved_order) {
			foreach ($saved_order as $saved_item) {
				if ($saved_item['section'] === $item['section']) {
					$item['visible'] = isset($saved_item['visible']) ? (bool)$saved_item['visible'] : true;
				}
			}
			return $item;
		}, $defaults);

		// Sort
		if (!empty($saved_order)) {
			usort($items, function($a, $b) use ($saved_order) {
				$posA = array_search($a['section'], array_column($saved_order, 'section'));
				$posB = array_search($b['section'], array_column($saved_order, 'section'));
				return $posA - $posB;
			});
		}

		// Show in Customizer
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

		// Hidden input
		<input type="hidden" <?php $this->link(); ?> 
						value="<?php echo esc_attr($saved_value ?: json_encode($items)); ?>">
		<?php
	}
}
?>
