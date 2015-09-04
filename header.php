<!doctype html>
<html class="no-js"><!--<![endif]-->

    <head>
        <meta charset="utf-8">

        <?php // force Internet Explorer to use the latest rendering engine available ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title><?php wp_title(''); ?></title>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<link rel="apple-touch-icon" sizes="57x57" href="/icons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/icons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/icons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/icons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/icons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/icons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/icons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/icons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/icons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/icons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
<link rel="manifest" href="/icons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/icons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

        <?php // mobile meta (hooray!) ?>
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/grid.css">
        <link href='http://fonts.googleapis.com/css?family=Nova+Round|Gafata|Karla|Exo+2:400,300,200,100|Ruda|Merriweather+Sans:400,300' rel='stylesheet' type='text/css'>
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
                    'depth' => 1,                                   // limit the depth of the nav
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
                    'depth' => 1,                                   // limit the depth of the nav
                    'fallback_cb' => ''                             // fallback function (if there is one)
                )); ?>        
            </nav>
        </section>



        
