<?php

require_once 'shortcode.php';

// Test render_playlist_shortcode function with valid shortcodes
$shortcode_valid = '[playlist_embed id="1"]'; // Assuming post ID 1 is a valid playlist
$response_valid = do_shortcode($shortcode_valid);

// Verbose output for valid shortcode
echo 'Testing with valid shortcode:\n';
var_dump($response_valid);
echo '\n';

// Test render_playlist_shortcode function with invalid or incomplete shortcodes
$shortcode_invalid = '[playlist_embed]';
$response_invalid = do_shortcode($shortcode_invalid);

// Verbose output for invalid or incomplete shortcode
echo 'Testing with invalid or incomplete shortcode:\n';
var_dump($response_invalid);
echo '\n';

// Test render_playlist_shortcode function with shortcodes having additional or missing attributes
$shortcode_extra_attr = '[playlist_embed id="1" extra="value"]';
$response_extra_attr = do_shortcode($shortcode_extra_attr);

// Verbose output for shortcode with additional attributes
echo 'Testing with shortcodes having additional attributes:\n';
var_dump($response_extra_attr);
echo '\n';

$shortcode_missing_attr = '[playlist_embed missing="value"]';
$response_missing_attr = do_shortcode($shortcode_missing_attr);

// Verbose output for shortcode with missing attributes
echo 'Testing with shortcodes having missing attributes:\n';
var_dump($response_missing_attr);
echo '\n';

// Test render_playlist_shortcode function to check how the shortcode handles invalid media item references
$shortcode_invalid_ref = '[playlist_embed id="9999"]'; // Assuming post ID 9999 is not a valid playlist
$response_invalid_ref = do_shortcode($shortcode_invalid_ref);

// Verbose output for shortcode with invalid media item reference
echo 'Testing how the shortcode handles invalid media item references:\n';
var_dump($response_invalid_ref);
echo '\n';

?>