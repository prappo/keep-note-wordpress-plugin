<?php

defined('ABSPATH') || exit;

add_action('admin_menu','keep_note_settings_menu');


function keep_note_settings_menu(){
    add_menu_page(
        'Keep Note',
        'Keep Note',
        'manage_options',
        'keep_note_page',
        'keep_note_settings_page',
        'dashicons-welcome-write-blog'
    );

    add_action( 'admin_init', 'keepnote_plugin_settings' );


}

function keepnote_plugin_settings() {
	//register our settings
	register_setting( 'keep-note-plugin-settings-group', 'show_note_window' );

}

function keep_note_settings_page(){
    require_once 'settings-page.php';
}

add_action( 'admin_bar_menu', 'keep_note_admin_bar_item', 500 );

function keep_note_admin_bar_item ( WP_Admin_Bar $admin_bar ) {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    $admin_bar->add_menu( array(
        'id'    => 'keep-note',
        'parent' => null,
        'group'  => null,
        'title' => 'Keep Note', //you can use img tag with image link. it will show the image icon Instead of the title.
        'href'  => '#' ,
        'meta' => [
            'title' => __( 'Keep Note', 'keepnote' ), //This title will show on hover
        ]
    ) );

    $admin_bar->add_menu( array(
        'id'    => 'keep-note-settings_page',
        'parent' => 'keep-note',
        'group'  => null,
        'title' => 'Settings', //you can use img tag with image link. it will show the image icon Instead of the title.
        'href'  => admin_url('admin.php?page=keep_note_page') ,
        'meta' => [
            'title' => __( 'Settings', 'keepnote' ), //This title will show on hover
        ]
    ) );

    $admin_bar->add_menu( array(
        'id'    => 'keep-note-reset-window',
        'parent' => 'keep-note',
        'group'  => null,
        'title' => 'Reset Position', //you can use img tag with image link. it will show the image icon Instead of the title.
        'href'  => '#' ,
        'meta' => [
            'title' => __( 'Settings', 'keepnote' ),
            'id'    => 'keep-note-reset-window',//This title will show on hover
        ]
    ) );
}