<?php include('header.php') ?>
<!-- <section class="background">
    <ul class="rslides">
<?php 
    $slides = get_field("slideshow", 65);
    if($slides){
        foreach($slides as $slide){
            echo '<li><img src="'. $slide['url'] .'" alt=""></li>';

        }
    }
?>
    </ul>
</section> -->
<div class="viewport">

    <section class="page--single">
        <section class="page__header"><h2 class="title"><?php post_type_archive_title(); ?></h2></section>
        <section class="page__body container">
<!--         <div class="sort">
            <p>
                Order: 
               <button class="button" data-sort-by="date">chronologic</button> | <button class="button" data-sort-by="name">alphabetical</button>
            </p>
        </div> -->
        <?php
            $args = array(
                'post_type' => 'residency',
                'post_state' => 'publish',
                'meta_key' => 'date_from',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
                'posts_per_page' => -1,
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'date_from',
                        'value' => date('Ymd', strtotime("now")),
                        'type' => 'NUMERIC',
                        'compare' => '<='
                    ),
                    array(
                        'key' => 'date_until',
                        'value' => date('Ymd', strtotime("now")),
                        'type' => 'NUMERIC',
                        'compare' => '>='
                    )
                )
            );

            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
        ?>
        <h3 class="grid-12">Current</h3>

        <ul class="view--list">

        <?php
                while ( $the_query->have_posts() ) : $the_query->the_post();

        ?>
        <li class="grid-12 parent grid-mobile-12 ">
            <div class="grid-5 align-left">
        <?php if (has_post_thumbnail()): ?>
                <a class="thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail("work-thumb"); ?></a>
        <?php endif; ?>
            </div>
            <div class="grid-7 align-left">
                <a href="<?php the_permalink(); ?>"><h2 class="name"><?php the_title(); ?></h2></a>
        <?php 
            if(get_field('date_from')){
                    $unixtimestamp = strtotime(get_field('date_from'));
                    $date_from = date_i18n("d M, Y", $unixtimestamp);
                    echo $date_from;
                if(get_field('date_until')){
                    $unixtimestamp = strtotime(get_field('date_until'));
                    $date_until = date_i18n("d M, Y", $unixtimestamp);
                    echo " - ". $date_until;
                }
            }
        ?>
                <p><?php the_excerpt(); ?></p>
            </div>
        </li>
                <?php


                    // $the_query = new WP_Query( $args );
                    // $col_count = 1;
                    // $dates = [];
                    // if ( $the_query->have_posts() ) :
                    //     while ( $the_query->have_posts() ) : $the_query->the_post();


                    //     $unixtimestamp = strtotime(get_field('schedule-date'));

                    //     $month = date_i18n("n", $unixtimestamp);
                    //     $day = date_i18n("d", $unixtimestamp);
                    //     $dayofweek = date_i18n("D", $unixtimestamp);
                    //      array_push($dates, $unixtimestamp*1000);

                    //      $categories = wp_get_object_terms($post->ID, 'category');
                    //     $cats = [];

                    //      if($categories){
                    //         foreach($categories as $category){
                    //             array_push($cats, $category->slug);
                    //         }
                    //      }
                    //      if(!empty($cats)) $cats = implode(" ", $cats);


                ?>  
        <?php
                endwhile;
        ?>
        </ul>

        <?php
            endif;
            wp_reset_postdata();
        ?>



        <?php
            $args = array(
                'post_type' => 'residency',
                'post_state' => 'publish',
                'meta_key' => 'date_from',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
                'posts_per_page' => -1,
                'meta_query' => array(
                    array(
                        'key' => 'date_from',
                        'value' => date('Ymd', strtotime("now")),
                        'type' => 'NUMERIC',
                        'compare' => '>'
                    )
                )
            );

            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
        ?>
        <h3 class="grid-12">Upcoming</h3>

        <ul class="view--list">

        <?php
                while ( $the_query->have_posts() ) : $the_query->the_post();

        ?>
        <li class="grid-12 parent grid-mobile-12 ">
            <div class="grid-5 align-left">
        <?php if (has_post_thumbnail()): ?>
                <a class="thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail("work-thumb"); ?></a>
        <?php endif; ?>
            </div>
            <div class="grid-7 align-left">
                <a href="<?php the_permalink(); ?>"><h2 class="name"><?php the_title(); ?></h2></a>
        <?php 
            if(get_field('date_from')){
                    $unixtimestamp = strtotime(get_field('date_from'));
                    $date_from = date_i18n("d M, Y", $unixtimestamp);
                    echo $date_from;
                if(get_field('date_until')){
                    $unixtimestamp = strtotime(get_field('date_until'));
                    $date_until = date_i18n("d M, Y", $unixtimestamp);
                    echo " - ". $date_until;
                }
            }
        ?>
                <p><?php the_excerpt(); ?></p>
            </div>
        </li>
                <?php


                    // $the_query = new WP_Query( $args );
                    // $col_count = 1;
                    // $dates = [];
                    // if ( $the_query->have_posts() ) :
                    //     while ( $the_query->have_posts() ) : $the_query->the_post();


                    //     $unixtimestamp = strtotime(get_field('schedule-date'));

                    //     $month = date_i18n("n", $unixtimestamp);
                    //     $day = date_i18n("d", $unixtimestamp);
                    //     $dayofweek = date_i18n("D", $unixtimestamp);
                    //      array_push($dates, $unixtimestamp*1000);

                    //      $categories = wp_get_object_terms($post->ID, 'category');
                    //     $cats = [];

                    //      if($categories){
                    //         foreach($categories as $category){
                    //             array_push($cats, $category->slug);
                    //         }
                    //      }
                    //      if(!empty($cats)) $cats = implode(" ", $cats);


                ?>  
        <?php
                endwhile;
        ?>
        </ul>

        <?php
            endif;
            wp_reset_postdata();
        ?>

         <?php
            $args = array(
                'post_type' => 'residency',
                'post_state' => 'publish',
                'meta_key' => 'date_from',
                'orderby' => 'meta_value_num',
                'order' => 'DESC',
                'posts_per_page' => -1,
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'date_from',
                        'value' => date('Ymd', strtotime("now")),
                        'type' => 'NUMERIC',
                        'compare' => '<'
                    ),
                    array(
                        'key' => 'date_until',
                        'value' => date('Ymd', strtotime("now")),
                        'type' => 'NUMERIC',
                        'compare' => '<'
                    )
                )
            );

            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
        ?>
        <h3 class="grid-12">Past</h3>

        <ul class="view--list">

        <?php
                while ( $the_query->have_posts() ) : $the_query->the_post();

        ?>
        <li class="grid-12 parent grid-mobile-12 ">
            <div class="grid-5 align-left">
        <?php if (has_post_thumbnail()): ?>
                <a class="thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail("work-thumb"); ?></a>
        <?php endif; ?>
            </div>
            <div class="grid-7 align-left">
                <a href="<?php the_permalink(); ?>"><h2 class="name"><?php the_title(); ?></h2></a>

        <?php 
            if(get_field('date_from')){
                    $unixtimestamp = strtotime(get_field('date_from'));
                    $date_from = date_i18n("d M, Y", $unixtimestamp);
                    echo $date_from;
                if(get_field('date_until')){
                    $unixtimestamp = strtotime(get_field('date_until'));
                    $date_until = date_i18n("d M, Y", $unixtimestamp);
                    echo " - ". $date_until;
                }
            }
        ?>
                <p><?php the_excerpt(); ?></p>
            </div>
        </li>
                <?php


                    // $the_query = new WP_Query( $args );
                    // $col_count = 1;
                    // $dates = [];
                    // if ( $the_query->have_posts() ) :
                    //     while ( $the_query->have_posts() ) : $the_query->the_post();


                    //     $unixtimestamp = strtotime(get_field('schedule-date'));

                    //     $month = date_i18n("n", $unixtimestamp);
                    //     $day = date_i18n("d", $unixtimestamp);
                    //     $dayofweek = date_i18n("D", $unixtimestamp);
                    //      array_push($dates, $unixtimestamp*1000);

                    //      $categories = wp_get_object_terms($post->ID, 'category');
                    //     $cats = [];

                    //      if($categories){
                    //         foreach($categories as $category){
                    //             array_push($cats, $category->slug);
                    //         }
                    //      }
                    //      if(!empty($cats)) $cats = implode(" ", $cats);


                ?>  
        <?php
                endwhile;
        ?>
        </ul>

        <?php
            endif;
            wp_reset_postdata();
        ?>
        <?php
            // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'iii' ),
                'next_text'          => __( 'Next page', 'iii' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'iii' ) . ' </span>',
            ) );
        ?>
        </section>
    </section>

    <div class="section-wrap">




    </div>
    
</div>

<!-- <section class="main">
    <div class="wrap">
        <?php //the_content(); ?>        
    </div>
</section> -->




<?php include('footer.php') ?>
