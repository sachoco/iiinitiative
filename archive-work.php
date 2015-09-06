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
<!-- <div class="viewport"> -->
<!--     <div class="overlay--left"></div>
    <div class="overlay--right"></div> -->

    <section class="page--single">
        <section class="page__header"><h2 class="title"><?php post_type_archive_title(); ?></h2></section>
        <section class="page__body container">
<!--         <div class="sort">
            <p>
                Order: 
               <button class="button" data-sort-by="date">chronologic</button> | <button class="button" data-sort-by="name">alphabetical</button>
            </p>
        </div> -->
        <ul class="view--grid isotope works">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <li class="grid-4 grid-mobile-12 grid-sm-6 grid-md-4 grid-xl-3">
        <?php if (has_post_thumbnail()): ?>
            <a class="thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail("work-thumb"); ?>

            <div class="info--overlay"><div>
                <div><?php the_title(); ?></div>
                <?php
                    unset($related_artist_pages_ids);
                    $id=get_the_ID();
                    $related_artist_pages_ids = rpt_get_object_relation($id, 'artist');
                    if ( count($related_artist_pages_ids) >= 1 ) {
                        $related_artist_pages = get_posts( array(
                            'post_type' => 'artist',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'post__in' => $related_artist_pages_ids,
                            'orderby' => 'post_date',
                            'order' => 'DESC'
                        ) );
                       //echo print_r($related_artist_pages).' ';
                       foreach ( $related_artist_pages as $artist_post ) {
                           echo get_the_title($artist_post).'<br />';
                       } 
                    //unset($related_artist_pages_ids);
                    //$related_artist_pages_ids = array();
                    //echo count($related_artist_pages_ids);
                    // wp_reset_query();
                    }       
                ?>
                <?php // other artists

                    $artists = rwmb_meta( 'work_artists');
                    //if(count($artists)>0) echo 'artists found' else echo 'no artists found';
                    foreach($artists as $artist){
                        echo $artist."<br />";
                     }                           

                ?> 
                <p class="teaser__year">
                    <?php 
                        $date=get_post_meta(get_the_ID(), '_date', TRUE);
                        if( ! empty( $date ) ) {
                        //if( false ) { 
                            echo '<span class="date">'.$date.'</span><br />';
                        }
                
                    ?>
                </p>
            </div></div>


            </a>
        <?php endif; ?>
<!--             <a href="<?php the_permalink(); ?>"><h2 class="name"><?php the_title(); ?></h2></a>
 -->
        </li>

<?php endwhile; ?>
<?php endif; ?>
        </ul>
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
    
<!-- </div> -->

<!-- <section class="main">
    <div class="wrap">
        <?php //the_content(); ?>        
    </div>
</section> -->




<?php include('footer.php') ?>
