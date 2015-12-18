/*
 * Attaches the file uploader to the input field
 */
jQuery(document).ready(function($){

    // Instantiates the variable that holds the media library frame.
    var meta_file_frame;

    // Runs when the image button is clicked.
    $('#recording-url-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( meta_file_frame ) {
            meta_file_frame.open();
            return;
        }

        // Sets up the media library frame
        meta_file_frame = wp.media.frames.meta_file_frame = wp.media({
            title: meta_file.title,
            button: { text:  meta_file.button }
        });

        // Runs when an file is selected.
        meta_file_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = meta_file_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom file input field.
            $('#recording-url').val(media_attachment.url);
        });

        // Opens the media library frame.
        meta_file_frame.open();
    });
});