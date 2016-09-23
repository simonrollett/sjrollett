<?php get_header();?>

<div class="body col-12 pad-N">

    <h1 class="col-12 page-title page-title-for-bg al-C">

        <img itemprop="logo" class="logo col-4 l-4 col-2-d l-5-d" src="<?php echo $GLOBALS['url_logo_white']; ?>" alt="<?php echo get_bloginfo('name'); ?>"/>

        <a class="page-title-link pad-N col-12" href="<?php echo get_bloginfo('url'); ?>"><?php echo get_bloginfo('name'); ?></a>

    </h1>

    <h2 class="col-12 page-sub-title page-subtitle-for-bg clr-gray-mid text-wide page-subtitle-home al-C">

        <?php echo get_bloginfo('description'); ?>

    </h2>

    <div class="content-2 col-10-ts l-1-ts pad pad-NS-ts">

        <?php include "includes/heading-blocks-1.php";?>

    </div>

</div>

<?php get_footer();?>