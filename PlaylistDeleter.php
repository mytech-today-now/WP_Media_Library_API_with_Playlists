<?php

class PlaylistDeleter {
    public static function delete_playlist($request) {
        $post_id = $request['id'];

        $deleted = wp_delete_post($post_id, true);

        if(!$deleted) {
            return new WP_REST_Response("Error deleting playlist.", 500);
        }

        return new WP_REST_Response("Successfully deleted.", 200);
    }
}

?>
