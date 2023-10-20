<?php

// Instantiate the logging class
$bufferedLogger = new WPMediaBufferedLogger();

$bufferedLogger->log_me("Init loaded");

// Prevent direct file access
if (!defined('ABSPATH')) {
    $bufferedLogger->log_me("Exiting because of direct file access not defined");
    exit;
}

// Check for WordPress version compatibility
global $wp_version;
if (version_compare($wp_version, '5.0', '<')) {
    deactivate_plugins(basename(__FILE__)); // Deactivate the plugin
    $bufferedLogger->log_me("This plugin requires WordPress version 5.0 or higher.");
    wp_die("This plugin requires WordPress version 5.0 or higher.");
}

// Check for required resources
$required_resources = ['js/script.js', 'css/style.css'];
foreach ($required_resources as $resource) {
    if (!file_exists(plugin_dir_path(__FILE__) . $resource)) {
        deactivate_plugins(basename(__FILE__)); // Deactivate the plugin
        $bufferedLogger->log_me("Missing required resource: {$resource}.");
        wp_die("Missing required resource: {$resource}.");
    }
}

// Include necessary files
$files_to_include = [
    'admin-interface.php',
    'ajax-handlers.php',
    'APIEndpointsRegistrar.php',
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
