<?php get_header();?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <section class="body col-12 content-type-<?php echo get_post_type( $post ); ?>" id="post-<?php the_ID(); ?>">

        <h1 class="<?php echo $classes_page_title;?>">

            <a class="page-title-link pad pad-0-ts" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

        </h1>

        <div class="<?php echo $classes_content;?>">

            <?php
            if ( has_post_thumbnail() ) {?>

                <style type="text/css">

                    <?php
                    $string = $post->post_title;
                    $thumb_type = "post-main";
                    $preview_img_url = responsive_featured_image($string,'thumb');
                    list($width, $height, $type, $attr) = getimagesize($preview_img_url);
                    $padding_height = 100/($width/$height);
                    //echo $width . ", " . $height;
                    //var_dump($width);
                    ?>

                    .img-responsive-bg{
                        background-image: url('<?php echo responsive_featured_image($string,'large'); ?>');
                        background-size:100% auto;
                        padding-top:<?php echo $padding_height;?>%
                    }

                    @media only screen and (min-width:34em){

                        .img-responsive-bg{
                            background-image: url('<?php echo responsive_featured_image($string,'full'); ?>');
                        }

                    }

                </style>

                <div class="img-thumb img-page img-responsive-bg img-responsive-bg<?php echo $counter;?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

                </div>

                <div class="pad-W align-right show-ts image-info-wrapper">

                    <h3 class="image-title"><?php echo get_post(get_post_thumbnail_id())->post_title; ?></h3>

                    <div class="image-description">

                        <?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?>

                    </div>

                </div>

            <?php }
            ?>

            <?php the_content();?>

        </div>

        <div class="<?php echo $classes_col_right;?>">

            <?php include "includes/heading-blocks-1.php";?>

        </div>

    </section>

<?php endwhile; else: ?>

    <section class="body col-12 no-posts">

        <p>Sorry, no posts matched your criteria.</p>

    </section>

<?php endif; ?>

<?php get_footer();?>