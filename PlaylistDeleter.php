<?php

class PlaylistDeleter {
    public static function delete_playlist($request) {
        echo "Executing function delete_playlist - PlaylistDeleter.php - line " . __LINE__ . "\n";
        
        $post_id = $request['id'];
        echo "Get post_id - PlaylistDeleter.php - line " . __LINE__ . "\n";

        // Check if the post with the given ID exists
        $existing_playlist = get_post($post_id);
        echo "Check if the post with the given ID exists - PlaylistDeleter.php - line " . __LINE__ . "\n";

        if (!$existing_playlist) {
            echo "Playlist_id {$post_id} doesn't exist - Return 404 - file not found - PlaylistDeleter.php - line " . __LINE__ . "\n";
            return new WP_REST_Response("Playlist with ID '{$post_id}' does not exist.", 404); // 404 Not Found
        }

        $deleted = wp_delete_post($post_id, true);
        echo "Delete playlist {$post_id} - PlaylistDeleter.php - line " . __LINE__ . "\n";

        if(!$deleted) {
            echo "Error deleting playlist - PlaylistDeleter.php - line " . __LINE__ . "\n";
            return new WP_REST_Response("Error deleting playlist.", 500);
        }

        // Invalidate cache after deleting the playlist
        wp_cache_delete("playlist_{$post_id}", 'playlists');
        echo "Invalidate cache after deleting the playlist - PlaylistDeleter.php - line " . __LINE__ . "\n";

        echo "Finished executing function delete_playlist - PlaylistDeleter.php - line " . __LINE__ . "\n";
        
        return new WP_REST_Response("Successfully deleted.", 200);
    }
}

?>
