<?php include('header.php') ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


	<section class="page--single">
        <section class="page__header"><h2 class="title">Event</h2></section>
        <section class="page__body container">
        <div class="event-list hide-on-mobile">
            <h3 class="">Hosting</h3>
<?php $display_item; ?>
             <?php
                $args = array(
                    'post_type' => 'event',
                    'post_state' => 'publish',
                    'meta_key' => 'date_from',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                        'relation' => 'AND',                            
                        array(
                            'key' => 'date_from',
                            'value' => date("Ymd", strtotime("now")),
                            'type' => 'NUMERIC',
                            'compare' => '='
                        ),
                        array(
                            'key' => 'date_until',
                            'value'   => false,
                            'type' => 'BOOLEAN'
                        ),
                        array(
                            'key' => 'host_|_circulation',
                            'value' => 'host',
                            'compare' => 'LIKE'
                        )
                    )
                );

                $the_query1 = new WP_Query( $args );
            ?>
             <?php
                $args = array(
                    'post_type' => 'event',
                    'post_state' => 'publish',
                    'meta_key' => 'date_from',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                        'relation' => 'AND',
                        array(
                            'key' => 'date_from',
                            'value' => date("Ymd", strtotime("now")),
                            'type' => 'NUMERIC',
                            'compare' => '<='
                        ),
                        array(
                            'key' => 'date_until',
                            'value' => date("Ymd", strtotime("now")),
                            'type' => 'NUMERIC',
                            'compare' => '>='
                        ),
                        array(
                            'key' => 'host_|_circulation',
                            'value' => 'host',
                            'compare' => 'LIKE'
                        )
                    )
                );

                $the_query2 = new WP_Query( $args );
                
            ?>

    <?php if ($the_query1->have_posts()||$the_query2->have_posts()) : ?>
            <h4 class="">Current</h4>
            <ul class="">
    <?php while ($the_query1->have_posts()) : $the_query1->the_post(); if(!$display_item) $display_item = get_the_ID(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <?php echo '<time>';
            $locations = get_field('location');                      
            if($locations) {
                foreach($locations as $location){
                    echo $location['location'].'</br>'; //''
                }
            }else{
                $locations = rwmb_meta( 'event_location');
                foreach($locations as $location){
                    echo $location.'</br>'; //''
                }
            }


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
            
            echo '</time>';
    ?>
                
            </li>
    <?php endwhile; ?>
    <?php while ($the_query2->have_posts()) : $the_query2->the_post(); if(!$display_item) $display_item = get_the_ID(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <?php echo '<time>';
            $locations = get_field('location');                      
            if($locations) {
                foreach($locations as $location){
                    echo $location['location'].'</br>'; //''
                }
            }else{
                $locations = rwmb_meta( 'event_location');
                foreach($locations as $location){
                    echo $location.'</br>'; //''
                }
            }


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
            
            echo '</time>';
    ?>
                
            </li>
    <?php endwhile; ?>
            </ul>
    <?php endif; ?>
    
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
                            'relation' => 'AND',
                            array(
                                'key' => 'date_from',
                                'value' => date("Ymd", strtotime("now")),
                                'type' => 'NUMERIC',
                                'compare' => '>'
                            ),
                            // array(
                            //     'key' => 'date_until',
                            //     'value' => strtotime("now"),
                            //     'type' => 'NUMERIC',
                            //     'compare' => '>'
                            // )
                        ),
                        array(
                            'key' => 'host_|_circulation',
                            'value' => 'host',
                            'compare' => 'LIKE'
                        )
                    )
                );

                $the_query = new WP_Query( $args );
            ?>
    <?php if ($the_query->have_posts()) : ?>
            <h4 class="">Upcoming</h4>
            <ul class="">
    <?php while ($the_query->have_posts()) : $the_query->the_post(); if(!$display_item) $display_item = get_the_ID(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?>
    <?php echo '<time>';

            $locations = get_field('location');
            if($locations) {
                foreach($locations as $location){
                    echo $location['location'].'</br>'; //''
                }
            }else{
                $locations = rwmb_meta( 'event_location');
                foreach($locations as $location){
                    echo $location.'</br>'; //''
                }
            }

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

            echo '</time>';
    ?>
                </a>
            </li>
    <?php endwhile; ?>
            </ul>
    <?php endif; ?>


             <?php
                $args = array(
                    'post_type' => 'event',
                    'post_state' => 'publish',
                    'meta_key' => 'date_from',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                        'relation' => 'AND',
                        array(
                            'relation' => 'AND',
                            array(
                                'key' => 'date_from',
                                'value' => date("Ymd", strtotime("now")),
                                'type' => 'NUMERIC',
                                'compare' => '<'
                            ),
                            array(
                                'key' => 'date_until',
                                'value' => date("Ymd", strtotime("now")),
                                'type' => 'NUMERIC',
                                'compare' => '<'
                            )
                        ),
                        array(
                            'key' => 'host_|_circulation',
                            'value' => 'host',
                            'compare' => 'LIKE'
                        )
                    )
                );

                $the_query = new WP_Query( $args );
            ?>
    <?php if ($the_query->have_posts()) : ?>
            <h4 class="">Past</h4>
            <ul class="iii-readmore">
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?>
    <?php echo '<time>';

            $locations = get_field('location');
            if($locations) {
                foreach($locations as $location){
                    echo $location['location'].'</br>'; //''
                }
            }else{
                $locations = rwmb_meta( 'event_location');
                foreach($locations as $location){
                    echo $location.'</br>'; //''
                }
            }

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

            echo '</time>';
    ?>
                </a>
            </li>
    <?php endwhile; ?>
            </ul>
    <?php endif; ?>
        </div>

        <div class="event-list right hide-on-mobile">
            <h3 class="">Circulation</h3>

             <?php
                $args = array(
                    'post_type' => 'event',
                    'post_state' => 'publish',
                    'meta_key' => 'date_from',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                        'relation' => 'AND',                            
                        array(
                            'key' => 'date_from',
                            'value' => date("Ymd", strtotime("now")),
                            'type' => 'NUMERIC',
                            'compare' => '='
                        ),
                        array(
                            'key' => 'date_until',
                            'value'   => false,
                            'type' => 'BOOLEAN'
                        ),
                        array(
                            'key' => 'host_|_circulation',
                            'value' => 'circulation',
                            'compare' => 'LIKE'
                        )
                    )
                );

                $the_query1 = new WP_Query( $args );
            ?>
             <?php
                $args = array(
                    'post_type' => 'event',
                    'post_state' => 'publish',
                    'meta_key' => 'date_from',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                        'relation' => 'AND',
                        array(
                            'key' => 'date_from',
                            'value' => date("Ymd", strtotime("now")),
                            'type' => 'NUMERIC',
                            'compare' => '<='
                        ),
                        array(
                            'key' => 'date_until',
                            'value' => date("Ymd", strtotime("now")),
                            'type' => 'NUMERIC',
                            'compare' => '>='
                        ),
                        array(
                            'key' => 'host_|_circulation',
                            'value' => 'circulation',
                            'compare' => 'LIKE'
                        )
                    )
                );

                $the_query2 = new WP_Query( $args );
                
            ?>

    <?php if ($the_query1->have_posts()||$the_query2->have_posts()) : ?>
            <h4 class="">Current</h4>
            <ul class="">
    <?php while ($the_query1->have_posts()) : $the_query1->the_post(); if(!$display_item) $display_item = get_the_ID(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <?php echo '<time>';
                                    
            $locations = get_field('location');                      
            if($locations) {
                foreach($locations as $location){
                    echo $location['location'].'</br>'; //''
                }
            }else{
                $locations = rwmb_meta( 'event_location');
                foreach($locations as $location){
                    echo $location.'</br>'; //''
                }
            }

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

            echo '</time>';
    ?>
            </li>
    <?php endwhile; ?>
    <?php while ($the_query2->have_posts()) : $the_query2->the_post(); if(!$display_item) $display_item = get_the_ID(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <?php echo '<time>';
                                    
            $locations = get_field('location');                      
            if($locations) {
                foreach($locations as $location){
                    echo $location['location'].'</br>'; //''
                }
            }else{
                $locations = rwmb_meta( 'event_location');
                if (is_array($values) || is_object($values))
                {
                    foreach($locations as $location){
                        echo $location.'</br>'; //''
                    }
                }
            }

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

            echo '</time>';
    ?>
            </li>
    <?php endwhile; ?>
            </ul>
    <?php endif; ?>

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
                            'relation' => 'OR',
                            array(
                                'key' => 'date_from',
                                'value' => date("Ymd", strtotime("now")),
                                'type' => 'NUMERIC',
                                'compare' => '>'
                            ),
                            // array(
                            //     'key' => 'date_until',
                            //     'value' => strtotime("now"),
                            //     'type' => 'NUMERIC',
                            //     'compare' => '>'
                            // )
                        ),
                        array(
                            'key' => 'host_|_circulation',
                            'value' => 'circulation',
                            'compare' => 'LIKE'
                        )
                    )
                );

                $the_query = new WP_Query( $args );
            ?>
    <?php if ($the_query->have_posts()) : ?>
            <h4 class="">Upcoming</h4>
            <ul class="">
    <?php while ($the_query->have_posts()) : $the_query->the_post(); if(!$display_item) $display_item = get_the_ID(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?>
    <?php echo '<time>';

            $locations = get_field('location');
            if($locations) {
                foreach($locations as $location){
                    echo $location['location'].'</br>'; //''
                }
            }else{
                $locations = rwmb_meta( 'event_location');
                foreach($locations as $location){
                    echo $location.'</br>'; //''
                }
            }

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

            echo '</time>';
    ?>
                </a>
            </li>
    <?php endwhile; ?>
            </ul>
    <?php endif; ?>


             <?php
                $args = array(
                    'post_type' => 'event',
                    'post_state' => 'publish',
                    'meta_key' => 'date_from',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                        'relation' => 'AND',
                        array(
                            'relation' => 'AND',
                            array(
                                'key' => 'date_from',
                                'value' => date("Ymd", strtotime("now")),
                                'type' => 'NUMERIC',
                                'compare' => '<'
                            ),
                            array(
                                'key' => 'date_until',
                                'value' => date("Ymd", strtotime("now")),
                                'type' => 'NUMERIC',
                                'compare' => '<'
                            )
                        ),
                        array(
                            'key' => 'host_|_circulation',
                            'value' => 'circulation',
                            'compare' => 'LIKE'
                        )
                    )
                );

                $the_query = new WP_Query( $args );
            ?>
    <?php if ($the_query->have_posts()) : ?>
            <h4 class="">Past</h4>
            <ul class="iii-readmore">
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?>
    <?php echo '<time>';

            $locations = get_field('location');
            if($locations) {
                foreach($locations as $location){
                    echo $location['location'].'</br>'; //''
                }
            }else{
                $locations = rwmb_meta( 'event_location');
                if (is_array($values) || is_object($values))
                {
                    foreach($locations as $location){
                        echo $location.'</br>'; //''
                    }
                }
            }

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

            echo '</time>';
    ?>
                </a>
            </li>
    <?php endwhile; ?>
            </ul>
    <?php endif; ?>
     <?php wp_reset_query(); ?>
        </div>
        <section class="event-content">

<h2><?php the_title(); ?></h2>
<div class="text">
<?php the_content(); ?>
</div>


<?php       ///////// Find related works ///////////
		$id=get_the_ID();
		unset($related_works_ids);
		$related_works_ids = rpt_get_object_relation($id, 'work');
		if ( $related_works_ids ) :
				$related_works = get_posts( array(
						'post_type' => 'work',
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'post__in' => $related_works_ids,
						'orderby' => 'title',
						'order' => 'ASC'
				) );
		?>

		<div class="related_works">

				<div class="details">
						<h2>Related works</h2>
				</div>
				<ul class="view--grid">
				<?php foreach ( $related_works as $post ) : ?>
						<li class="grid-6 grid-mobile-12 grid-sm-12 grid-md-6 grid-xl-6">
						<a class="thumbnail" href="<?php echo get_permalink($post); ?>"><?php //echo get_the_title($post);?>

						<?php
								if ( '' != get_the_post_thumbnail($post->ID)) { // check if the post has a Post Thumbnail assigned to it.
										echo get_the_post_thumbnail($post->ID, 'work-thumb');
										//echo "has thumb";
								} else {
										//echo "has no thumb";
								}
						?>

						<div class="info--overlay"><div>
								<p class="teaser__title">
										<?php
												echo get_the_title($post);
												//echo ' '.get_the_ID();

										?>
								</p>

								<p class="teaser__artist">

										 <?php  //////////// Find related artists of related work //////////////

												//$related_artist_pages_ids = array();
												unset($related_artist_pages_ids);
												$related_artist_pages_ids = rpt_get_object_relation($post->ID, 'artist');
												//echo print_r($related_artist_pages_ids).' ';
												//echo count($related_artist_pages_ids).' ';
												if ( $related_artist_pages_ids ) {
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
												}
										 ?>

										 <?php // other artists

												$artists = rwmb_meta( 'work_artists');
												foreach($artists as $artist){
														echo $artist."<br />";
												}
										?>
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
						</li>
						<?php endforeach; ?>
						</ul>
				</div>
				<?php endif; ?>


        </section>


        </section>
	</section>

	<div class="section-wrap">




	</div>


<!-- <section class="main">
    <div class="wrap">
        <?php //the_content(); ?>
    </div>
</section> -->

<?php endwhile; ?>
<?php endif; ?>


<?php include('footer.php') ?>
