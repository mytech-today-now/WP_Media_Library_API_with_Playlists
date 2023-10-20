<?php

function render_playlist($request) {
    echo "Executing function render_playlist - playlist-renderer.php - line " . __LINE__ . "\n";
    
    // Get the post based on the ID
    $post_id = $request['id'];
    $post = get_post($post_id);

    // Ensure the post is of the 'playlist' type
    if (!$post || $post->post_type !== 'playlist') {
        echo "No playlist found with ID {$post_id} - playlist-renderer.php - line " . __LINE__ . "\n";
        return new WP_REST_Response("No playlist found with ID {$post_id}.", 404);
    }

    // Extract metadata and check for missing or corrupted data
    $metadata_keys = [
        'timing', 'source_url', 'length', 'play_direction', 'credits', 'description',
        'thumbnail_image', 'created', 'live', 'rating', 'number_views', 'screen_ratio',
        'tags', 'keywords'
    ];
    $response = [];
    foreach ($metadata_keys as $key) {
        $value = get_post_meta($post_id, $key, true);
        if (empty($value)) {
            echo "Missing or corrupted data for key: {$key}- playlist-renderer.php - line " . __LINE__ . "\n";
            return new WP_REST_Response("Missing or corrupted data for key: {$key}.", 400);
        }
        $response[$key] = $value;
    }

    // Load the template and pass the data
    echo "Load the template and pass the data - playlist-renderer.php - line " . __LINE__ . "\n";
    ob_start();
    // include(plugin_dir_path(__FILE__) . 'playlist-template.php');
    // template included in 'install.php' file along with all the other files
    $output = ob_get_clean();

    echo "Finished executing function render_playlist - playlist-renderer.php - line " . __LINE__ . "\n";
    
    return new WP_REST_Response($output, 200);
}

// Register the API endpoint
function register_playlist_renderer() {
    echo "Executing function register_playlist_renderer - playlist-renderer.php - line " . __LINE__ . "\n";
    
    register_rest_route('playlist/v1', '/render/(?P<id>\\d+)', array(
        'methods' => 'GET',
        'callback' => 'render_playlist',
    ));
    
    echo "Finished executing function register_playlist_renderer - playlist-renderer.php - line " . __LINE__ . "\n";
}

add_action('rest_api_init', 'register_playlist_renderer');

?>
