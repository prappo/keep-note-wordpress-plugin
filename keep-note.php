<?php

/**
 * Plugin Name: Keep Note
 */

function kn_admin_scripts()
{

    wp_enqueue_script("jquery-ui-draggable");

    wp_enqueue_script('kn_script', plugin_dir_url(__FILE__) . '/assets/js/script.js', array('jquery'), 1.1, true);
    wp_enqueue_style('kn_style', plugin_dir_url(__FILE__) . '/assets/css/style.css', false);

}
add_action('admin_enqueue_scripts', 'kn_admin_scripts');
add_action('admin_footer', 'kn_html_template');

function kn_html_template()
{
    include 'template.php';
}
