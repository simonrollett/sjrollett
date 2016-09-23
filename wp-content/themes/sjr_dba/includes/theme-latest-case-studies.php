<div class="col-12 tpd-latest-case-studies">

    <?php

    $args = array(
        'post_type' => 'page',
        'post_status' => 'publish',
        'meta_key' => '_wp_page_template',
        'meta_value' => 'TMP-case-study.php',
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => '2'
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
                $cat_class = "CL pad-E";
            }

            ?>

            <div class="col-12 col-6-ts content-item content-item-<?php echo $counter;?> <?php echo $cat_class;?>">

                <?php

                $excerpt_classes = "col-12";

                if (has_post_thumbnail() ) {

                    $excerpt_classes = "col-8 FR";

                    ?>

                    <div class="col-3">
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

        <?php
        }
    }

    wp_reset_postdata();
    ?>


</div>