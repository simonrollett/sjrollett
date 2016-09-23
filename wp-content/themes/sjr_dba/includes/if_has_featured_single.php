<?php
if ( has_post_thumbnail() ) {?>

    <div class="col-4 FR mgn-W">
        <style type="text/css">

            <?php
            $string = $post->post_title;
            $thumb_type = "post-main";
            $preview_img_url = responsive_featured_image($string,'thumb');
            list($width, $height, $type, $attr) = getimagesize($preview_img_url);
            $padding_height = 100/($width/$height);
            ?>

            .img-responsive-bg{
                background-image: url('<?php echo responsive_featured_image($string,'thumbnail'); ?>');
                background-size:100% 100%;
                background-position:left top;
                padding-top:66%;
            }

            @media only screen and (min-width:480px){
                .img-responsive-bg{
                    background-image: url('<?php echo responsive_featured_image($string,'medium'); ?>');
                    background-size:auto 100%;
                    padding-top:<?php echo $padding_height;?>%
                }
            }

            @media only screen and (min-width:34em){
                .img-responsive-bg{
                    background-image: url('<?php echo responsive_featured_image($string,'full'); ?>');
                }
            }

        </style>

                        <span class="img-thumb img-page container-bordered img-responsive-bg img-responsive-bg<?php echo $counter;?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <br>
                        </span>
        <div class="pad-W align-right show-ts image-info-wrapper">
            <h3 class="image-title"><?php echo get_post(get_post_thumbnail_id())->post_title; ?></h3>
            <div class="image-description">
                <?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?>
            </div>
        </div>
    </div>


<?php }
?>