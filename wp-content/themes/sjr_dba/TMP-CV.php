<?php
/**

 * Page Template
 * Template Name: TPL CV
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

        <div class="<?php echo $classes_content;?>">

            <?php the_content();?>

            <img class="w-2 l-5" src="<?php echo $GLOBALS['url_logo_black']; ?>" alt=""/>
            <div class="col-12 page-sub-title text-wide al-C">
                Simon Rollett
            </div>

            <blockquote class="col-12">

                lorem ipusm intro quote here

            </blockquote>

            <section class="col-12 sjr-contact">

                <?php // my details

                render_array_string_key_value_classes($array_sjr_profile,$array_sjr_profile_element,$array_sjr_profile_element_item,'','col-6-dl');

                ?>

            </section>

            <section class="col-12 pad-N sjr-employment">

                <h2 class="pad-NS h1-size al-C">Employment</h2>

                <?php // my employment

                $template_url = "tpl-employment-cv.php";

                include "includes/content_loop_employment.php";

                ?>

            </section>

            <section class="col-12 pad-N mgn-S sjr-education">

                <h2 class="pad-NS h1-size al-C">Education</h2>

                <?php // my details

                render_array_string_value_key_classes($array_sjr_education,$array_sjr_education_element,$array_sjr_education_element_item,'Grade','col-6-dl');

                ?>

            </section>

            <section class="col-12 pad-N sjr-education">

                <h2 class="pad-NS h1-size al-C">Technical Experience</h2>

                <?php // my apps

                render_array_string_classes($array_sjr_technical,$array_sjr_technical_element,$array_sjr_technical_element_item,'App','col-4-dl');

                ?>

            </section>

        </div>

        <div class="<?php echo $classes_col_right;?>">

            <?php include "includes/heading-blocks-1.php";?>

        </div>

    </section>

<?php get_footer();?>