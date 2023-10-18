<?php

class PlaylistFetcher {
    public static function fetch_playlists() {
        $args = array(
            'post_type' => 'playlist',
            'posts_per_page' => -1
        );

        // Try to get cached results
        $cached_playlists = wp_cache_get('all_playlists', 'playlists');

        if ($cached_playlists) {
            return new WP_REST_Response($cached_playlists, 200);
        }

        $playlists = get_posts($args);

        // Cache the results for faster subsequent access
        wp_cache_set('all_playlists', $playlists, 'playlists', 3600); // Cache for 1 hour

        return new WP_REST_Response($playlists, 200);
    }
}

?>
