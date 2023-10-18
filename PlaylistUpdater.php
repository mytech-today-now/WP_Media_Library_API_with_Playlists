<?php

class PlaylistUpdater {
    public static function update_playlist($request) {
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
}

?>
