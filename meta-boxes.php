<?php

function pilgrim_meta_boxes() {


	add_meta_box(
		'recording-upload',
		__( 'Recording File', 'pilgrim' ),
		'recording_upload_meta_box',
		'recording'
	);

}
add_action( 'add_meta_boxes', 'pilgrim_meta_boxes' );


function recording_upload_meta_box( $post ) {

	wp_nonce_field( 'myplugin_save_meta_box_data', 'myplugin_meta_box_nonce' );

	wp_nonce_field( basename( __FILE__ ), 'pilgrim_nonce' );

	$value = get_post_meta( $post->ID, 'recording-url', true );

	ob_start(); ?>

	<p>
    <label for="recording-url" class="pilgrim-row-title"><?php _e( 'Recording File', 'pilgrim' )?></label>
    <input type="text" name="recording-url" id="recording-url" value="<?php if ( isset ( $value ) ) echo $value; ?>" />
    <input type="button" id="recording-url-button" class="button" value="<?php _e( 'Choose or Upload an File', 'pilgrim' )?>" />
	</p>

    <script type="text/javascript">
    jQuery(document).ready(function($){
      $('#recording-url-button').click(function(e){
      var send_attachment_bkp = wp.media.editor.send.attachment;
      var button = $(this);
      wp.media.editor.send.attachment = function(props, attachment){
        $("#recording-url").val(attachment.url);
        wp.media.editor.send.attachment = send_attachment_bkp;
      }

      wp.media.editor.open(button);
      return false;

      });
    });
    </script>

	<?php echo ob_get_clean();
}

function pilgrim_file_enqueue() {
    global $typenow;
    if( $typenow == 'post' ) {
        wp_enqueue_media();

        wp_register_script( 'meta-box-file', plugin_dir_url( __FILE__ ) . 'meta-box-file.js', array( 'jquery' ) );
        wp_localize_script( 'meta-box-file', 'meta_file',
            array(
                'title' => __( 'Choose or Upload a File', 'pilgrim' ),
                'button' => __( 'Use this file', 'pilgrim' ),
            )
        );
        wp_enqueue_script( 'meta-box-file' );
    }
}
add_action( 'admin_enqueue_scripts', 'pilgrim_file_enqueue' );


function pilgrim_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'pilgrim_nonce' ] ) && wp_verify_nonce( $_POST[ 'pilgrim_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'recording-url' ] ) ) {
	    update_post_meta( $post_id, 'recording-url', $_POST[ 'recording-url' ] );
	}

}
add_action( 'save_post', 'pilgrim_meta_save' );

 ?>