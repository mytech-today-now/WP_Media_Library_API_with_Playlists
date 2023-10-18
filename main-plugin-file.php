
<?php
/**
 * Plugin Name: Custom Playlist Creator
 * Plugin URI: https://mytech.today
 * Description: A plugin to create custom JSON playlists using WordPress media library items.
 * Version: 1.0
 * Author: mytech.today
 * Author URI: https://mytech.today
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
