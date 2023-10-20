<?php

/**
 * Sanitize string data
 *
 * @param string $input The input string to sanitize.
 * @return string Sanitized string.
 */
function sanitize_string_input($input) {
    echo "Try to get cached results - utils.php - line " . __LINE__ . "\n";
    return sanitize_text_field($input);
}

/**
 * Validate and sanitize URL
 *
 * @param string $url The URL to validate and sanitize.
 * @return string|false Sanitized URL or false if invalid.
 */
function process_url($url) {
    if (filter_var($url, FILTER_VALIDATE_URL) === false) {
        echo "Validate and sanitize URL - failed - utils.php - line " . __LINE__ . "\n";
        return false;
    }
    return esc_url_raw($url);
}

/**
 * Validate and sanitize integer values
 *
 * @param mixed $int The value to validate and sanitize.
 * @return int|false Sanitized integer or false if invalid.
 */
function process_integer($int) {
    if (filter_var($int, FILTER_VALIDATE_INT) === false) {
        echo "Validate and sanitize integer values - failed - utils.php - line " . __LINE__ . "\n";
        return false;
    }
    return intval($int);
}

/**
 * Convert string 'true' and 'false' to boolean
 *
 * @param string $string The string to convert.
 * @return bool Converted boolean value.
 */
function string_to_bool($string) {
    echo "Convert string 'true' and 'false' to boolean - utils.php - line " . __LINE__ . "\n";
    return filter_var($string, FILTER_VALIDATE_BOOLEAN);
}

/**
 * Helper function to check if a given post ID belongs to a 'playlist' post type
 *
 * @param int $post_id The post ID to check.
 * @return bool True if valid, false otherwise.
 */
echo "Helper function to check if a given post ID belongs to a 'playlist' post type - utils.php - line " . __LINE__ . "\n";
function is_valid_playlist($post_id) {
    $post = get_post($post_id);
    return ($post && $post->post_type === 'playlist');
}

/**
 * Validate and sanitize email
 *
 * @param string $email The email to validate and sanitize.
 * @return string|false Sanitized email or false if invalid.
 */
function process_email($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo "Sanitized email or false if invalid - utils.php - line " . __LINE__ . "\n";
        return false;
    }
    return sanitize_email($email);
}

/**
 * Sanitize textarea input
 *
 * @param string $input The textarea input to sanitize.
 * @return string Sanitized textarea input.
 */
function sanitize_textarea_input($input) {
    echo "Sanitize textarea input - utils.php - line " . __LINE__ . "\n";
    return sanitize_textarea_field($input);
}

?>
