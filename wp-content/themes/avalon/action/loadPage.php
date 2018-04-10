<?php
if ($_GET['slug'])
    $slug = $_GET['slug'];

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    define('WP_USE_THEMES', false);
    require('../../../../wp-blog-header.php');
    header("HTTP/1.1 200 OK");
    header("Status: 200 All rosy");
    include_once(ABSPATH . WPINC . '/post.php');
    include_once(ABSPATH . WPINC . '/functions.php');
}

$items = wp_get_nav_menu_items('Menu');

foreach ($items as $item) {
    if ($item->attr_title == $slug) {
        getTemplatePart('', 'tpl_' . $item->attr_title);
        break;
    }
}