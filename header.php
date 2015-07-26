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
        <section class="background">
            <ul class="rslides">
                 <li><img src="<?php echo bloginfo('template_url'); ?>/images/resized/image-1.jpg" alt=""></li>
                 <li><img src="<?php echo bloginfo('template_url'); ?>/images/resized/image-2.jpg" alt=""></li>
                 <li><img src="<?php echo bloginfo('template_url'); ?>/images/resized/image-3.jpg" alt=""></li>
                 <li><img src="<?php echo bloginfo('template_url'); ?>/images/resized/image-4.jpg" alt=""></li>
                 <li><img src="<?php echo bloginfo('template_url'); ?>/images/resized/image-5.jpg" alt=""></li>
                 <li><img src="<?php echo bloginfo('template_url'); ?>/images/resized/image-6.jpg" alt=""></li>

<!--                 <li><img src="images/Cinechine_01.jpg" alt=""></li>
                <li><img src="images/cinechine_02.jpg" alt=""></li>
                <li><img src="images/cinechine_03.jpg" alt=""></li>
                <li><img src="images/cinechine_04.jpg" alt=""></li>
                <li><img src="images/CitySondols_Amsterdam_BARTHEEMSKERK_01.jpg" alt=""></li>
                <li><img src="images/CitySondols_Amsterdam_BARTHEEMSKERK_02.jpg" alt=""></li>
                <li><img src="images/CitySondols_Angel.jpg" alt=""></li>
                <li><img src="images/CitySondols01.jpg" alt=""></li>
                <li><img src="images/CitySondols02.jpg" alt=""></li>
                <li><img src="images/CitySondolsToronto_airport.jpg" alt=""></li>
                <li><img src="images/CitySondolsToronto_StClare.jpg" alt=""></li>
                <li><img src="images/Echo_Moire_FE_01.jpg" alt=""></li>
                <li><img src="images/Echo_Moire_FE_02.jpg" alt=""></li>
                <li><img src="images/Echo_Moire_FE_03.jpg" alt=""></li>
                <li><img src="images/Ground_10.jpg" alt=""></li>
                <li><img src="images/Ground02.jpg" alt=""></li>
                <li><img src="images/Ground03.jpg" alt=""></li>
                <li><img src="images/integration04_1.jpg" alt=""></li>
                <li><img src="images/integration04_2.jpg" alt=""></li>
                <li><img src="images/integration04_3.jpg" alt=""></li>
                <li><img src="images/integration04_4.jpg" alt=""></li>
                <li><img src="images/Kulunka.jpg" alt=""></li>
                <li><img src="images/Lampyridae02.jpg" alt=""></li>
                <li><img src="images/leeway01.jpg" alt=""></li>
                <li><img src="images/leeway02.jpg" alt=""></li>
                <li><img src="images/leeway03.jpg" alt=""></li>
                <li><img src="images/LumisonicRotera setup.jpg" alt=""></li>
                <li><img src="images/LumisonicRotera white.jpg" alt=""></li>
                <li><img src="images/LumisonicRotera_01s.jpg" alt=""></li>
                <li><img src="images/LumisonicRotera.jpg" alt=""></li>
                <li><img src="images/Murmur_01.jpg" alt=""></li>
                <li><img src="images/Murmur_02.jpg" alt=""></li>
                <li><img src="images/Murmur_03.jpg" alt=""></li>
                <li><img src="images/murmur-compilatie.jpg" alt=""></li>
                <li><img src="images/Notesaaz.jpg" alt=""></li>
                <li><img src="images/NotesaazTrio_EJ.jpg" alt=""></li>
                <li><img src="images/OHHO_01.jpg" alt=""></li>
                <li><img src="images/OHHO_02.jpg" alt=""></li>
                <li><img src="images/QuietBeforeTheStorm01.jpg" alt=""></li>
                <li><img src="images/QuietBeforeTheStorm02.jpg" alt=""></li>
                <li><img src="images/QuietBeforeTheStorm03.jpg" alt=""></li>
                <li><img src="images/ShadowPuppet_03.jpg" alt=""></li>
                <li><img src="images/ShadowPuppet_04.jpg" alt=""></li>
                <li><img src="images/ShadowPuppet_BARTHEEMSKERK_01.jpg" alt=""></li>
                <li><img src="images/ShadowPuppet_BARTHEEMSKERK_02.jpg" alt=""></li>
                <li><img src="images/ShadowPuppet01_EJ.jpg" alt=""></li>
                <li><img src="images/ShadowPuppet02_ej.jpg" alt=""></li>
                <li><img src="images/SpineSpinning_EJ.jpg" alt=""></li>
                <li><img src="images/submerged.jpg" alt=""></li>
                <li><img src="images/WandelendeTak_01.jpg" alt=""></li>
                <li><img src="images/WandelendeTak_02.jpg" alt=""></li> -->
            </ul>
        </section>


        
