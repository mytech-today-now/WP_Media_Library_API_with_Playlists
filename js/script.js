var $ = jQuery.noConflict();

$(document).ready(function() {

    console.log('Plugin Initialized');

    var custom_uploader;

    function handleMediaSelection(targetInput) {
        console.log('Media selected');
        var attachments = custom_uploader.state().get('selection').map(function(attachment) {
            return attachment.toJSON();
        });

        attachments.forEach(function(attachment) {
            console.log('Processing attachment:', attachment.url);
            $(targetInput).val(attachment.url);
        });
    }

    function openMediaLibrary(targetInput) {
        console.log('Opening media library');

        if (custom_uploader) {
            custom_uploader.open();
            return;
        }

        custom_uploader = wp.media({
            title: 'Select Media',
            button: {
                text: 'Select Media'
            },
            multiple: true
        });

        custom_uploader.on('select', function() {
            handleMediaSelection(targetInput);
        });

        custom_uploader.open();
        console.log('Media library dialog opened');
    }

    $(document).on('click', '.open-media-library', function(e) {
        e.preventDefault();
        openMediaLibrary('#target-input');
    });

    console.log('Plugin Ready');
});
