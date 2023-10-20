<?php

class APIEndpointsRegistrar {
    public static function register_api_endpoints() {
        register_rest_route('playlist/v1', '/fetch', array(
            'methods' => 'GET',
            'callback' => array('PlaylistFetcher', 'fetch_playlists')
        ));

        register_rest_route('playlist/v1', '/create', array(
            'methods' => 'POST',
            'callback' => array('PlaylistCreator', 'create_playlist')
        ));

        register_rest_route('playlist/v1', '/update/(?P<id>\d+)', array(
            'methods' => 'POST',
            'callback' => array('PlaylistUpdater', 'update_playlist')
        ));

        register_rest_route('playlist/v1', '/delete/(?P<id>\d+)', array(
            'methods' => 'DELETE',
            'callback' => array('PlaylistDeleter', 'delete_playlist')
        ));
    }
}

add_action('rest_api_init', array('APIEndpointsRegistrar', 'register_api_endpoints'));

?>
