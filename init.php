<?php

// Instantiate the logging class
//$bufferedLogger = new WPMediaBufferedLogger();


// $bufferedLogger->log_me("Init loaded");

// Prevent direct file access
if (!defined('ABSPATH')) {
    // $bufferedLogger->log_me("Exiting because of direct file access not defined");
    echo "Exiting because of direct file access not defined";
    exit;
}
?>
