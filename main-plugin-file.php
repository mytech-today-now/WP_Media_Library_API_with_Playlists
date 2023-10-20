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

class BufferedLogger {

    public function __construct() {
        // Start buffering when WordPress initializes
        add_action('init', [$this, 'start_buffering']);

        // End buffering during the WordPress shutdown phase
        add_action('shutdown', [$this, 'end_buffering']);
    }

    public function start_buffering() {
        ob_start();
    }

    public function end_buffering() {
        ob_end_flush();
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


// intitialize the buffered logger
$bufferedLogger = new BufferedLogger();
$bufferedLogger->pushHandler(new StreamHandler("./files/logs/mylog.log", Logger::DEBUG));
$bufferedLogger->pushHandler(new StreamHandler("./files/logs/mylog.log", Logger::INFO));
$bufferedLogger->pushHandler(new StreamHandler("./files/logs/mylog.log", Logger::WARNING));
$bufferedLogger->pushHandler(new StreamHandler("./files/logs/mylog.log", Logger::ERROR));
$bufferedLogger->pushHandler(new StreamHandler("./files/logs/mylog.log", Logger::CRITICAL));
$bufferedLogger->pushHandler(new StreamHandler("./files/logs/mylog.log", Logger::ALERT));
$bufferedLogger->pushHandler(new StreamHandler("./files/logs/mylog.log", Logger::EMERGENCY));
$bufferedLogger->pushHandler(new StreamHandler("./files/logs/mylog.log", Logger::ERROR));
$bufferedLogger->pushHandler(new StreamHandler("./files/logs/mylog.log", Logger::NOTICE));


// Plugin Activation
function custom_playlist_activation() {
    // Code to run on plugin activation
    // For example, you can set default options, create database tables, etc.
}

// Plugin Deactivation
function custom_playlist_deactivation() {
    // Code to run on plugin deactivation
    // For example, you can clean up temporary data, remove cron jobs, etc.
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
$required_resources = ['js/script.js', 'css/style.css']; // Placeholder for required resources
foreach ($required_resources as $resource) {
    if (!file_exists(plugin_dir_path(__FILE__) . $resource)) {
        deactivate_plugins(basename(__FILE__)); // Deactivate the plugin
        wp_die("Missing required resource: {$resource}.");
    }
}

// Include necessary files
require_once(plugin_dir_path(__FILE__) . 'admin-interface.php');
require_once(plugin_dir_path(__FILE__) . 'ajax-handlers.php');
require_once(plugin_dir_path(__FILE__) . 'APIEndpointsRegistrar.php');
require_once(plugin_dir_path(__FILE__) . 'init.php');
require_once(plugin_dir_path(__FILE__) . 'install.php');
require_once(plugin_dir_path(__FILE__) . 'playlist-renderer.php');
require_once(plugin_dir_path(__FILE__) . 'PlaylistCreator.php');
require_once(plugin_dir_path(__FILE__) . 'PlaylistDeleter.php');
require_once(plugin_dir_path(__FILE__) . 'PlaylistFetcher.php');
require_once(plugin_dir_path(__FILE__) . 'PlaylistUpdater.php');
require_once(plugin_dir_path(__FILE__) . 'shortcode.php');
require_once(plugin_dir_path(__FILE__) . 'uninstall.php');
require_once(plugin_dir_path(__FILE__) . 'utils.php');

// Other main plugin code can go here...

?>

?>
