<?php
/**

 * Page Template
 * Template Name: TPL galleries
 * @link http://codex.wordpress.org/Pages
 *
 * @package responsive
 * @subpackage Template
 */

get_header();
?>

    <section class="body col-12 content-type-<?php echo get_post_type( $post ); ?>" id="post-<?php the_ID(); ?>">

        <h1 class="<?php echo $classes_page_title;?>">

            <a class="page-title-link pad pad-0-ts" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

        </h1>

        <div class="col-12 col-8-t pad-ESW pad-S-ts mgn-S <?php //echo $classes_content;?>">

            <?php

            $args = array(
                'post_type' => 'page',
                'post_status' => 'publish',
                'post_parent' => $post->ID,
                'offset' => 0,
                'hierarchical' => 1,
                'parent' => -1,
                'orderby' => 'title',
                'orderby' => 'menu_order',
                'order' => 'ASC'
            );

            $query = new WP_Query( $args );

            if ( $query->have_posts() ) {
                $counter = 0;

                while ( $query->have_posts() ) {
                    $query->the_post();
                    $projects = get_pages( array('sort_column' => 'menu_order', 'sort_order' => 'ASC', 'child_of' => get_the_ID()) );
                    $counter++;
                    //$preview_img_url_small = wp_get_attachment_image_src(get_post_thumbnail_id($projects[0]->ID), array(200, 200), false, '');
                    $preview_img_url_small = wp_get_attachment_image_src(get_post_thumbnail_id($projects[0]->ID), 'medium',false);
                    //$preview_img_url_large = wp_get_attachment_image_src(get_post_thumbnail_id($projects[0]->ID), array(400, 400), false, '');
                    $preview_img_url_large = wp_get_attachment_image_src(get_post_thumbnail_id($projects[0]->ID), 'large', false);

                    $string = get_the_title();
                    $titleChop = substr($string, 0, 40);

                    $description = get_the_content();
                    $description_chop = substr($description,0,90);

                    if($counter % 2 == 0){
                        $cat_class = "fl-R-ts";
                        //$cat_class = "CR pad-W-ts";
                    }else{
                        //$cat_class = "CL pad-E-ts";
                        $cat_class = "cl-L-ts";
                    }

                    ?>

                    <div class="col-12 mgn-S <?php echo $classes_gallery_listing;?>">

                        <article class="col-12 gallery-item gallery-item-<?php echo $counter;?> ">

                            <div class="col-4 col-3-ts">

                                <style type="text/css">

                                    <?php
                                    $string = $post->post_title;
                                    $thumb_type = "post-main";
                                    list($width, $height, $type, $attr) = getimagesize($preview_img_url_large[0]);
                                    //$padding_height = 100/($width/$height);
                                    //$padding_height = "100%";
                                    $padding_height = 99/($width/$height);
                                    //20em = 320px
                                    ?>

                                    .img-responsive-bg<?php echo $counter;?>{
                                        display:block;
                                        background-image: url('<?php echo $preview_img_url_small[0];?>');
                                        background-size:101% auto;
                                        padding-top:<?php echo $padding_height;?>%;
                                    }

                                </style>

                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <span class="img-thumb img-gallery img-responsive-bg img-responsive-bg<?php echo $counter;?>">

                                    </span>
                                </a>
                            </div>

                            <div class="col-8 col-9-ts pad-EW">

                                <h2 class="has-subtitle"><a class="page-sub-title-link" href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>

                                <div class="gallery-item-excerpt gallery-item-content">
                                    <?php echo strip_tags($description_chop);?>...
                                </div>

                            </div>

                        </article>

                    </div>

                <?php
                }
            }else {
                echo "no results found";
            }
            wp_reset_postdata();
            ?>

        </div>

        <div class="<?php echo $classes_col_right;?>">

            <?php include "includes/heading-blocks-1.php";?>

        </div>

    </section>

<?php get_footer();?>