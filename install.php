<?php

// Runs when the plugin is activated
function playlist_plugin_install() {

    // Check for minimum WordPress version
    global $wp_version;
    $minimum_wp_version = '5.0';
    if (version_compare($wp_version, $minimum_wp_version, '<')) {
        deactivate_plugins(basename(__FILE__)); // Deactivate the plugin
        wp_die("This plugin requires WordPress version $minimum_wp_version or higher.");
    }

    // Check for potential conflicts with other plugins
    // Placeholder for conflict check with other plugins

    // Set default options
    add_option('playlist_plugin_option_name', 'default_value');

    // Initialize database tables or other settings
    // Placeholder for database initialization

    // Other installation tasks can go here...
}

register_activation_hook(__FILE__, 'playlist_plugin_install');

// Runs when the plugin is deactivated
function playlist_plugin_deactivate() {
    // Cleanup temporary data or settings
    // Placeholder for deactivation cleanup
}

register_deactivation_hook(__FILE__, 'playlist_plugin_deactivate');

// Runs when the plugin is uninstalled
function playlist_plugin_uninstall() {
    // Remove all data and settings related to the plugin
    delete_option('playlist_plugin_option_name');
    // Placeholder for uninstallation cleanup
}

register_uninstall_hook(__FILE__, 'playlist_plugin_uninstall');

?>