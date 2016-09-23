<?php

function get_permalink_by_title($title){
    return get_permalink(get_page_by_title($title)->ID);
}

$text_string_appendix = ":";

$url_base = get_bloginfo('url');
$url_theme_dir = get_template_directory_uri();
$url_theme_dir_images = $url_theme_dir . "/images/";
$url_contact = get_permalink_by_title("Contact");

$url_server_doc_root_theme_dir = $_SERVER['DOCUMENT_ROOT'] . "/sjrollett/wp-content/themes/sjr_dba/";

//images
    $url_logo_white = $url_theme_dir_images . "logo_sjr_i.png";
    $url_logo_black = $url_theme_dir_images . "logo_sjr.png";

    $url_me_suit_1 = $url_theme_dir_images .  "me-suit-1.jpg";

//texts

    $text_more = "Read more";
    $text_my_name = "Simon Rollett";
    $text_no_posts = "Sorry, no posts matched your criteria.";

	function arphabet_widgets_init() {
	
		register_sidebar( array(
			'name' => 'Logo Bar Basket',
			'id' => 'mdl-widget-top',
			'before_widget' => '<div class="widget-basket-wrapper %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title header-gray">',
			'after_title' => '</h2>',
		) );
		
		register_sidebar( array(//single case study
			'name' => 'RIGHT COL',
			'id' => 'right-col-widgets',
			'before_widget' => '<div class="widget %2$s"><div class="widget-inner" id="%1$s">',
			'after_widget' => '</div></div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		) );
		
	}
	add_action( 'widgets_init', 'arphabet_widgets_init' );



	add_theme_support( 'post-thumbnails' );

// add menus
	function register_my_menus() {
	  register_nav_menus(
		array(
		  'menu-main' => __( 'Top navigation' ),
		  'links-main' => __( 'Main Product Links' )
		)
	  );
	}
	add_action( 'init', 'register_my_menus' );


	
	// appends menu label title to nav
		add_filter('walker_nav_menu_start_el', 'description_in_nav_el', 10, 4);
		function description_in_nav_el($item_output, $item, $depth, $args)
		{
			return preg_replace('/(<a.*?>[^<]*?)</', '$1' . "<small>{$item->attr_title}</small><", $item_output);
		}
		add_theme_support( 'menus' );




// Get featured image

    //thumbnail
    //medium
    //large
    //full
    // eg: responsive_featured_image('Studio', large)
    function responsive_featured_image($pageByTitle,$imageSize){
        $the_post_id = get_page_by_title($pageByTitle)->ID;
        $post_thumbnail_id = get_post_thumbnail_id($the_post_id);
        $image_attributes = wp_get_attachment_image_src( $post_thumbnail_id, $imageSize);
        return $image_attributes[0];
    }
		
function menu_set_dropdown( $sorted_menu_items, $args ) {
    $last_top = 0;
    foreach ( $sorted_menu_items as $key => $obj ) {
        // it is a top lv item?
        if ( 0 == $obj->menu_item_parent ) {
            // set the key of the parent
            $last_top = $key;
        } else {
            $sorted_menu_items[$last_top]->classes['dropdown'] = 'dropdown';
        }
    }
    return $sorted_menu_items;
}
add_filter( 'wp_nav_menu_objects', 'menu_set_dropdown', 10, 3 );

// vars

$classes_page_title = "page-title col-12 pad-S mgn-S-ts";
$classes_content = "content col-12 col-8-t col-9-d pad mgn-S";
$classes_col_right = "col-12 col-3-t col-2-d fl-R-t pad-EW pad-0-ts";
$classes_gallery_listing = "pad-S";//bg-white pad
$classes_prev_next_col = "col-12 al-C";//bg-white pad
$classes_prev_next_sub = "show-t";


// function to render array into template 1

    function render_array_string_value_key_classes($array_name,$array_name_element,$array_name_element_item,$key_1_string,$value_key_classes){

        foreach($array_name as $array_name_element => $array_name_element_item){?>

            <div class="col-12 pad-NS brdr-S-d <?php if(isset($value_key_classes)){echo $value_key_classes;};?>">
                <div class="col-12 col-4-ts al-R-ts col-3-d"><span class="page-sub-title"><?php echo $key_1_string;?></span> <?php echo $array_name_element_item;?><?php echo $GLOBALS['text_string_appendix'];?></div>
                <strong class="col-12 col-8-ts col-9-d pad-W-ts"><?php echo $array_name_element;?></strong>
            </div>

        <?php }
        unset($array_name_item);
    }

    function render_array_string_key_value_classes($array_name,$array_name_element,$array_name_element_item,$key_1_string,$key_value_classes){

        foreach($array_name as $array_name_element => $array_name_element_item){?>

            <div class="col-12 pad-NS brdr-S-d <?php if(isset($key_value_classes)){echo $key_value_classes;};?>">
                <div class="col-12 col-4-ts al-R-ts col-3-d"><span class="page-sub-title"><?php echo $key_1_string;?></span> <?php echo $array_name_element;?><?php echo $GLOBALS['text_string_appendix'];?></div>
                <strong class="col-12 col-8-ts col-9-d pad-W-ts"><?php echo $array_name_element_item;?></strong>
            </div>

        <?php }
        unset($array_name_item);
    }


    function render_array_string_classes($array_name,$array_name_element,$array_name_element_item,$key_1_string,$string_classes){

        foreach($array_name as $array_name_element => $array_name_element_item){?>

            <div class="col-6 pad-NS brdr-S-d <?php if(isset($string_classes)){echo $string_classes;};?>">

                <strong class="col-12 pad-W-ts"><?php echo $array_name_element_item;?></strong>

            </div>

        <?php }
        unset($array_name_item);
    }



//
//add_filter('the_content', 'removeEmptyParagraphs',99999);

//not there:
// http://localhost/sjrollett/wp-content/themes/sjr_dba/theme-CMS/test.php

//there
// /Applications/MAMP/htdocs/sjrollett/wp-content/themes/sjr_dba/theme-CMS/test.php


//include $url_server_doc_root_theme_dir . "theme-CMS/test.php";
include "theme-CMS/SJR_experience_CMS.php";
include "theme-CMS/SJR_experience_CMS_actions.php";
include "includes/_array_sjr_profile.php";
include "includes/_array_sjr_education.php";
include "includes/_array_sjr_technical.php";
//include "theme-CMS/test.php";
//include get_bloginfo('template_url') . "/theme-CMS/test.php";
//include "theme-CMS/_login_customise.php";
//include $url_theme_dir . "/theme-CMS/_contact_information_CMS.php";
//include $url_theme_dir . "/theme-CMS/_gallery_taxonomy_CMS.php";
//include $url_theme_dir . "/theme-CMS/SJR_experience_CMS.php";
//include "/theme-CMS/SJR_experience_CMS.php";
//include $url_theme_dir . "/theme-CMS/SJR_experience_CMS_actions.php";
//echo $_SERVER['DOCUMENT_ROOT'];// = '/Applications/MAMP/htdocs'

?>