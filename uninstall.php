<?php

echo "Checking if uninstall is called from WordPress - uninstall.php - line " . __LINE__ . "\n";
// If uninstall is not called from WordPress, exit
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit();
}

echo "Checking user capabilities before performing uninstall actions - uninstall.php - line " . __LINE__ . "\n";
// Check user capabilities before performing uninstall actions
if (!current_user_can('activate_plugins')) {
    exit();
}

echo "Deleting plugin options - uninstall.php - line " . __LINE__ . "\n";
// Delete plugin options
delete_option('playlist_plugin_option_name');

global $wpdb;

echo "Checking if the table exists before attempting to drop it - uninstall.php - line " . __LINE__ . "\n";
// Check if the table exists before attempting to drop it
$table_name = $wpdb->prefix . 'playlist_table_name'; // Replace 'playlist_table_name' with your table name
if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
    $wpdb->query("DROP TABLE IF EXISTS $table_name");
}

echo "Checking if another table exists before attempting to drop it - uninstall.php - line " . __LINE__ . "\n";
$another_table_name = $wpdb->prefix . 'another_playlist_table_name'; // Replace 'another_playlist_table_name' with your second table name
if($wpdb->get_var("SHOW TABLES LIKE '$another_table_name'") == $another_table_name) {
    $wpdb->query("DROP TABLE IF EXISTS $another_table_name");
}

// Other uninstallation tasks can go here...

?>
