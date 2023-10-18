<?php

function render_playlist($request) {
    // Get the post based on the ID
    $post_id = $request['id'];
    $post = get_post($post_id);

    // Ensure the post is of the 'playlist' type
    if (!$post || $post->post_type !== 'playlist') {
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
            return new WP_REST_Response("Missing or corrupted data for key: {$key}.", 400);
        }
        $response[$key] = $value;
    }

    // Load the template and pass the data
    ob_start();
    include(plugin_dir_path(__FILE__) . 'playlist-template.php');
    $output = ob_get_clean();

    return new WP_REST_Response($output, 200);
}

// Register the API endpoint
function register_playlist_renderer() {
    register_rest_route('playlist/v1', '/render/(?P<id>\\d+)', array(
        'methods' => 'GET',
        'callback' => 'render_playlist',
    ));
}

add_action('rest_api_init', 'register_playlist_renderer');

?>
