<?php

function render_playlist_shortcode($atts) {
    // Extract attributes from the shortcode
    $attributes = shortcode_atts(array(
        'id' => '0',
    ), $atts);

    // Sanitize and validate the attributes
    $post_id = intval(sanitize_text_field($attributes['id']));
    if (!is_valid_playlist($post_id)) {
        return "<p>Invalid playlist ID.</p>";
    }

    // Fetch the playlist data using a dedicated function
    $data = get_playlist_data($post_id);
    
    // If no data is returned, display an error message
    if (!$data) {
        return "<p>Failed to fetch playlist data.</p>";
    }

    // Convert the data to a JSON string for display
    $json_data = json_encode($data, JSON_PRETTY_PRINT);

    // Return the data wrapped in a <pre> tag for nice formatting
    return "<pre>{$json_data}</pre>";
}

// Helper function to fetch playlist data
function get_playlist_data($post_id) {
    // Use WordPress functions to fetch post data
    $post = get_post($post_id);

    // Validate the post type and other conditions
    if (!$post || $post->post_type !== 'playlist') {
        return false;
    }

    // Fetch associated meta data or other related data if necessary
    // Placeholder for additional data fetching

    return $post;
}

// Register the shortcode
add_shortcode('playlist_embed', 'render_playlist_shortcode');

?>
