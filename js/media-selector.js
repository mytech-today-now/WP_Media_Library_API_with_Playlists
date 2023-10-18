
jQuery(document).ready(function($) {

    console.log('Plugin Initialized');

    // Open the media library
    function open_media_library(targetInput) {
        console.log('Opening media library');
        var custom_uploader;

        // If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            console.log('Reopening media library dialog');
            custom_uploader.open();
            return;
        }

        // Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Select Media',
            button: {
                text: 'Select Media'
            },
            multiple: true  // Allow the user to select multiple items
        });

        // When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            console.log('Media selected');
            var attachments = custom_uploader.state().get('selection').map(function(attachment) {
                attachment.toJSON();
                return attachment;
            });

            // Loop through selected items and perform your actions (e.g., appending to a list)
            attachments.forEach(function(attachment) {
                console.log('Processing attachment:', attachment.attributes.url);
                // Example: append the attachment URL to an input
                $(targetInput).val(attachment.attributes.url);
                // You might want to store other details, like attachment ID or title, depending on your needs
            });
        });

        // Open the uploader dialog
        custom_uploader.open();
        console.log('Media library dialog opened');
    }

    // Assuming you have a button with class 'open-media-library'
    $(document).on('click', '.open-media-library', function(e) {
        e.preventDefault();
        open_media_library('#target-input');  // '#target-input' is the ID of the input where you want to store the media URL
    });

    console.log('Plugin Ready');
});
