<?php

class PlaylistUpdater {
    public static function update_playlist($request) {
        $playlist_data = $request->get_json_params();
        $post_id = $request['id'];

        // Check if the post with the given ID exists
        $existing_playlist = get_post($post_id);

        if (!$existing_playlist) {
            return new WP_REST_Response("Playlist with ID '{$post_id}' does not exist.", 404); // 404 Not Found
        }

        // Check if the title needs an update to avoid redundant operations
        if ($existing_playlist->post_title === $playlist_data['title']) {
            return new WP_REST_Response("No changes detected.", 304); // 304 Not Modified
        }

        $updated = wp_update_post(array(
            'ID' => $post_id,
            'post_title' => $playlist_data['title']
        ));

        if(!$updated) {
            return new WP_REST_Response("Error updating playlist.", 500);
        }

        // Invalidate cache after updating the playlist
        wp_cache_delete("playlist_{$post_id}", 'playlists');

        return new WP_REST_Response(array('id' => $post_id), 200);
    }
}

?>
