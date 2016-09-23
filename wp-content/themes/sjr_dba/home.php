<?php
/**

 * Page Template
 * Template Name: TPL Blog home
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a page ('page' post_type) unless another page template overrules this one.
 * @link http://codex.wordpress.org/Pages
 *
 * @package responsive
 * @subpackage Template
 */
//get_header();
include "header.php";
//$currentdir = dirname(__FILE__);
//include $currentdir . $GLOBALS['file_responsive_images'];

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$wp_query->query('orderby=date&order=DESC&cat='.$category_id.'&paged='.$paged );
$home_query = $wp_query;

?>

<section class="content-1 col-12 col-8-ds">

    <div class="col-12">

        <div class="pad-EW col-12">
            <h1 class="title page-title">
                <?php the_title();?>
            </h1>
        </div>

        <?php include "includes/navigation-posts-multiple.php";?>

        <div class="col-12">
            <?php
            //include "includes/sjr-variables.php";
            $counter = 0;
            if ( have_posts() ) : while ( have_posts() ) : the_post();

                $counter++;

                $content = get_the_content();
                $content = strip_tags($content);
                $string = $post->post_title;
                $titleChop = substr($string, 0, 17);
                //$post_thumbnail_id = $post->ID;
                //$image_attributes = wp_get_attachment_image_src($post_thumbnail_id, 'thumbnail');

                $thumb_type = "post-list";
                ?>

                <div class="col-12 content-item content-item-<?php echo $counter;?>" id="post-<?php the_ID(); ?>">

                    <?php

                    $excerpt_classes = "col-12";

                    if (has_post_thumbnail() ) {

                        $excerpt_classes = "col-8 col-9-d FR";

                        ?>

                        <div class="col-3 col-2-d">
                            <a class="image-wrapper image-clickable" href="<?php the_permalink(); ?>">
                                <img class="thumb-image" src="<?php echo responsive_featured_image($string,'thumbnail'); ?>" alt="<?php the_title(); ?>"/>
                            </a>
                        </div>

                    <?php };
                    ?>
                    <div class="<?php echo $excerpt_classes;?> mgn-S">
                        <h4 class="content-item-title"><a href="<?php the_permalink(); ?>"><?php echo $titleChop; ?></a></h4>
                        <div class="content-item-extract">
                            <?php echo substr($content, 0, 130); ?>...<br>
                            <a class="link-more" href="<?php the_permalink(); ?>"><?php echo $text_more; ?></a>
                        </div>
                    </div>

                </div>

            <?php endwhile; else: ?>
                <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>

            <!-- end loop -->
            <div class="navigation post-navigation post-navigation-after"><?php posts_nav_link(); ?></div>
        </div>

        <?php include "includes/navigation-posts-multiple.php";?>

    </div>

</section>

<section class="content-3 col-4-ds col-3-d FR-ds heading-blocks-cta">

    <?php include "includes/heading-blocks-1.php";?>

    <?php include "includes/blog-accessories.php";?>

    <?php
    if ( dynamic_sidebar('right-col-widgets') ) :
    else :
        ?>
    <?php endif; ?>

</section>

<?php get_footer(); ?>