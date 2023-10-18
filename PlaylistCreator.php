<?php

class PlaylistCreator {
    public static function create_playlist($request) {
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
}

?>
