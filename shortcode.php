<?php

function render_playlist_shortcode($atts) {
    echo "Executing function render_playlist_shortcode - shortcode.php - line " . __LINE__ . "\n";
    
    // Extract attributes from the shortcode
    $attributes = shortcode_atts(array(
        'id' => '0',
    ), $atts);

    // Sanitize and validate the attributes
    echo "Sanitizing and validating attributes - shortcode.php - line " . __LINE__ . "\n";
    $post_id = intval(sanitize_text_field($attributes['id']));
    if (!is_valid_playlist($post_id)) {
        echo "Invalid playlist ID detected - shortcode.php - line " . __LINE__ . "\n";
        return "<p>Invalid playlist ID.</p>";
    }

    // Fetch the playlist data using a dedicated function
    echo "Fetching playlist data - shortcode.php - line " . __LINE__ . "\n";
    $data = get_playlist_data($post_id);
    
    // If no data is returned, display an error message
    if (!$data) {
        echo "Failed to fetch playlist data - shortcode.php - line " . __LINE__ . "\n";
        return "<p>Failed to fetch playlist data.</p>";
    }

    // Convert the data to a JSON string for display
    echo "Converting data to JSON string - shortcode.php - line " . __LINE__ . "\n";
    $json_data = json_encode($data, JSON_PRETTY_PRINT);

    // Return the data wrapped in a <pre> tag for nice formatting
    echo "Returning formatted data - shortcode.php - line " . __LINE__ . "\n";
    return "<pre>{$json_data}</pre>";
}

// Helper function to fetch playlist data
function get_playlist_data($post_id) {
    echo "Executing function get_playlist_data - shortcode.php - line " . __LINE__ . "\n";
    
    // Use WordPress functions to fetch post data
    $post = get_post($post_id);

    // Validate the post type and other conditions
    if (!$post || $post->post_type !== 'playlist') {
        echo "Invalid post type detected - shortcode.php - line " . __LINE__ . "\n";
        return false;
    }

    // Fetch associated meta data or other related data if necessary
    // Placeholder for additional data fetching
    echo "Returning post data - shortcode.php - line " . __LINE__ . "\n";
    return $post;
}

// Register the shortcode
echo "Registering shortcode - shortcode.php - line " . __LINE__ . "\n";
add_shortcode('playlist_embed', 'render_playlist_shortcode');

?>
