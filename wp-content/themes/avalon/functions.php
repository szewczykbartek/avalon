<?php
if (function_exists('add_image_size'))
    add_theme_support('post-thumbnails');

apply_filters('the_content', get_the_content());

// function disableAutoSave() {
//     wp_deregister_script('autosave');
// }
// add_action('wp_print_scripts', 'disableAutoSave');

function getTemplatePart($folder = null, $name = null, array $params = array()) {
    global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite, $wpdb, $wp_version, $wp, $id, $comment, $user_ID;

    do_action("get_template_part_{$name}", $folder, $name);
    $templates = array();

    if (isset($folder))
        $templates[] = "{$folder}/{$name}.php";

    $templates[] = "{$name}.php";

    $_template_file = locate_template($templates, false, false);

    if (is_array($wp_query->query_vars)) {
        extract($wp_query->query_vars, EXTR_SKIP);
    }
    extract($params, EXTR_SKIP);

    require($_template_file);
}

function limit_words($string, $word_limit) {
    $words = explode(' ', $string);
    return implode(' ', array_slice($words, 0, $word_limit));
}



function get_the_slug($id = null) {
    if (empty($id)):
        global $post;
        if (empty($post))
            return '';
        $id = $post->ID;
    endif;

    $slug = basename(get_permalink($id));
    return $slug;
}

register_nav_menus(array('menuleft' => __('Menu'),));
