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
          <?php
          $args = array(
          'name'        => 'workshop-description',
          'post_type'   => 'page',
          'post_status' => 'publish',
          'numberposts' => 1
          );
          $description = get_posts($args);
          if( $description ) :
          // echo $description[0]->post_content;
          endif;
           ?>
           <?php
              $args = array(
                  'post_type' => 'event',
                  'post_state' => 'publish',
                  'meta_key' => 'date_from',
                  'orderby' => 'meta_value_num',
                  'order' => 'ASC',
                  'posts_per_page' => -1,
                  'meta_query' => array(
                    'relation' => 'AND',
                      array(
                          'key' => 'date_from',
                          'value' => date("Ymd", strtotime("now")),
                          'type' => 'NUMERIC',
                          'compare' => '>'
                      ),
                      array(
                          'key' => 'is_workshop',
                          'value' => '1',
                          'compare' => '=='
                      )
                  )
              );

              $the_query = new WP_Query( $args );
          ?>
  <?php if ($the_query->have_posts()) : ?>
           <div class="related_events">
           <div class="event-list ">
               <h3 class="">Upcoming Workshops</h3>
               <ul class="">
       <?php while ($the_query->have_posts()) : $the_query->the_post(); if(!$display_item) $display_item = get_the_ID(); ?>
               <li>
                   <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
       <?php echo '<time>';



               if(get_field('date_from')){
                       $unixtimestamp = strtotime(get_field('date_from'));
                       $date_from = date_i18n("d M, Y", $unixtimestamp);
                       echo $date_from;
                   if(get_field('date_until')){
                       $unixtimestamp = strtotime(get_field('date_until'));
                       $date_until = date_i18n("d M, Y", $unixtimestamp);
                       echo " - ". $date_until;
                   }
               }else{
                   //$event_start_date = rwmb_meta( 'event_start_date');
                   //if('' != $event_start_date){
                       the_date();
                   //}
                   $event_end_date = rwmb_meta( 'event_end_date');
                   if('' != $event_end_date){
                       echo ' - '.$event_end_date;
                   }
               }

               $locations = get_field('location');
               if($locations) {
                   foreach($locations as $location){
                       echo ", ".$location[location]; //''
                   }
               }else{
                   $locations = rwmb_meta( 'event_location');
                   foreach($locations as $location){
                       echo ", ".$location; //''
                   }
               }
               echo '</time>';
       ?>
               </li>
       <?php endwhile; ?>
               </ul>
           </div>
         </div>
         <div class="clear">
     <?php endif; ?>

        <!-- <div class="sort">
            <p>
              Filter:
              <?php
                $field = get_field_object('work_category');
                $choices = $field['choices'];
                $i=0;
                foreach( $choices as $choice => $name ){
                  if($i>0) echo "|";
                  $i++;
                  echo "<button class='button' data-filter='". $choice ."'>". $name ."</button>";
                }
              ?>
            </p>
        </div> -->
        <ul class="view--grid isotope works">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <li class="grid-4 grid-mobile-12 grid-sm-6 grid-md-4 grid-xl-3 <?php echo implode(' ', get_field("work_category")); ?>">
        <?php if (has_post_thumbnail()): ?>
            <a class="thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail("work-thumb"); ?>

            <div class="info--overlay"><div>
                <div><?php the_title(); ?></div>
                <?php
                    // unset($related_artist_pages_ids);
                    // $id=get_the_ID();
                    // $related_artist_pages_ids = rpt_get_object_relation($id, 'artist');
                    // if ( count($related_artist_pages_ids) >= 1 ) {
                    //     $related_artist_pages = get_posts( array(
                    //         'post_type' => 'artist',
                    //         'post_status' => 'publish',
                    //         'posts_per_page' => -1,
                    //         'post__in' => $related_artist_pages_ids,
                    //         'orderby' => 'post_date',
                    //         'order' => 'DESC'
                    //     ) );
                    //    foreach ( $related_artist_pages as $artist_post ) {
                    //        echo get_the_title($artist_post).'<br />';
                    //    }
                    // }
                ?>
                <?php // other artists

                    // $artists = rwmb_meta( 'work_artists');
                    // foreach($artists as $artist){
                    //     echo $artist."<br />";
                    //  }

                ?>
                <!-- <p class="teaser__year">
                    <?php
                        $date=get_post_meta(get_the_ID(), '_date', TRUE);
                        if( ! empty( $date ) ) {
                            echo '<span class="date">'.$date.'</span><br />';
                        }
                    ?>
                </p> -->
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
