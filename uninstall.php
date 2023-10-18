<?php

// If uninstall is not called from WordPress, exit
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit();
}

// Check user capabilities before performing uninstall actions
if (!current_user_can('activate_plugins')) {
    exit();
}

// Delete plugin options
delete_option('playlist_plugin_option_name');

global $wpdb;

// Check if the table exists before attempting to drop it
$table_name = $wpdb->prefix . 'playlist_table_name'; // Replace 'playlist_table_name' with your table name
if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
    $wpdb->query("DROP TABLE IF EXISTS $table_name");
}

$another_table_name = $wpdb->prefix . 'another_playlist_table_name'; // Replace 'another_playlist_table_name' with your second table name
if($wpdb->get_var("SHOW TABLES LIKE '$another_table_name'") == $another_table_name) {
    $wpdb->query("DROP TABLE IF EXISTS $another_table_name");
}

// Other uninstallation tasks can go here...

?>
