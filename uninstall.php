
<?php

// If uninstall is not called from WordPress, exit
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit();
}

// Delete plugin options
delete_option('playlist_plugin_option_name');

// Other uninstallation tasks can go here...

?>
