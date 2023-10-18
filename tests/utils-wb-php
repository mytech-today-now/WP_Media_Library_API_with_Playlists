<?php

require_once 'utils.php';

// Test sanitize_string_input function
$input_valid = 'Hello World';
$input_invalid = '<script>alert("hack");</script>';

$result_valid = sanitize_string_input($input_valid);
$result_invalid = sanitize_string_input($input_invalid);

var_dump($result_valid);
var_dump($result_invalid);

// Test validate_url function
$url_valid = 'https://www.example.com';
$url_invalid = 'not_a_url';

$result_valid = validate_url($url_valid);
$result_invalid = validate_url($url_invalid);

var_dump($result_valid);
var_dump($result_invalid);

// Test sanitize_url_input function
$result_valid = sanitize_url_input($url_valid);
$result_invalid = sanitize_url_input($url_invalid);

var_dump($result_valid);
var_dump($result_invalid);

// Test validate_integer function
$int_valid = 123;
$int_invalid = 'abc';

$result_valid = validate_integer($int_valid);
$result_invalid = validate_integer($int_invalid);

var_dump($result_valid);
var_dump($result_invalid);

// Test sanitize_integer_input function
$result_valid = sanitize_integer_input($int_valid);
$result_invalid = sanitize_integer_input($int_invalid);

var_dump($result_valid);
var_dump($result_invalid);

// Test validate_bool function
$bool_valid = true;
$bool_invalid = 'true';

$result_valid = validate_bool($bool_valid);
$result_invalid = validate_bool($bool_invalid);

var_dump($result_valid);
var_dump($result_invalid);

// Test string_to_bool function
$string_true = 'true';
$string_false = 'false';

$result_true = string_to_bool($string_true);
$result_false = string_to_bool($string_false);

var_dump($result_true);
var_dump($result_false);

// Test is_valid_playlist function
// Note: This function requires a valid post ID from the WordPress database.
// This test is a placeholder and should be adjusted based on the actual WordPress setup.
$post_id_valid = 1; // Assuming post ID 1 is a valid playlist
$post_id_invalid = 9999; // Assuming post ID 9999 is not a valid playlist

$result_valid = is_valid_playlist($post_id_valid);
$result_invalid = is_valid_playlist($post_id_invalid);

var_dump($result_valid);
var_dump($result_invalid);

// Test sanitize_email_input and validate_email functions
$email_valid = 'test@example.com';
$email_invalid = 'test@example';

$result_valid = sanitize_email_input($email_valid);
$result_invalid = sanitize_email_input($email_invalid);

var_dump($result_valid);
var_dump($result_invalid);

$result_valid = validate_email($email_valid);
$result_invalid = validate_email($email_invalid);

var_dump($result_valid);
var_dump($result_invalid);

// Test sanitize_textarea_input function
$textarea_valid = 'This is a sample text.';
$textarea_invalid = '<script>alert("hack");</script>';

$result_valid = sanitize_textarea_input($textarea_valid);
$result_invalid = sanitize_textarea_input($textarea_invalid);

var_dump($result_valid);
var_dump($result_invalid);

?>