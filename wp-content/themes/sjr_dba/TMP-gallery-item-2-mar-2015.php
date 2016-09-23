<?php
/**

 * Page Template
 * Template Name: TPL gallery item
 * @link http://codex.wordpress.org/Pages
 *
 * @package responsive
 * @subpackage Template
 */

include "header.php";

//secondary nav

    $master_post_id = get_the_ID();
    $master_counter = 0;

    $args3 = array(
        'sort_order' => 'ASC',
        'sort_column' => 'post_title',
        'hierarchical' => 0,
        'include' => '',
        'child_of' => $post->post_parent,
        'parent' => $post->post_parent,
        'number' => '',
        'offset' => 1,
        'post_type' => 'page',
        'post_status' => 'publish'
    );
    $child_pages = get_pages($args3);

    $master_current_page_array_index = 0;

    foreach ($child_pages as $child_page){

        if($master_post_id == $child_pages[$master_counter]->ID){

            $master_current_page_array_index = $master_counter;

        }

        $master_counter++;

    }

    wp_reset_postdata();

?>

    <section class="content-1 col-12 col-10-d">

        <div class="mgn-EW mgn-0-t">

            <article class="col-12 mgn-NS gallery-item" itemscope itemtype="http://schema.org/ImageObject">

            <?php

            $this_page_parent_id = wp_get_post_parent_id( $post_id );

            if ( have_posts() ) : while ( have_posts() ) : the_post();

                ?>

                <?php
                $gallery_class = "col-12";
                if ( has_post_thumbnail() ) {

                    $gallery_class = "col-12 col-5-t col-4-d";
                    ?>

                    <div class="col-12 col-7-t col-8-d FR-t img-gallery-wrapper">
                        <style type="text/css">

                            <?php
                            $string = $post->post_title;
                            $thumb_type = "img-gallery-item";
                            $preview_img_url = responsive_featured_image($string,'thumb');
                            list($width, $height, $type, $attr) = getimagesize($preview_img_url);
                            $padding_height = 100/($width/$height);//20em = 320px
                            ?>

                            .img-responsive-bg{
                                display:block;
                                background-image: url('<?php echo responsive_featured_image($string,'large'); ?>');
                                background-size:100% auto;
                                padding-top:<?php echo $padding_height;?>%
                            }

                            @media only screen and (min-width:75em){
                                .img-responsive-bg{
                                    background-image: url('<?php echo responsive_featured_image($string,'full'); ?>');
                                }
                            }

                        </style>

                        <meta itemprop="contentUrl" content="<?php echo responsive_featured_image($string,'full'); ?>">
                        <meta itemprop="name" content="<?php the_title(); ?>">

                        <span class="img-thumb img-gallery img-responsive-bg img-responsive-bg<?php echo $counter;?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

                        </span>

                        <nav class="nav-secondary gallery-total-count-<?php echo $counter;?>" role="navigation">

                            <div class="col-2 icon icon-menu j-gallery-menu">
                                <span class="icon-text">Menu</span>
                            </div>

                            <?php
                            if($master_current_page_array_index !== 0){?>
                                <a href="<?php echo get_permalink($child_pages[$master_current_page_array_index-1]->ID);?>" class="col-5 icon icon-prev j-gallery-prev">
                                    <span class="icon-text">Prev</span>
                                </a>
                            <?php }
                            ?>

                            <?php
                            if($master_current_page_array_index !== $master_counter-1){?>
                                <a href="<?php echo get_permalink($child_pages[$master_current_page_array_index+1]->ID);?>" class="col-5 icon icon-next FR j-gallery-next">
                                    <span class="icon-text">Next</span>
                                </a>
                            <?php }
                            ?>

                            <div class="col-12 pad gallery-item-extras" id="gallery-item-extras">
                                <div class="pad">Other galleries:</div>
                            </div>
                        </nav>

                    </div>

                <?php }
                ?>

                <div class="<?php echo $gallery_class;?>">
                    <div class="col-2 mgn-N">
                        <span class="icon-number FR">
                            <span class="icon-text">
                                <?php echo $master_current_page_array_index+1;?>
                            </span>
                        </span>
                    </div>
                    <div class="col-10 col-9-t pad-EW">
                        <h1 class="col-12 title has-subtitle">
                            <a href="<?php the_permalink(); ?>" itemprop="name"><?php the_title(); ?></a>
                        </h1>
                        <div itemprop="description" class="col-12 mgn-S gallery-item-content theme-<?php echo get_post_type( $post ); ?>" id="post-<?php the_ID(); ?>">
                            <div class="col-12 pad-S">

                                <div class="img-thumb-copyright">
                                    <span itemprop="creator" itemscope itemtype="http://schema.org/Person">
                                        By: <span itemprop="name"><?php echo $text_my_name; ?></span>,
                                    </span>
                                    <span itemprop="datePublished">
                                    <?php
                                    $datePublished = get_the_date('Y/m/d',$post->ID);
                                    echo $datePublished;
                                    ?>
                                    </span>
                                </div>

                            </div>

                            <?php the_content(); ?>

                        </div>

                        <?php
                        $locations_list = wp_list_categories( array(
                            'taxonomy' => 'media',
                            'orderby' => 'name',
                            'show_count' => 0,
                            'pad_counts' => 0,
                            'hierarchical' => 1,
                            'echo' => 0,
                            'title_li' => ''
                        ) );

                        $has_some_cats = get_the_term_list( $post->ID, 'media', '<li>', ',</li><li>', '</li>' );
                        if ($has_some_cats !== false){
                        ?>

                        <div class="col-12 galley-item-media pad-S">

                            <h3 class="corp-font-2 has-subtitle">Media</h3>
                            <ul class="media-list">
                            <?php
                            $terms = get_the_terms( $post->id, 'media' );

                            foreach ($terms as $term) {
                                $skills_links[1] = $term->name;
                                $skills = join( "</li><li>", $skills_links );

                            ?>
                            <li><?php echo $skills; ?></li>

                            <?php }  ?>
                            </ul>

                        </div>

                        <?php } ?>

                    </div>
                </div>

            <?php endwhile; else: ?>
                <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>

        </article>

    </div>

</section>

<section class="content-2 col-12 col-8-t">
    <nav class="mgn-EW mgn-0-t img-thumb-gallery" id="img-gallery-items-1">

        <?php

        $this_parent_id = wp_get_post_parent_id($master_post_id);
        $global_counter = 0;
        $global_gallery_item_id = 0;
        $current_page_array_index = 0;

        $args = array(
            'post_type' => 'page',
            'post_status' => 'publish',
            'post_parent' => $this_parent_id,
            'offset' => 0,
            'hierarchical' => 1,
            'parent' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
            'paged' => $paged
        );

        $query = new WP_Query( $args );

        while ( $query->have_posts() ) :
            $query->the_post();

            $counter++;
            $global_counter = $counter;

            if($master_post_id == get_the_ID()){
                $gallery_class = "img-thumb-current";
                $current_page_array_index = $counter;
            }else{
                $gallery_class = "";
            }

            $global_gallery_item_id = $gallery_item_id;

            $string = get_the_title();
            $titleChop = substr($string, 0, 40);

            ?>

            <div class="col-3 col-2-t pad-S img-thumb img-thumb-post-id-<?php echo the_ID();?> img-thumb-<?php echo $counter;?> <?php echo $gallery_class;?>" data-count="<?php echo $counter;?>">

                <div class="mgn-ES">
                    <a href="<?php the_permalink(); ?>">
                        <img class="col-12" src="<?php echo responsive_featured_image($string,'thumbnail');?>" alt="View <?php the_title();?>"/>
                    </a>
                </div>
            </div>

        <?php endwhile;

        wp_reset_postdata();

        ?>
    </nav>

</section>

<section class="content-3 col-12 mgn-0-t col-4-t FR-ts col-2-d FR-d" id="action-col">
    <div class="col-12 heading-blocks-gallery-item heading-blocks-cta">
        <?php include "includes/heading-blocks-1.php";?>
    </div>
</section>

<?php include "footer.php";?>