<?php
/**

 * Page Template
 * Template Name: TPL child pages depth 1
 * @link http://codex.wordpress.org/Pages
 *
 * @package responsive
 * @subpackage Template
 */

get_header();?>

    <section class="content-1 tpd-content tpd-child-pages-php col-12 col-9-ds">

            <div class="col-12 pad-ESW">
                <h1 class="col-12 title page-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h1>
            </div>

            <div class="col-12 pad-S heading-blocks-numbered">
                <?php

                $args = array(
                    'post_type' => 'page',
                    'post_status' => 'publish',
                    'post_parent' => get_the_ID(),
                    //'orderby' => 'title',
                    'meta_key'          => 'sjr_experience_value',
                    'orderby'           => 'meta_value_num',
                    'order' => 'DESC'
                );

                $query = new WP_Query( $args );

                if ( $query->have_posts() ) {
                    $row_count = 0;

                    while ( $query->have_posts() ) {
                        $query->the_post();
                        $row_count ++;
                        $row_class = "";

                        $counter++;

                        $string = get_the_title();
                        $titleChop = substr($string, 0, 40);

                        $content = get_the_content();
                        $content = strip_tags($content);

                        if($counter % 2 == 0){
                            $cat_class = "CR pad-W-ts";
                        }else{
                            $cat_class = "CL pad-E-ts";
                        }

                        ?>

                        <div class="col-12 col-6-ts pad-S content-item content-item-<?php echo $counter;?> <?php //echo $cat_class;?>">

                            <div class="mgn-EW">
                                <h2 class="col-12 heading-block heading-block-1">
                                    <a class="heading-block-link" href="<?php the_permalink(); ?>">
                                        <?php echo $titleChop; ?>

                                        <?php
                                        $sjr_experience_value = get_post_meta(get_the_ID(), 'sjr_experience_value', true );
                                        //echo $sjr_experience_value;
                                        if($sjr_experience_value !==''){?>

                                            <span class="heading-block-link-caption">
                                                <?php
                                                //$sjr_experience_value = get_post_meta(get_the_ID(), 'sjr_experience_value', true );
                                                echo $sjr_experience_value;
                                                ?>
                                                <span class="heading-block-link-subcaption">
                                                Years
                                                </span>
                                            </span>

                                            <?php }
                                        ?>

                                    </a>
                                </h2>

                                <?php echo substr($content, 0, 90); ?>
                            </div>

                        </div>

                    <?php
                    }
                }else {
                    echo "no results found";
                    // no posts found
                }
                wp_reset_postdata();
                ?>

            </div>

    </section>

    <section class="content-2 col-12 col-3-ds heading-blocks-cta">
        <div class="l-heading-blocks-2">
            <?php include "includes/heading-blocks-1.php";?>
        </div>
    </section>

<?php get_footer();?>