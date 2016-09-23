<?php include "header.php";
sjr_content_start();
?>

<section class="content-1 tpd-content tpd-404-php col-12 col-7-d">

    <div class="col-12 tpd-single tpd-<?php echo get_post_type( $post ); ?>" id="post-<?php the_ID(); ?>">

        <div class="mgn-ESW">

            <div class="col-12 pad-S">
                <h1 class="col-12 title page-title">
                    Sorry, page not found
                </h1>
            </div>

            <p>We cannot find the page you were looking for.
                It may have been moved or deleted.
            </p>

        </div>
    </div>

</section>

<section class="content-2  col-12 col-2-d">
    <div class="mgn-ESW ">
        <ul class="link-list">
            <?php
            $page_ID = $post->post_parent;
            wp_list_pages('sort_column=menu_order&title_li=&child_of=' . $page_ID);
            ?>
        </ul>
    </div>

</section>

<section class="content-3  col-12 col-3-d">
    <div class="l-heading-blocks-2">
        <?php include "includes/heading-blocks-1.php";?>

    </div>
</section>

<?php
sjr_content_end();
include "footer.php";?>