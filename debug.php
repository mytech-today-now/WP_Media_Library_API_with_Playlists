<?php
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


?>