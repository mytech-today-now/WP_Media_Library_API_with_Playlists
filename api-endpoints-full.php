<?php

// Fetching all playlists
function fetch_playlists() {
    $args = array(
        'post_type' => 'playlist',
        'posts_per_page' => -1
    );

    $playlists = get_posts($args);

    return new WP_REST_Response($playlists, 200);
}

// Creating a new playlist
function create_playlist($request) {
    $playlist_data = $request->get_json_params();

    // Create post
    $post_id = wp_insert_post(array(
        'post_title' => $playlist_data['title'],
        'post_type' => 'playlist',
        'post_status' => 'publish'
    ));

    if(!$post_id) {
        return new WP_REST_Response("Error creating playlist.", 500);
    }

    // Add metadata here if needed
    // update_post_meta($post_id, 'meta_key', $meta_value);

    return new WP_REST_Response(array('id' => $post_id), 200);
}

// Updating an existing playlist
function update_playlist($request) {
    $playlist_data = $request->get_json_params();
    $post_id = $request['id'];

    $updated = wp_update_post(array(
        'ID' => $post_id,
        'post_title' => $playlist_data['title']
    ));

    if(!$updated) {
        return new WP_REST_Response("Error updating playlist.", 500);
    }

    // Update metadata here if needed
    // update_post_meta($post_id, 'meta_key', $meta_value);

    return new WP_REST_Response(array('id' => $post_id), 200);
}

// Deleting a playlist
function delete_playlist($request) {
    $post_id = $request['id'];

    $deleted = wp_delete_post($post_id, true);

    if(!$deleted) {
        return new WP_REST_Response("Error deleting playlist.", 500);
    }

    return new WP_REST_Response("Successfully deleted.", 200);
}

// Register API endpoints
function register_api_endpoints() {
    register_rest_route('playlist/v1', '/fetch', array(
        'methods' => 'GET',
        'callback' => 'fetch_playlists'
    ));

    register_rest_route('playlist/v1', '/create', array(
        'methods' => 'POST',
        'callback' => 'create_playlist'
    ));

    register_rest_route('playlist/v1', '/update/(?P<id>\d+)', array(
        'methods' => 'POST',
        'callback' => 'update_playlist'
    ));

    register_rest_route('playlist/v1', '/delete/(?P<id>\d+)', array(
        'methods' => 'DELETE',
        'callback' => 'delete_playlist'
    ));
}

add_action('rest_api_init', 'register_api_endpoints');

?>