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

// Other uninstallation tasks can go here...

?>