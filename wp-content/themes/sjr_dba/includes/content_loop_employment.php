<?php

$array_employment_page_id = get_page_by_title("Employment History")->ID;

$args = array(
    'post_type' => 'page',
    'post_status' => 'publish',
    //'post_parent' => get_the_ID(),
    'post_parent' => $array_employment_page_id,
    //'orderby' => 'title',
    'meta_key'          => 'sjr_employment_start',
    'orderby'           => 'meta_value_num',
    'order' => 'DESC',
    'post__not_in' => array(
        $array_employment_page_id
    )
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) {

    $row_count = 0;

    $list_classes = "bg-white mgn-S col-11 col-10 ts";

    while ( $query->have_posts() ) {

        $query->the_post();
        $row_count ++;
        //$row_class = "";

        $counter++;

        $string = get_the_title();
        $titleChop = substr($string, 0, 40);

        $content = get_the_content();
        $content = strip_tags($content);

        if($counter % 2 == 0){

            $list_classes_additional = "fl-R";

        }else{

            $list_classes_additional = "";

        };

        $sjr_employment_start = get_post_meta(get_the_ID(), 'sjr_employment_start', true );
        $sjr_employment_end = get_post_meta(get_the_ID(), 'sjr_employment_end', true );

        $date_start_int = $sjr_employment_start;

        $day1 = substr($date_start_int,0,2);
        $month1 = substr($date_start_int,2,2);
        $year1 = substr($date_start_int,4,4);

        $date = $day1.'/'.$month1.'/'.$year1;
        //echo $date;
        //include "includes/tpl-employment-timeline.php";
        include $template_url;
        ?>

    <?php
    }
}else {
    echo "no employment results found";
    // no posts found
}
wp_reset_postdata();
?>