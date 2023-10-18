<?php

class PlaylistDeleter {
    public static function delete_playlist($request) {
        $post_id = $request['id'];

        // Check if the post with the given ID exists
        $existing_playlist = get_post($post_id);

        if (!$existing_playlist) {
            return new WP_REST_Response("Playlist with ID '{$post_id}' does not exist.", 404); // 404 Not Found
        }

        $deleted = wp_delete_post($post_id, true);

        if(!$deleted) {
            return new WP_REST_Response("Error deleting playlist.", 500);
        }

        // Invalidate cache after deleting the playlist
        wp_cache_delete("playlist_{$post_id}", 'playlists');

        return new WP_REST_Response("Successfully deleted.", 200);
    }
}

?>
