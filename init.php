<?php

// Prevent direct file access
echo "Checking for direct file access - init.php - line " . __LINE__ . "\n";
if (!defined('ABSPATH')) {
    echo "Exiting because of direct file access not defined - init.php - line " . __LINE__ . "\n";
    exit;
}
echo "Checked for direct file access - init.php - line " . __LINE__ . "\n";

?>
