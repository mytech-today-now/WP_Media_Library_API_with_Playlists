
<?php
/**
 * Plugin Name: Custom Playlist Creator
 * Plugin URI: https://yourpluginwebsite.com/
 * Description: A plugin to create custom JSON playlists using WordPress media library items.
 * Version: 1.0
 * Author: Your Name
 * Author URI: https://yourwebsite.com/
 * Text Domain: custom-playlist-creator
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

// Prevent direct file access
if (!defined('ABSPATH')) {
    exit;
}

// Include necessary files
require_once(plugin_dir_path(__FILE__) . 'init.php');
require_once(plugin_dir_path(__FILE__) . 'admin-interface.php');
require_once(plugin_dir_path(__FILE__) . 'api-endpoints.php');
require_once(plugin_dir_path(__FILE__) . 'shortcode.php');
require_once(plugin_dir_path(__FILE__) . 'ajax-handlers.php');
require_once(plugin_dir_path(__FILE__) . 'utils.php');
require_once(plugin_dir_path(__FILE__) . 'install.php');

// Other main plugin code can go here...
?>
