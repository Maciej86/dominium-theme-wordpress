<?php
function dominium_get_post_date_for_custom_category() {
    if (get_post_type() !== 'post') {
        return '';
    }

    $blog_cat    = get_theme_mod('post_blog_category');
    $product_cat = get_theme_mod('post_products_category');

    $post_categories = get_the_category();
    if (empty($post_categories)) {
        return '';
    }

    foreach ($post_categories as $cat) {
        $cat_id = $cat->term_id;

        if ($cat->parent) {
            $cat_id = $cat->parent;
        }

        if ($blog_cat && $cat_id == $blog_cat) {
            $date_display = get_theme_mod('blog_date_display', 'created');
        }

        elseif ($product_cat && $cat_id == $product_cat) {
            $date_display = get_theme_mod('products_date_display', 'none');
        }
        else {
            $date_display = 'none';
        }

        if ($date_display === 'created') {
            return get_the_date('d.m.Y');
        } elseif ($date_display === 'modified') {
            return get_the_modified_date('d.m.Y');
        }
    }

    return '';
}
