<?php

/**
 * Sanitize string data
 *
 * @param string $input The input string to sanitize.
 * @return string Sanitized string.
 */
function sanitize_string_input($input) {
    return sanitize_text_field($input);
}

/**
 * Validate URL
 *
 * @param string $url The URL to validate.
 * @return bool True if valid, false otherwise.
 */
function validate_url($url) {
    return filter_var($url, FILTER_VALIDATE_URL) !== false;
}

/**
 * Sanitize URL
 *
 * @param string $url The URL to sanitize.
 * @return string Sanitized URL.
 */
function sanitize_url_input($url) {
    return esc_url_raw($url);
}

/**
 * Validate integer values
 *
 * @param int $int The integer to validate.
 * @return bool True if valid, false otherwise.
 */
function validate_integer($int) {
    return filter_var($int, FILTER_VALIDATE_INT) !== false;
}

/**
 * Sanitize integer values
 *
 * @param int $int The integer to sanitize.
 * @return int Sanitized integer.
 */
function sanitize_integer_input($int) {
    return intval($int);
}

/**
 * Validate boolean values
 *
 * @param bool $value The boolean value to validate.
 * @return bool True if valid, false otherwise.
 */
function validate_bool($value) {
    return is_bool($value);
}

/**
 * Convert string 'true' and 'false' to boolean
 *
 * @param string $string The string to convert.
 * @return bool Converted boolean value.
 */
function string_to_bool($string) {
    return filter_var($string, FILTER_VALIDATE_BOOLEAN);
}

/**
 * Helper function to check if a given post ID belongs to a 'playlist' post type
 *
 * @param int $post_id The post ID to check.
 * @return bool True if valid, false otherwise.
 */
function is_valid_playlist($post_id) {
    $post = get_post($post_id);
    return ($post && $post->post_type === 'playlist');
}

/**
 * New function to sanitize email
 *
 * @param string $email The email to sanitize.
 * @return string Sanitized email.
 */
function sanitize_email_input($email) {
    return sanitize_email($email);
}

/**
 * New function to validate email
 *
 * @param string $email The email to validate.
 * @return bool True if valid, false otherwise.
 */
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * New function to sanitize textarea input
 *
 * @param string $input The textarea input to sanitize.
 * @return string Sanitized textarea input.
 */
function sanitize_textarea_input($input) {
    return sanitize_textarea_field($input);
}

?>
