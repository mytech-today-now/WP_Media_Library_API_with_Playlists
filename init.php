<?php

// Prevent direct file access
echo "Checking for direct file access - init.php - line 5";
if (!defined('ABSPATH')) {
    echo "Exiting because of direct file access not defined - init.php - line 7";
    exit;
}
echo "Checked for direct file access - init.php - line 10";

?>
