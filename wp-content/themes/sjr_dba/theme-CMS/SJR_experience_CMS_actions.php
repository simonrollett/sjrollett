<?php

function sjr_EXPERIENCE_meta_box_add(){
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;

    add_meta_box( 'sjr_experience_edit', 'SJR experience value', 'sjr_experience_value', 'page', 'normal', 'default' );

    add_action( 'admin_init', 'wps_remove_visual', 15 );

}

add_action( 'add_meta_boxes', 'sjr_EXPERIENCE_meta_box_add' );

?>