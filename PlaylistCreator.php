<?php

class PlaylistCreator {
    public static function create_playlist($request) {
        $playlist_data = $request->get_json_params();

        // Check if the playlist with the given title already exists
        $existing_playlist = get_page_by_title($playlist_data['title'], OBJECT, 'playlist');

        if ($existing_playlist) {
            return new WP_REST_Response("Playlist with the title '{$playlist_data['title']}' already exists.", 409); // 409 Conflict
        }

        // Create post
        $post_id = wp_insert_post(array(
            'post_title' => $playlist_data['title'],
            'post_type' => 'playlist',
            'post_status' => 'publish'
        ));

        if(!$post_id) {
            return new WP_REST_Response("Error creating playlist.", 500);
        }

        // Cache the created playlist for faster subsequent access
        wp_cache_set("playlist_{$post_id}", $playlist_data, 'playlists', 3600); // Cache for 1 hour

        // Add metadata here if needed
        // update_post_meta($post_id, 'meta_key', $meta_value);

        return new WP_REST_Response(array('id' => $post_id), 200);
    }
}

?>
