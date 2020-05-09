<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Keep_Note
 *
 * @wordpress-plugin
 * Plugin Name:       Keep Note
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       Simple and light keep note plugin that will help you to save note.
 * Version:           1.0.0
 * Author:            Prappo Prince
 * Author URI:        http://wpsega.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpsega
 * Domain Path:       /languages
 */


defined('ABSPATH') || exit;

define('KEEP_NOTE_VERSION', 1.00);



function kn_admin_scripts()
{

    wp_enqueue_script("jquery-ui-draggable");

    wp_enqueue_script('kn_script', plugin_dir_url(__FILE__) . '/assets/js/script.js', array('jquery'), 1.1, true);
    wp_enqueue_style('kn_style', plugin_dir_url(__FILE__) . '/assets/css/style.css', false);


}


function kn_html_template()
{
    include 'template.php';
}

add_action('admin_enqueue_scripts', 'kn_admin_scripts');
add_action('admin_footer', 'kn_html_template');
