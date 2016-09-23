<?php
$page_ID = $post->post_parent;
wp_list_pages('sort_column=menu_order&title_li=&child_of=' . $page_ID);

function getTinyUrl($url) {
    $tinyurl = file_get_contents("http://tinyurl.com/api-create.php?url=".$url);
    return $tinyurl;
}

?>

<?php include "includes/blog-accessories.php";?>