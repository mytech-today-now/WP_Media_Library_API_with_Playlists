<!-- This is a sample template. You can structure it as per your needs. -->
<div class="playlist">
    <h2><?php echo esc_html($post->post_title); ?></h2>
    <img src="<?php echo esc_url($response['thumbnail_image']); ?>" alt="Thumbnail">
    <p>Description: <?php echo esc_html($response['description']); ?></p>
    <!-- Add other fields as needed -->
</div>
