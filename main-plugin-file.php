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

class WPMediaBufferedLogger {
    public function __construct() {
        add_action('init', [$this, 'start_buffering']);
        add_action('shutdown', [$this, 'end_buffering']);
    }

    public function start_buffering() {
        if (!ob_get_level()) { // Check if output buffering is already active
            ob_start();
        }
    }

    public function end_buffering() {
        if (ob_get_level()) { // Check if output buffering is active before ending it
            ob_end_flush();
        }
    }

    public function log_me($message) {
        if (WP_DEBUG === true) {
            if (is_array($message) || is_object($message)) {
                error_log(print_r($message, true));
            } else {
                error_log($message);
                echo "<script>console.log('{$message}');</script>";
            }
        }
    }
}

$bufferedLogger = new WPMediaBufferedLogger();

// Plugin Activation
function custom_playlist_activation() {
    // Code to run on plugin activation
}

// Plugin Deactivation
function custom_playlist_deactivation() {
    // Code to run on plugin deactivation
}

register_activation_hook(__FILE__, 'custom_playlist_activation');
register_deactivation_hook(__FILE__, 'custom_playlist_deactivation');

// Check for WordPress version compatibility
global $wp_version;
if (version_compare($wp_version, '5.0', '<')) {
    deactivate_plugins(basename(__FILE__)); // Deactivate the plugin
    wp_die("This plugin requires WordPress version 5.0 or higher.");
}

// Check for required resources
$required_resources = ['js/script.js', 'css/style.css'];
foreach ($required_resources as $resource) {
    if (!file_exists(plugin_dir_path(__FILE__) . $resource)) {
        deactivate_plugins(basename(__FILE__)); // Deactivate the plugin
        wp_die("Missing required resource: {$resource}.");
    }
}

// Include necessary files
$files_to_include = [
    'admin-interface.php',
    'ajax-handlers.php',
    'APIEndpointsRegistrar.php',
    'init.php',
    'install.php',
    'playlist-renderer.php',
    'PlaylistCreator.php',
    'PlaylistDeleter.php',
    'PlaylistFetcher.php',
    'PlaylistUpdater.php',
    'shortcode.php',
    'uninstall.php',
    'utils.php'
];

foreach ($files_to_include as $file) {
    if (file_exists(plugin_dir_path(__FILE__) . $file)) {
        require_once(plugin_dir_path(__FILE__) . $file);
    } else {
        $bufferedLogger->log_me("Missing file: {$file}");
    }
}

?>
