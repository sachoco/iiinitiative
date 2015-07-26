<!doctype html>
<html class="no-js"><!--<![endif]-->

    <head>
        <meta charset="utf-8">

        <?php // force Internet Explorer to use the latest rendering engine available ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title><?php wp_title(''); ?></title>

        <?php // mobile meta (hooray!) ?>
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/grid.css">
        <link href='http://fonts.googleapis.com/css?family=Nova+Round|Gafata|Karla|Exo+2:400,300,200,100|Ruda|Merriweather+Sans:400,300' rel='stylesheet' type='text/css'>
        
        <?php wp_head(); ?>

<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
    </head>

    <body>
        <section class="header">
            <nav class="nav" role="navigation">
                <ul class="nav-left">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Agency</a></li>
                    <li><a href="#">Agenda</a></li>
                </ul>
                <h1 class="logo">
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
                </h1>
                <ul class="nav-right">
                    <li><a href="#">Productions</a></li>
                    <li><a href="#">Residency</a></li>
                    <li><a href="#">Shop</a></li>
                </ul>
            </nav>
        </section>



        
