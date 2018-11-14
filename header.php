<!doctype html>
<html class="no-js"><!--<![endif]-->

    <head>
        <meta charset="utf-8">

        <?php // force Internet Explorer to use the latest rendering engine available ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title><?php wp_title(''); ?></title>

        <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">


        <?php // mobile meta (hooray!) ?>
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/grid.css">
        <link href='https://fonts.googleapis.com/css?family=Nova+Round|Gafata|Karla|Exo+2:400,300,200,100|Ruda|Merriweather+Sans:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">



        <?php wp_head(); ?>

<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
    </head>

    <body <?php body_class(); ?>>
        <section class="header">
            <nav class="nav" role="navigation">
                <?php wp_nav_menu(array(
                    'container' => false,                           // remove nav container
                    'container_class' => 'menu cf',                 // class of container (should you choose to use it)
                    'menu' => __( 'Main Menu Left', 'iii' ),  // nav name
                    'menu_class' => 'nav-left nav',               // adding custom nav class
                    'theme_location' => 'main-menu-left',                 // where it's located in the theme
                    'before' => '',                                 // before the menu
                    'after' => '',                                  // after the menu
                    'link_before' => '',                            // before each link
                    'link_after' => '',                             // after each link
                    'depth' => 2,                                   // limit the depth of the nav
                    'fallback_cb' => ''                             // fallback function (if there is one)
                )); ?>
                <a href="<?php echo site_url(); ?>"><h1 class="logo">
                    <svg x="0px" y="0px" width="20px" height="30px" viewBox="0 0 120 152">
                        <g>
                            <ellipse fill="#000" cx="18.235" cy="14.702" rx="10.875" ry="8.891"/>
                            <ellipse fill="#000" cx="59.235" cy="14.702" rx="10.875" ry="8.891"/>
                            <ellipse fill="#000" cx="100.235" cy="14.702" rx="10.875" ry="8.891"/>
                            <polygon fill="#000" points="9,56 9,144 27,144 27,51 21,51   "/>
                            <polygon fill="#000" points="50,56 50,144 68,144 68,51 62,51     "/>
                            <polygon fill="#000" points="92,56 92,144 110,144 110,51 104,51  "/>
                        </g>
                    </svg>
                </h1></a>
                <?php wp_nav_menu(array(
                    'container' => false,                           // remove nav container
                    'container_class' => 'menu cf',                 // class of container (should you choose to use it)
                    'menu' => __( 'Main Menu Right', 'iii' ),  // nav name
                    'menu_class' => 'nav-right nav',               // adding custom nav class
                    'theme_location' => 'main-menu-right',                 // where it's located in the theme
                    'before' => '',                                 // before the menu
                    'after' => '',                                  // after the menu
                    'link_before' => '',                            // before each link
                    'link_after' => '',                             // after each link
                    'depth' => 2,                                   // limit the depth of the nav
                    'fallback_cb' => ''                             // fallback function (if there is one)
                )); ?>
                <div class="mobile-menu"><i class="fa fa-bars fa-2x fa-border"></i></div>
            </nav>
            <nav class="mobile-nav">
                <?php wp_nav_menu(array(
                    'container' => false,                           // remove nav container
                    'container_class' => 'menu cf',                 // class of container (should you choose to use it)
                    'menu' => __( 'Main Menu Left', 'iii' ),  // nav name
                    'menu_class' => 'nav',               // adding custom nav class
                    'theme_location' => 'main-menu-left',                 // where it's located in the theme
                    'before' => '',                                 // before the menu
                    'after' => '',                                  // after the menu
                    'link_before' => '',                            // before each link
                    'link_after' => '',                             // after each link
                    'depth' => 2,                                   // limit the depth of the nav
                    'fallback_cb' => ''                             // fallback function (if there is one)
                )); ?>
                <?php wp_nav_menu(array(
                    'container' => false,                           // remove nav container
                    'container_class' => 'menu cf',                 // class of container (should you choose to use it)
                    'menu' => __( 'Main Menu Right', 'iii' ),  // nav name
                    'menu_class' => 'nav',               // adding custom nav class
                    'theme_location' => 'main-menu-right',                 // where it's located in the theme
                    'before' => '',                                 // before the menu
                    'after' => '',                                  // after the menu
                    'link_before' => '',                            // before each link
                    'link_after' => '',                             // after each link
                    'depth' => 2,                                   // limit the depth of the nav
                    'fallback_cb' => ''                             // fallback function (if there is one)
                )); ?>
            </nav>
        </section>
