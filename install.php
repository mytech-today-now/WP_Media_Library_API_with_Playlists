<?php

// Runs when the plugin is activated
function playlist_plugin_install() {

    // Check for potential conflicts with other plugins
    // Placeholder for conflict check with other plugins

    // Set default options
    add_option('playlist_plugin_option_name', 'default_value');
    echo "| playlist_plugin_opition_install - install.php - line " . __LINE__ . "\n";

    // Initialize database tables or other settings
    global $wpdb;

    // Check if the table already exists before attempting to create it
    $table_name = $wpdb->prefix . 'playlist_table_name'; // Replace 'playlist_table_name' with your table name
    echo "| Check if the table already exists before attempting to create it - install.php - line " . __LINE__ . "\n";
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        // Placeholder for database initialization for the first table
        echo "| table name not found - install.php - line " . __LINE__ . "\n";
    }

    $another_table_name = $wpdb->prefix . 'another_playlist_table_name'; // Replace 'another_playlist_table_name' with your second table name
    echo "| Check if the table already exists before attempting to create it - install.php - line " . __LINE__ . "\n";
    if($wpdb->get_var("SHOW TABLES LIKE '$another_table_name'") != $another_table_name) {
        // Placeholder for database initialization for the second table
        echo "| Placeholder for database initialization for the second table - install.php - line " . __LINE__ . "\n";
    }

    // Other installation tasks can go here...
}

echo "| register_activation_hook about to start - install.php - line " . __LINE__ . "\n";
//$bufferedLogger->log_me("register_activation_hook about to start");
register_activation_hook(__FILE__, 'playlist_plugin_install');
echo "| activation hook registered - install.php - line " . __LINE__ . "\n";
//$bufferedLogger->log_me("activation hook registered");

// Runs when the plugin is deactivated
function playlist_plugin_deactivate() {
    // Cleanup temporary data or settings
    // Placeholder for deactivation cleanup
}

echo "| register_deactivation_hook about to start - install.php - line " . __LINE__ . "\n";
//$bufferedLogger->log_me("register_deactivation_hook about to start");
register_deactivation_hook(__FILE__, 'playlist_plugin_deactivate');
echo "| register_deactivation_hook playlist_plugin_deactivate deactivated - install.php - line " . __LINE__ . "\n";
// Runs when the plugin is uninstalled
function playlist_plugin_uninstall() {
    // Remove all data and settings related to the plugin
    delete_option('| playlist_plugin_uninstall playlist_plugin_option_name');
    // Placeholder for uninstallation cleanup
}
echo "| register_uninstall_hook playlist_plugin_uninstall about to start - install.php - line " . __LINE__ . "\n";
register_uninstall_hook(__FILE__, 'playlist_plugin_uninstall');
echo "| register_uninstall_hook playlist_plugin_uninstall has completed - install.php - line " . __LINE__ . "\n";
?>
