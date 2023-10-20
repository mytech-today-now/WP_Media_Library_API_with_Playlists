<?php

class APIEndpointsRegistrar {
    public static function register_api_endpoints() {
        echo "Executing function register_api_endpoints - APIEndpointsRegistrar.php - line " . __LINE__ . "\n";
        
        echo "Registering route /fetch - APIEndpointsRegistrar.php - line " . (__LINE__ + 1) . "\n";
        register_rest_route('playlist/v1', '/fetch', array(
            'methods' => 'GET',
            'callback' => array('PlaylistFetcher', 'fetch_playlists')
        ));
        echo "Finished registering route /fetch - APIEndpointsRegistrar.php - line " . (__LINE__ - 1) . "\n";

        echo "Registering route /create - APIEndpointsRegistrar.php - line " . (__LINE__ + 1) . "\n";
        register_rest_route('playlist/v1', '/create', array(
            'methods' => 'POST',
            'callback' => array('PlaylistCreator', 'create_playlist')
        ));
        echo "Finished registering route /create - APIEndpointsRegistrar.php - line " . (__LINE__ - 1) . "\n";

        echo "Registering route /update/(?P<id>\\d+) - APIEndpointsRegistrar.php - line " . (__LINE__ + 1) . "\n";
        register_rest_route('playlist/v1', '/update/(?P<id>\\d+)', array(
            'methods' => 'POST',
            'callback' => array('PlaylistUpdater', 'update_playlist')
        ));
        echo "Finished registering route /update/(?P<id>\\d+) - APIEndpointsRegistrar.php - line " . (__LINE__ - 1) . "\n";

        echo "Registering route /delete/(?P<id>\\d+) - APIEndpointsRegistrar.php - line " . (__LINE__ + 1) . "\n";
        register_rest_route('playlist/v1', '/delete/(?P<id>\\d+)', array(
            'methods' => 'DELETE',
            'callback' => array('PlaylistDeleter', 'delete_playlist')
        ));
        echo "Finished registering route /delete/(?P<id>\\d+) - APIEndpointsRegistrar.php - line " . (__LINE__ - 1) . "\n";
        
        echo "Finished executing function register_api_endpoints - APIEndpointsRegistrar.php - line " . __LINE__ . "\n";
    }
}

add_action('rest_api_init', array('APIEndpointsRegistrar', 'register_api_endpoints'));

?>
