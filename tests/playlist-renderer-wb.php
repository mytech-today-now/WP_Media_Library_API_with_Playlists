<?php

require_once dirname( __FILE__ ) . '/../playlist-renderer.php';

// Test render_playlist function with valid playlist data
$post_id_valid = 1; // Assuming post ID 1 is a valid playlist
$response_valid = render_playlist(['id' => $post_id_valid]);

// Verbose output for valid playlist data
echo 'Testing with valid playlist data:\n';
var_dump($response_valid);
echo '\n';

// Test render_playlist function with invalid playlist data
$post_id_invalid = 9999; // Assuming post ID 9999 is not a valid playlist
$response_invalid = render_playlist(['id' => $post_id_invalid]);

// Verbose output for invalid playlist data
echo 'Testing with invalid playlist data:\n';
var_dump($response_invalid);
echo '\n';

// Test rendering of empty playlists
// Note: This requires a setup where an empty playlist exists in the WordPress database
$post_id_empty = 2; // Placeholder post ID for an empty playlist
$response_empty = render_playlist(['id' => $post_id_empty]);

// Verbose output for empty playlist
echo 'Testing rendering of empty playlists:\n';
var_dump($response_empty);
echo '\n';

// Test rendering of playlists with a large number of media items
// Note: This requires a setup where a playlist with a large number of media items exists
$post_id_large = 3; // Placeholder post ID for a large playlist
$response_large = render_playlist(['id' => $post_id_large]);

// Verbose output for large playlist
echo 'Testing rendering of playlists with a large number of media items:\n';
var_dump($response_large);
echo '\n';

// Test rendering of playlists with special characters or non-standard data
// Note: This requires a setup where a playlist with special characters exists
$post_id_special = 4; // Placeholder post ID for a playlist with special characters
$response_special = render_playlist(['id' => $post_id_special]);

// Verbose output for playlist with special characters
echo 'Testing rendering of playlists with special characters or non-standard data:\n';
var_dump($response_special);
echo '\n';

?>