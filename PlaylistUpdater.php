<?php

class PlaylistUpdater {
    public static function update_playlist($request) {
        echo "Executing function update_playlist - PlaylistUpdater.php - line " . __LINE__ . "\n";
        
        $playlist_data = $request->get_json_params();
        $post_id = $request['id'];

        echo "Checking if the post with the given ID exists - PlaylistUpdater.php - line " . __LINE__ . "\n";
        $existing_playlist = get_post($post_id);
        if (!$existing_playlist) {
            echo "Post with ID '{$post_id}' does not exist - PlaylistUpdater.php - line " . __LINE__ . "\n";
            return new WP_REST_Response("Playlist with ID '{$post_id}' does not exist.", 404); // 404 Not Found
        }

        echo "Checking if the title needs an update - PlaylistUpdater.php - line " . __LINE__ . "\n";
        if ($existing_playlist->post_title === $playlist_data['title']) {
            echo "No changes detected for title - PlaylistUpdater.php - line " . __LINE__ . "\n";
            return new WP_REST_Response("No changes detected.", 304); // 304 Not Modified
        }

        echo "Updating post title - PlaylistUpdater.php - line " . __LINE__ . "\n";
        $updated = wp_update_post(array(
            'ID' => $post_id,
            'post_title' => $playlist_data['title']
        ));
        if(!$updated) {
            echo "Error updating playlist - PlaylistUpdater.php - line " . __LINE__ . "\n";
            return new WP_REST_Response("Error updating playlist.", 500);
        }

        echo "Invalidating cache after updating the playlist - PlaylistUpdater.php - line " . __LINE__ . "\n";
        wp_cache_delete("playlist_{$post_id}", 'playlists');

        echo "Finished executing function update_playlist - PlaylistUpdater.php - line " . __LINE__ . "\n";
        
        return new WP_REST_Response(array('id' => $post_id), 200);
    }
}

?>
