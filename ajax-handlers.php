<?php

// AJAX handler to fetch more media items
function fetch_more_media_items() {
    // Verify nonce for security
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'fetch_more_media_nonce')) {
        wp_send_json_error('Nonce verification failed.');
        exit;
    }

    // Get the offset from the AJAX request (how many items to skip)
    $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;

    // Define the query arguments
    $args = array(
        'post_type'      => 'attachment',
        'post_status'    => 'inherit',
        'post_mime_type' => 'image', // If you want to fetch only images
        'posts_per_page' => 10,      // Number of items to fetch
        'offset'         => $offset, // Skip already fetched items
    );

    // Fetch the attachments
    $attachments = get_posts($args);

    // Return the data as JSON
    wp_send_json($attachments);
}

// Register the AJAX action
add_action('wp_ajax_fetch_more_media', 'fetch_more_media_items');        // If user is logged in
add_action('wp_ajax_nopriv_fetch_more_media', 'fetch_more_media_items'); // If user is not logged in

?>
