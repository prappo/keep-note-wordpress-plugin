<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @wordpress-plugin
 * Plugin Name:       Keep Note
 * Plugin URI:        https://prappo.dev
 * Description:       Simple and light keep note plugin that will help you to save note.
 * Version:           1.0.0
 * Author:            Prappo Prince
 * Author URI:        http://prappo.dev
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpsega
 * Domain Path:       /languages
 */


defined('ABSPATH') || exit;

define('KEEP_NOTE_VERSION', '1.0.0');

require 'settings.php';


/**
 * Essentials scripts to load keep note in the
 * Wordpress admin panel
 *
 * @return  void
 * @since   1.0.0
 */
function kn_admin_scripts()
{

    wp_enqueue_script("jquery-ui-draggable");
    wp_enqueue_script('kn_script', plugin_dir_url(__FILE__) . 'assets/js/script.js', array('jquery'), KEEP_NOTE_VERSION, true);

    wp_enqueue_style('kn_style', plugin_dir_url(__FILE__) . 'assets/css/style.css', false);


}


/**
 * Template file where the markup written
 *
 * @since   1.0.0
 */
function kn_html_template()
{
    include 'template.php';
}

/**
 * Save note to database
 *
 * @since  1.0.0
 */

function kn_save_txt(){
    $kn_txt = esc_html__( $_POST['kn_text'] );
    update_option('kn_txt',$kn_txt);
    wp_die();
}

/**
 * Send saved note to admin
 *
 * @since   1.0.0
 */

function kn_get_txt(){
    $text = get_option('kn_txt');
    echo $text;
    wp_die();
}

add_action('admin_enqueue_scripts', 'kn_admin_scripts');
add_action('admin_footer', 'kn_html_template');
add_action('wp_ajax_kn_save_txt','kn_save_txt');
add_action('wp_ajax_kn_get_txt','kn_get_txt');
