<?php
/**
 * Plugin Name: WP Media Library API with Playlists
 * Plugin URI: https://mytech.today
 * Description: A plugin to create custom JSON playlists using WordPress media library items.
 * Author: mytech.today
 * Author URI: https://mytech.today
 * Text Domain: custom-playlist-creator
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

// Include the config file
echo "Including config.php - main-plugin-file.php - line " . __LINE__ . "\n";
require_once(plugin_dir_path(__FILE__) . 'config.php');
echo "Included config.php - main-plugin-file.php - line " . __LINE__ . "\n";

// Plugin Activation
function custom_playlist_activation() {
    echo "Starting custom_playlist_activation - main-plugin-file.php - line " . __LINE__ . "\n";
    // Code to run on plugin activation
    echo "Completed custom_playlist_activation - main-plugin-file.php - line " . __LINE__ . "\n";
}

// Plugin Deactivation
function custom_playlist_deactivation() {
    echo "Starting custom_playlist_deactivation - main-plugin-file.php - line " . __LINE__ . "\n";
    // Code to run on plugin deactivation
    echo "Completed custom_playlist_deactivation - main-plugin-file.php - line " . __LINE__ . "\n";
}

echo "Registering activation and deactivation hooks - main-plugin-file.php - line " . __LINE__ . "\n";
register_activation_hook(__FILE__, 'custom_playlist_activation');
register_deactivation_hook(__FILE__, 'custom_playlist_deactivation');
echo "Registered activation and deactivation hooks - main-plugin-file.php - line " . __LINE__ . "\n";

// Check for WordPress version compatibility
echo "Checking WordPress version compatibility - main-plugin-file.php - line " . __LINE__ . "\n";
global $wp_version;
if (version_compare($wp_version, '5.0', '<')) {
    deactivate_plugins(plugin_basename(__FILE__)); // Deactivate the plugin
    echo "This plugin requires WordPress version 5.0 or higher.";
    wp_die("This plugin requires WordPress version 5.0 or higher.");
}
echo "Checked WordPress version compatibility - main-plugin-file.php - line " . __LINE__ . "\n";

// Check for required resources
echo "Checking for required resources - main-plugin-file.php - line " . __LINE__ . "\n";
$required_resources = ['js/script.js', 'css/style.css'];
foreach ($required_resources as $resource) {
    if (!file_exists(plugin_dir_path(__FILE__) . $resource)) {
        deactivate_plugins(basename(__FILE__)); // Deactivate the plugin
        echo "Missing required resource: {$resource}";
        wp_die("Missing required resource: {$resource}.");
    }
}
echo "Checked for required resources - main-plugin-file.php - line " . __LINE__ . "\n";

// Include necessary files
echo "Including necessary files - main-plugin-file.php - line " . __LINE__ . "\n";
$files_to_include = [
    'init.php',
    'admin-interface.php',
    'ajax-handlers.php',
    'APIEndpointsRegistrar.php',
    'install.php',
    'playlist-renderer.php',
    'playlist-template.php',
    'PlaylistCreator.php',
    'PlaylistDeleter.php',
    'PlaylistFetcher.php',
    'PlaylistUpdater.php',
    'shortcode.php',
    'uninstall.php',
    'utils.php'
];

foreach ($files_to_include as $file) {
    echo "Including {$file} - main-plugin-file.php - line " . __LINE__ . "\n";
    if (file_exists(plugin_dir_path(__FILE__) . $file)) {
        require_once(plugin_dir_path(__FILE__) . $file);
    } else {
        echo "Missing file: {$file}";
    }
    echo "Included {$file} - main-plugin-file.php - line " . __LINE__ . "\n";
}
echo "Included necessary files - main-plugin-file.php - line " . __LINE__ . "\n";
?>
