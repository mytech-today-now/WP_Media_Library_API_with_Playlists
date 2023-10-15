
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

    // Set default options
    add_option('playlist_plugin_option_name', 'default_value');

    // Other installation tasks can go here...
}

register_activation_hook(__FILE__, 'playlist_plugin_install');

?>
