<?php

function sjr_experience_value($post){
    $values = get_post_custom( $post->ID );

    $sjr_experience_value = isset( $values['sjr_experience_value'] ) ? esc_attr( $values['sjr_experience_value'][0] ) : '';
    $sjr_experience_value_lines = isset( $values['sjr_experience_value_lines'] ) ? esc_attr( $values['sjr_experience_value_lines'][0] ) : '';
    //
    $sjr_employment_start = isset( $values['sjr_employment_start'] ) ? esc_attr( $values['sjr_employment_start'][0] ) : '';
    $sjr_employment_start_lines = isset( $values['sjr_employment_start_lines'] ) ? esc_attr( $values['sjr_employment_start_lines'][0] ) : '';
    //
    $sjr_employment_end = isset( $values['sjr_employment_end'] ) ? esc_attr( $values['sjr_employment_end'][0] ) : '';
    $sjr_employment_end_lines = isset( $values['sjr_employment_end_lines'] ) ? esc_attr( $values['sjr_employment_end_lines'][0] ) : '';
    //
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>

<div>
    <label for="sjr_experience_value">Enter value (years, i.e. 1.5):</label>
    <input type="text" name="sjr_experience_value" id="sjr_experience_value" style="width:100%" value="<?php echo stripslashes($sjr_experience_value); ?>">
</div>


<div style="padding-top:20px;">
    <label for="sjr_employment_start">Employment Start date (ddmmyyyy):</label>
    <input type="text" name="sjr_employment_start" id="sjr_employment_start" style="width:100%" value="<?php echo stripslashes($sjr_employment_start); ?>">
</div>


<div style="padding-top:20px;">
    <label for="sjr_employment_end">Employment End date (ddmmyyyy):</label>
    <input type="text" name="sjr_employment_end" id="sjr_employment_end" style="width:100%" value="<?php echo stripslashes($sjr_employment_end); ?>">
</div>

<?php
}

add_action( 'save_post', 'cd_meta_box_save' );

function cd_meta_box_save( $post_id )
{


    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;

    // now we can actually save the data
    $allowed = array(
        'a' => array( // on allow a tags
            'href' => array() // and those anchords can only have href attribute
        )
    );

    // Probably a good idea to make sure your data is set
    if( isset( $_POST['sjr_experience_value'] ) )
    update_post_meta( $post_id, 'sjr_experience_value', wp_slash( $_POST['sjr_experience_value'], $allowed ) );

    if( isset( $_POST['sjr_employment_start'] ) )
    update_post_meta( $post_id, 'sjr_employment_start', wp_slash( $_POST['sjr_employment_start'], $allowed ) );

    if( isset( $_POST['sjr_employment_end'] ) )
    update_post_meta( $post_id, 'sjr_employment_end', wp_slash( $_POST['sjr_employment_end'], $allowed ) );

}
?>