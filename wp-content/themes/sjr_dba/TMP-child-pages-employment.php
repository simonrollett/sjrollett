<?php
/**

 * Page Template
 * Template Name: TPL child pages employment
 * @link http://codex.wordpress.org/Pages
 *
 * @package responsive
 * @subpackage Template
 */

get_header();?>

    <section class="body col-12 content-type-<?php echo get_post_type( $post ); ?>" id="post-<?php the_ID(); ?>">

        <h1 class="<?php echo $classes_page_title;?>">

            <a class="page-title-link pad pad-0-ts" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

        </h1>

        <div class="col-12 col-8-t pad-EW pad-NS-ts mgn-S <?php //echo $classes_content;?>">

            <div class="col-6 mgn-N timeline">

                <div class="l-6 w-12 bg-white al-C page-sub-title">
                    Present day
                </div>

                <?php

                $template_url = "tpl-employment-timeline.php";

                include "includes/content_loop_employment.php";

                ?>

            </div>

        </div>

        <div class="<?php echo $classes_col_right;?>" data-id="Employment History<?php echo $array_employment_page_id;?>">

            <?php include "includes/heading-blocks-1.php";?>

        </div>

    </section>

<?php get_footer();?>