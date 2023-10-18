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

// Define plugin version as a constant
define('CUSTOM_PLAYLIST_CREATOR_VERSION', '1.0');

// Prevent direct file access
if (!defined('ABSPATH')) {
    exit;
}

// Check for WordPress version compatibility
global $wp_version;
if (version_compare($wp_version, '5.0', '<')) {
    deactivate_plugins(basename(__FILE__)); // Deactivate the plugin
    wp_die("This plugin requires WordPress version 5.0 or higher.");
}

// Check for required resources
$required_resources = ['js/script.js', 'css/style.css']; // Placeholder for required resources
foreach ($required_resources as $resource) {
    if (!file_exists(plugin_dir_path(__FILE__) . $resource)) {
        deactivate_plugins(basename(__FILE__)); // Deactivate the plugin
        wp_die("Missing required resource: {$resource}.");
    }
}

// Include necessary files
require_once(plugin_dir_path(__FILE__) . 'init.php');
require_once(plugin_dir_path(__FILE__) . 'admin-interface.php');
require_once(plugin_dir_path(__FILE__) . 'api-endpoints-full.php');
require_once(plugin_dir_path(__FILE__) . 'ajax-handlers.php');
require_once(plugin_dir_path(__FILE__) . 'tests/bootstrap.php');
require_once(plugin_dir_path(__FILE__) . 'shortcode.php');
require_once(plugin_dir_path(__FILE__) . 'utils.php');
require_once(plugin_dir_path(__FILE__) . 'install.php');
require_once(plugin_dir_path(__FILE__) . 'playlist-renderer.php');
require_once(plugin_dir_path(__FILE__) . 'uninstall.php');
// Other main plugin code can go here...
?>
