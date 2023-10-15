
<?php
// Registering the Custom Post Type
function register_playlist_post_type() {
    $labels = array(
        'name'               => _x( 'Playlists', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Playlist', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Playlists', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Playlist', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Add New', 'playlist', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Add New Playlist', 'your-plugin-textdomain' ),
        'new_item'           => __( 'New Playlist', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Edit Playlist', 'your-plugin-textdomain' ),
        'view_item'          => __( 'View Playlist', 'your-plugin-textdomain' ),
        'all_items'          => __( 'All Playlists', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Search Playlists', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Parent Playlists:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'No playlists found.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'No playlists found in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'A custom post type for playlists', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'playlist' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
    );

    register_post_type( 'playlist', $args );
}

add_action( 'init', 'register_playlist_post_type' );

// You can add taxonomies here if needed in the future.
?>
