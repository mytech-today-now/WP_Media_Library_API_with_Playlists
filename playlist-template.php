<!-- This is a sample template. You can structure it as per your needs. -->
<div class="playlist">
    <?php
    echo "Checking and displaying post title - playlist-template.php - line " . __LINE__ . "\n";
    
    // Check if $post is set and has the property post_title
    if (isset($post) && property_exists($post, 'post_title')) {
        echo '<h2>' . esc_html($post->post_title) . '</h2>';
    }
    
    echo "Finished checking and displaying post title - playlist-template.php - line " . __LINE__ . "\n";
    
    echo "Checking and displaying thumbnail image and description - playlist-template.php - line " . __LINE__ . "\n";
    
    // Check if $response is set and has the keys 'thumbnail_image' and 'description'
    if (isset($response) && is_array($response)) {
        if (array_key_exists('thumbnail_image', $response)) {
            echo '<img src="' . esc_url($response['thumbnail_image']) . '" alt="Thumbnail">';
        }
        if (array_key_exists('description', $response)) {
            echo '<p>Description: ' . esc_html($response['description']) . '</p>';
        }
    }
    
    echo "Finished checking and displaying thumbnail image and description - playlist-template.php - line " . __LINE__ . "\n";
    ?>
    <!-- Add other fields as needed -->
</div>
