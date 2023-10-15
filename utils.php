
<?php

// Sanitize string data
function sanitize_string_input($input) {
    return sanitize_text_field($input);
}

// Validate URL
function validate_url($url) {
    return filter_var($url, FILTER_VALIDATE_URL) !== false;
}

// Sanitize URL
function sanitize_url_input($url) {
    return esc_url_raw($url);
}

// Validate integer values
function validate_integer($int) {
    return filter_var($int, FILTER_VALIDATE_INT) !== false;
}

// Sanitize integer values
function sanitize_integer_input($int) {
    return intval($int);
}

// Validate boolean values
function validate_bool($value) {
    return is_bool($value);
}

// Convert string 'true' and 'false' to boolean
function string_to_bool($string) {
    return filter_var($string, FILTER_VALIDATE_BOOLEAN);
}

// Helper function to check if a given post ID belongs to a 'playlist' post type
function is_valid_playlist($post_id) {
    $post = get_post($post_id);
    return ($post && $post->post_type === 'playlist');
}

?>
