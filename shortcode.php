<?php

function render_playlist_shortcode($atts) {
    // Extract attributes from the shortcode
    $attributes = shortcode_atts(array(
        'id' => '0',
    ), $atts);

    // Sanitize the attributes
    $post_id = intval(sanitize_text_field($attributes['id']));
    if (!is_valid_playlist($post_id)) {
        return "<p>Invalid playlist ID.</p>";
    }

    // Fetch the playlist data. For simplicity, I'm calling our earlier function.
    // You might want to refactor and make a dedicated function for this.
    $data = render_playlist(array('id' => $post_id));
    
    // Convert the data to a JSON string for display
    $json_data = json_encode($data->data, JSON_PRETTY_PRINT);

    // Return the data wrapped in a <pre> tag for nice formatting
    return "<pre>{$json_data}</pre>";
}

// Register the shortcode
add_shortcode('playlist_embed', 'render_playlist_shortcode');

?>
