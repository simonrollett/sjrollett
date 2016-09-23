<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo get_bloginfo('name') . ": " . get_the_title(); ?></title>
    <meta name="author" content="<?php echo get_bloginfo('name');?>"/>
    <meta name="keywords" content="<?php echo get_bloginfo('name'); ?>:" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="robots" content="all, index, follow" />

    <!--[if lte IE 8]>
    <script src="<?php bloginfo('template_url'); ?>/js/respond.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="<?php bloginfo('template_url'); ?>/js/html5shiv.js"></script>
    <![endif]-->

    <?php wp_head(); ?>

    <link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" />

</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

    <header class="header col-12" itemscope itemtype="http://schema.org/Brand">

        <a href="<?php echo home_url(); ?>" class="logo-link ds-B fl-L w-auto-ts pad-EW">

            <img itemprop="logo" class="logo ds-B fl-L" src="<?php echo $GLOBALS['url_logo_white']; ?>" alt="<?php echo get_bloginfo('name'); ?>"/>

        </a>

        <?php wp_nav_menu( array( 'theme_location' => 'menu-main','container_class' => 'menu-main' ) ); ?>

        <div class="nav-crumb-wrapper col-9 col-5-t pad-p">

            <?php

            if(is_home()){?>

                <div class="nav_crumb nav_crumb_disabled">Home</div>

            <?php }else{?>

                <ul class="fl-L nav-crumb" style="margin:0;padding:0;list-style-type:none ;">

                    <?php include "includes/navigation-breadcrumb.php";?>

                </ul>

            <?php } ?>

        </div>

        <a href="<?php echo $GLOBALS['url_contact'];?>" class="nav-crumb-wrapper  col-3 w-auto-t fl-R al-R al-L-t">

            Contact

        </a>

    </header>




