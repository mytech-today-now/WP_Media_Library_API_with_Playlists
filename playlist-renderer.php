
<?php
function render_playlist($request) {
    // Get the post based on the ID
    $post_id = $request['id'];
    $post = get_post($post_id);

    // Ensure the post is of the 'playlist' type
    if (!$post || $post->post_type !== 'playlist') {
        return new WP_REST_Response("No playlist found with ID {$post_id}.", 404);
    }

    // Extract metadata
    $timing = get_post_meta($post_id, 'timing', true);
    $source_url = get_post_meta($post_id, 'source_url', true);
    $length = get_post_meta($post_id, 'length', true);
    $play_direction = get_post_meta($post_id, 'play_direction', true);
    $credits = get_post_meta($post_id, 'credits', true);
    $description = get_post_meta($post_id, 'description', true);
    $thumbnail_image = get_post_meta($post_id, 'thumbnail_image', true);
    $created = get_post_meta($post_id, 'created', true);
    $live = get_post_meta($post_id, 'live', true);
    $rating = get_post_meta($post_id, 'rating', true);
    $number_views = get_post_meta($post_id, 'number_views', true);
    $screen_ratio = get_post_meta($post_id, 'screen_ratio', true);
    $tags = get_post_meta($post_id, 'tags', true);
    $keywords = get_post_meta($post_id, 'keywords', true);

    // Construct the response
    $response = array(
        'playlist' => array(
            array(
                'timing' => $timing
            )
        ),
        'source_url' => $source_url,
        'length' => $length,
        'play_direction' => $play_direction,
        'credits' => $credits,
        'description' => $description,
        'thumbnail_image' => $thumbnail_image,
        'created' => $created,
        'live' => $live,
        'rating' => $rating,
        'number_views' => $number_views,
        'screen_ratio' => $screen_ratio,
        'tags' => $tags,
        'keywords' => $keywords
    );

    return new WP_REST_Response($response, 200);
}

// Register the API endpoint
function register_playlist_renderer() {
    register_rest_route('playlist/v1', '/render/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'render_playlist',
    ));
}

add_action('rest_api_init', 'register_playlist_renderer');
?>
