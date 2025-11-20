<?php
function dominium_get_post_date_for_custom_category() {

    if (get_post_type() !== 'post') {
        return '';
    }

    $post_categories = get_the_category();

    if (empty($post_categories)) {
        return '';
    }

    foreach ($post_categories as $cat) {

        $cat_id = $cat->parent ? $cat->parent : $cat->term_id;

        $setting_key = 'dominium_category_' . $cat_id . '_date_display';
        $date_display = get_theme_mod($setting_key, 'created');

        if ($date_display === 'none') {
            return '';
        }

        if ($date_display === 'created') {
            return get_the_date('d.m.Y');
        }

        if ($date_display === 'modified') {
            return get_the_modified_date('d.m.Y');
        }

    }

    return '';
}

