<?php
/**

 * Page Template
 * Template Name: TPL contact
 * @link http://codex.wordpress.org/Pages
 *
 * @package responsive
 * @subpackage Template
 */

//$email_data = "/_EMAILS/form_sell_motorhome_mandrill_data.php";
//$confirmation_page_slug = "confirmation-motorhome-details";
//require_once(get_template_directory() . '/_RECAPTCHA/recaptchalib.php');
//require_once(get_template_directory() . '/_EMAILS/_captcha_response.php');

get_header();?>

<section class="body col-12 content-type-<?php echo get_post_type( $post ); ?> content-gallery-item-<?php echo $master_current_page_array_index+1;?>" id="post-<?php the_ID(); ?>">

    <h1 class="<?php echo $classes_page_title;?>">

        <a class="page-title-link pad pad-0-ts" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

    </h1>

    <div class="<?php echo $classes_content;?>">

        <!--        start loop-->

        <?php

        if ( have_posts() ) : while ( have_posts() ) : the_post();

        ?>

        <div class="col-12 tpl-contact tpl-<?php echo get_post_type( $post ); ?>" id="post-<?php the_ID(); ?>">

                <?php the_content(); ?>

        </div>

        <?php

        include "includes/form-contact.php";

        ?>

        </div>

        <?php endwhile; else: ?>

            <p><?php $text_no_posts;?></p>

        <?php endif; ?>

        <!--        end loop-->

    </div>

    <div class="<?php echo $classes_col_right;?>">

        <?php include "includes/heading-blocks-1.php";?>

    </div>

    </section>

<?php get_footer();

//include get_template_directory() .  "/includes/form_email_test_data.php";
?>