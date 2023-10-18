<?php

class PlaylistFetcher {
    public static function fetch_playlists() {
        $args = array(
            'post_type' => 'playlist',
            'posts_per_page' => -1
        );

        $playlists = get_posts($args);
        return new WP_REST_Response($playlists, 200);
    }
}

?>
