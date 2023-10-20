<?php

class PlaylistFetcher {
    public static function fetch_playlists() {
        echo "Executing function fetch_playlists - PlaylistFetcher.php - line " . __LINE__ . "\n";
        
        $args = array(
            'post_type' => 'playlist',
            'posts_per_page' => -1
        );

        // Try to get cached results
        $cached_playlists = wp_cache_get('all_playlists', 'playlists');
        echo "Try to get cached results - PlaylistFetcher.php - line " . __LINE__ . "\n";

        if ($cached_playlists) {
            echo "If the playlist is cached, return it with 200 response - PlaylistFetcher.php - line " . __LINE__ . "\n";
            return new WP_REST_Response($cached_playlists, 200);
        }

        $playlists = get_posts($args);
        echo "playlists = get_posts(args) - PlaylistFetcher.php - line " . __LINE__ . "\n";

        // Cache the results for faster subsequent access
        wp_cache_set('all_playlists', $playlists, 'playlists', 3600); // Cache for 1 hour
        echo "Cache the results for faster subsequent access - PlaylistFetcher.php - line " . __LINE__ . "\n";

        echo "Finished executing function fetch_playlists - PlaylistFetcher.php - line " . __LINE__ . "\n";
        echo "return new WP_REST_Response(playlists, 200); - PlaylistFetcher.php - line " . __LINE__ . "\n";
        return new WP_REST_Response($playlists, 200);
    }
}

?>
