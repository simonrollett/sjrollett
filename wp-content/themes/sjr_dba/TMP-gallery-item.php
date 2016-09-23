<?php get_header();

/**

 * Page Template
 * Template Name: TPL gallery item
 * @link http://codex.wordpress.org/Pages
 *
 * @package responsive
 * @subpackage Template
 */

//secondary nav

    $master_post_id = get_the_ID();
    $master_counter = 0;

    $args3 = array(
        'sort_order' => 'ASC',
        'sort_column' => 'post_title',
        'hierarchical' => 0,
        'include' => '',
        'child_of' => $post->post_parent,
        'parent' => $post->post_parent,
        'number' => '',
        'offset' => 1,
        'post_type' => 'page',
        'post_status' => 'publish'
    );
    $child_pages = get_pages($args3);

    $master_current_page_array_index = 0;

    foreach ($child_pages as $child_page){

        if($master_post_id == $child_pages[$master_counter]->ID){

            $master_current_page_array_index = $master_counter;

        }

        $master_counter++;

    }

    //wp_reset_postdata();

?>

<section class="body col-12 content-type-<?php echo get_post_type( $post ); ?> content-gallery-item-<?php echo $master_current_page_array_index+1;?>" id="post-<?php the_ID(); ?>">

    <h1 class="<?php echo $classes_page_title;?>">

        <a class="page-title-link pad pad-0-ts" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

    </h1>

    <div class="col-12 col-8-t pad-ESW pad-0-ts <?php //echo $classes_content;?> gallery-item-image">

        <style type="text/css">

            <?php
            $string = $post->post_title;
            $thumb_type = "img-gallery-item";
            $preview_img_url = responsive_featured_image($string,'thumb');
            list($width, $height, $type, $attr) = getimagesize($preview_img_url);
            $padding_height = 100/($width/$height);//20em = 320px
            ?>

            .img-responsive-bg{
                display:block;
                background-image: url('<?php echo responsive_featured_image($string,'large'); ?>');
                background-size:100% auto;
                padding-top:<?php echo $padding_height;?>%
            }

            @media only screen and (min-width:75em){
                .img-responsive-bg{
                    background-image: url('<?php echo responsive_featured_image($string,'full'); ?>');
                }
            }

        </style>

        <meta itemprop="image" src="<?php echo responsive_featured_image($string,'full'); ?>">
        <meta itemprop="name" content="<?php the_title(); ?>">

        <span class="img-thumb img-gallery img-responsive-bg img-responsive-bg<?php echo $counter;?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

        </span>

    </div>


    <?php //include "includes/heading-blocks-1.php";?>

    <nav class="gallery-nav col-12 col-3-t fl-R-t pad-S-t">

        <?php
        $this_parent_id = wp_get_post_parent_id($master_post_id);

        $thumbnail_pages = get_pages( array(
                        'post_type' => 'page',
                        'post_status' => 'publish',
                        //'post_parent' => $this_parent_id,
                        'offset' => 0,
                        'hierarchical' => 1,
                        'parent' => $this_parent_id,
                        'orderby' => 'title',
                        'order' => 'ASC',
                        'paged' => $paged
                    ));
                    $nav_item_width_counter = count($thumbnail_pages);
        ;?>

        <div class="col-12 gallery-nav-indicator" style="padding:.5em;">
            <div class="gallery-nav-indicator-mark bg-white" style="line-height:0.5em;font-size:0.5em;width:<?php echo 100/$nav_item_width_counter;?>%">&nbsp;</div>
        </div>

        <div class="col-2 col-6-t">

            <?php
            // prev link
            if($master_current_page_array_index !== 0){

                include "includes/link-prev-yes.php";

            }else{

                include "includes/link-prev-no.php";

            };?>

        </div>

        <div class="col-2 col-6-t fl-R">

            <?php
            if($master_current_page_array_index !== $master_counter-1){

                include "includes/link-next-yes.php";

            }else{

                include "includes/link-next-no.php";

            }
            ?>

        </div>

        <div class="col-8 col-12-t gallery-nav-outer pad-N-t">



            <?php

            //$nav_width_counter = 0;
            $global_counter = 0;
            $global_gallery_item_id = 0;
            $current_page_array_index = 0;

            $args = array(
                'post_type' => 'page',
                'post_status' => 'publish',
                'post_parent' => $this_parent_id,
                'offset' => 0,
                'hierarchical' => 1,
                'parent' => -1,
                'orderby' => 'title',
                'order' => 'ASC',
                'paged' => $paged
            );

            $query = new WP_Query( $args );



            //var_dump($thumbnail_pages);

            //echo $nav_item_width_counter;

            $nav_item_width = 4;

            //wp_reset_postdata();


            ?>

            <nav class="fl-L gallery-nav-inner" style="width:<?php echo $nav_item_width_counter * $nav_item_width;?>em;">

                <?php

                while ( $query->have_posts() ) :

                    $query->the_post();

                    $counter++;
                    $global_counter = $counter;

                    if($master_post_id == get_the_ID()){
                        $gallery_class = "img-thumb-current";
                        $current_page_array_index = $counter;
                    }else{
                        $gallery_class = "";
                    }

                    $global_gallery_item_id = $gallery_item_id;

                    $string = get_the_title();
                    $titleChop = substr($string, 0, 40);
                    // col-3 col-4-t

                    ?>

                    <a href="<?php the_permalink(); ?>" style="width:<?php echo $nav_item_width;?>em;" class="fl-L img-thumb img-thumb-post-id-<?php echo the_ID();?> img-thumb-<?php echo $counter;?> <?php echo $gallery_class;?>" data-count="<?php echo $counter;?>">

                        <img class="gallery-nav-inner-img col-12" src="<?php echo responsive_featured_image($string,'thumbnail');?>" alt="View <?php the_title();?>"/>

                    </a>

                <?php endwhile;

                wp_reset_postdata();

                ?>

            </nav>

        </div>

    </nav>

    <div class="bg-f6f pad-ESW col-12 col-8-t">

        <?php the_content(); ?>

    </div>

    <div class="bg-333 pad col-12 col-8-t clr-gray-mid">
        <div class="fl-L page-sub-title" itemprop="creator" itemscope itemtype="http://schema.org/Person">
            <span itemprop="name"><?php echo $text_my_name; ?></span>
        </div>
        <div class="fl-R page-sub-title" itemprop="datePublished">
            <?php
            $datePublished = get_the_date('Y/m/d',$post->ID);
            echo $datePublished;
            ?>
        </div>
    </div>

    <?php
    $locations_list = wp_list_categories( array(
        'taxonomy' => 'media',
        'orderby' => 'name',
        'show_count' => 0,
        'pad_counts' => 0,
        'hierarchical' => 1,
        'echo' => 0,
        'title_li' => ''
    ) );

    $has_some_cats = get_the_term_list( $post->ID, 'media', '<li>', ',</li><li>', '</li>' );
    if ($has_some_cats !== false){
    ?>

    <div class="col-12 galley-item-media pad-S">

        <h3 class="corp-font-2 has-subtitle">Media</h3>

        <ul class="media-list">
            <?php
            $terms = get_the_terms( $post->id, 'media' );

            foreach ($terms as $term) {
                $skills_links[1] = $term->name;
                $skills = join( "</li><li>", $skills_links );

                ?>
                <li><?php echo $skills; ?></li>

            <?php }  ?>
        </ul>

    </div>

    <?php } ?>

</section>

<?php get_footer();?>