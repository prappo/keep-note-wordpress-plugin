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
}

function kn_settings_page(){
    echo "ok";
}