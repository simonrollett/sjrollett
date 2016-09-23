<?php
/**

 * Page Template
 * Template Name: MJ CATEGORY
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a page ('page' post_type) unless another page template overrules this one.
 * @link http://codex.wordpress.org/Pages
 *
 * @package responsive
 * @subpackage Template
 */
include "header.php";
sjr_content_start();
$currentdir = dirname(__FILE__);
include $currentdir . $GLOBALS['file_responsive_images'];
//

?>

    <div class="page-main col-12 float-anchor sjr-category">

        <div class="col-12 col-9-t primary">

            <div class="pad-EW">
                <h1 class="title page-title">
                    <?php single_cat_title(); ?>
                </h1>
            </div>

            <div class="navigation post-navigation post-navigation-before"><?php posts_nav_link(); ?></div>

            <?php
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                $string = get_the_title();
                ?>

                <div class="media col-12" id="post-<?php the_ID(); ?>">
                    <div class="pad-EW media-img-wrapper col-3 col-2-d">
                        <h2 class="media-heading">
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                                <img class="media-image col-12" src="<?php responsive_featured_image($string,'thumbnail'); ?>" alt="<?php the_title(); ?>">
                            </a>
                        </h2>
                    </div>
                    <div class="pad-EW media-excerpt-wrapper col-9 col-10-d">
                        <h3 class="media-heading"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?>...</a></h3>
                        <div class="media-subheading"><?php the_date(); ?></div>
                <span class='media-para'>
                <?php $content = get_the_content();
                $content = strip_tags($content);
                echo substr($content, 0, 130);
                ?>...
                    <a href="<?php the_permalink() ?>" class="link" rel="bookmark">more</a>
                </span>

                    </div>
                </div>

            <?php endwhile; else: ?>
                <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>

            <!-- end loop -->
            <div class="navigation post-navigation post-navigation-after"><?php posts_nav_link(); ?></div>

        </div>

        <div class="col-12 col-3-t secondary">

            <div class="widget-wrapper <?php echo $GLOBALS['cart_classes'];?>" id="<?php echo $GLOBALS['cart_anchor_id'];?>">
                <?php
                if ( dynamic_sidebar('right-col-widgets') ) :
                else :
                    ?>
                <?php endif; ?>
            </div>

            <?php include "includes/blog-accessories.php";?>

            <div class="mgn-NEW">
                <h2 class="title"><a class="link" href="<?php echo home_url(); ?>/blog"><?php echo $GLOBALS['under_widgets_text'];?></a></h2>
            </div>

            <?php include "includes/media-latest-posts.php";?>

        </div>

    </div>

<?php
sjr_content_end();
include "footer.php";?>