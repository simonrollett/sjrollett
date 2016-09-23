<?php
// breadcrumb separator
$nav_breadcrumb_separator = "<span class='nav_crumb nav_crumb_separator'>/</span>";
$nav_url_site_root = get_bloginfo('url');

?>
<?php

// get current url
$nav_current_url_without_root = str_replace($nav_url_site_root,"",get_permalink());
$nav_current_url_array = explode("/", $nav_current_url_without_root);

// remove empty array nodes at start and finish of current url
unset($nav_current_url_array[0]);
$array_length_count = count($nav_current_url_array);
unset($nav_current_url_array[$array_length_count]);
$array_length_count = count($nav_current_url_array);
//
$current_chunk_count = 1;
$nav_last_looped_url = $nav_url_site_root . "/";
//

foreach($nav_current_url_array as $nav_current_url_chunk){

    // if last link then append last css class and strip last separator
    if($current_chunk_count == $array_length_count){
        $nav_crumb_last = 'nav_crumb_disabled';
        $nav_breadcrumb_separator = '';
    }

    // append each url chunk to the last one


    $nav_last_looped_url .= $nav_current_url_array[$current_chunk_count] . "/";

    //var_dump($nav_last_looped_url) . ;

    // get page by path to return page title for crumb text output
    $get_last_looped_url_page = str_replace($nav_url_site_root,"",$nav_last_looped_url);
    $get_last_looped_url_page = get_page_by_path($get_last_looped_url_page);

    // NB If the wp admin > settings > permalink > custom structure is like this:
    // /insurance-blog/%category%/%postname%/
    // the most recent post name will be at the end of the breadcrumb EVEN on a category page.

    if($get_last_looped_url_page->post_title){
        $nav_crumb_text = $get_last_looped_url_page->post_title;// output post title for crumb text
    }else{
        $nav_crumb_text = $nav_current_url_chunk;// output post slug for crumb text
    }?>
    <li class="nav_crumb_item" style="padding:0;margin:0;"><a class='nav_crumb <?php echo $nav_crumb_last;?>' href="<?php echo $nav_last_looped_url;?>" itemprop="item"><span itemprop="name"><?php echo $nav_crumb_text;?></span></a><?php echo $nav_breadcrumb_separator;?></li>

    <?php

    $current_chunk_count ++;

}

?>