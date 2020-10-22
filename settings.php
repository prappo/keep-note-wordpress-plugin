<?php

defined('ABSPATH') || exit;

add_action('admin_menu','kn_settings_menu');

function kn_settings_menu(){
    add_menu_page(
        'Keep Note',
        'Keep Note',
        'manage_options',
        'keep_note_page',
        'kn_settings_page',
        'dashicons-welcome-write-blog'
    );

    add_action( 'admin_init', 'keepnote_plugin_settings' );


}

function keepnote_plugin_settings() {
	//register our settings
	register_setting( 'keep-note-plugin-settings-group', 'show_note_window' );

}

function kn_settings_page(){
    require_once 'settings-page.php';
}