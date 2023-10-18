<?php

require_once dirname( __FILE__ ) . '/../APIEndpointsRegistrar.php';
require_once dirname( __FILE__ ) . '/../PlaylistCreator.php';
require_once dirname( __FILE__ ) . '/../PlaylistUpdater.php';
require_once dirname( __FILE__ ) . '/../PlaylistDeleter.php';
require_once dirname( __FILE__ ) . '/../PlaylistFetcher.php';


// Test fetch_playlists endpoint with valid request data
$response_fetch = fetch_playlists();

// Verbose output for fetch_playlists endpoint
echo 'Testing fetch_playlists endpoint with valid request data:\n';
var_dump($response_fetch);
echo '\n';

// Test create_playlist endpoint with valid and invalid request data
$request_valid = new WP_REST_Request('POST');
$request_valid->set_body_params(['title' => 'Valid Playlist']);
$response_valid = create_playlist($request_valid);

$request_invalid = new WP_REST_Request('POST');
$request_invalid->set_body_params([]); // Missing title
$response_invalid = create_playlist($request_invalid);

// Verbose output for create_playlist endpoint
echo 'Testing create_playlist endpoint with valid request data:\n';
var_dump($response_valid);
echo '\n';
echo 'Testing create_playlist endpoint with invalid request data:\n';
var_dump($response_invalid);
echo '\n';

// Test update_playlist endpoint with valid and invalid request data
$request_update_valid = new WP_REST_Request('POST');
$request_update_valid->set_body_params(['title' => 'Updated Playlist']);
$request_update_valid->set_url_params(['id' => 1]); // Assuming post ID 1 is a valid playlist
$response_update_valid = update_playlist($request_update_valid);

$request_update_invalid = new WP_REST_Request('POST');
$request_update_invalid->set_body_params([]); // Missing title
$request_update_invalid->set_url_params(['id' => 9999]); // Assuming post ID 9999 is not a valid playlist
$response_update_invalid = update_playlist($request_update_invalid);

// Verbose output for update_playlist endpoint
echo 'Testing update_playlist endpoint with valid request data:\n';
var_dump($response_update_valid);
echo '\n';
echo 'Testing update_playlist endpoint with invalid request data:\n';
var_dump($response_update_invalid);
echo '\n';

// Test delete_playlist endpoint with valid and invalid request data
$request_delete_valid = new WP_REST_Request('DELETE');
$request_delete_valid->set_url_params(['id' => 1]); // Assuming post ID 1 is a valid playlist
$response_delete_valid = delete_playlist($request_delete_valid);

$request_delete_invalid = new WP_REST_Request('DELETE');
$request_delete_invalid->set_url_params(['id' => 9999]); // Assuming post ID 9999 is not a valid playlist
$response_delete_invalid = delete_playlist($request_delete_invalid);

// Verbose output for delete_playlist endpoint
echo 'Testing delete_playlist endpoint with valid request data:\n';
var_dump($response_delete_valid);
echo '\n';
echo 'Testing delete_playlist endpoint with invalid request data:\n';
var_dump($response_delete_invalid);
echo '\n';

// Note: Additional tests for handling of missing or incorrect headers and unauthorized or unauthenticated requests would require a more complex setup, including a mock WordPress environment and authentication mechanisms.

?>