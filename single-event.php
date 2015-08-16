<?php include('header.php') ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="viewport">


	<section class="page--single">
        <section class="page__header"><h2 class="title"><?php the_title(); ?></h2></section>
        <section class="page__body container">
        <div class="event-list">
            <h3 class="">Host</h3>

            <h4 class="">Current</h4>
            <ul class="">
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
                                'value' => strtotime("now"),
                                'type' => 'NUMERIC',
                                'compare' => '<='
                            ),
                            array(
                                'key' => 'date_until',
                                'value' => strtotime("now"),
                                'type' => 'NUMERIC',
                                'compare' => '>='
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
    <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?>
    <?php echo '<time>';
                                    
            $locations = rwmb_meta( 'event_location');
            foreach($locations as $location){
                echo $location.'</br>'; //''
            }

            if(get_field('date_from')){
                the_field('date_from');
                if(get_field('date_until')){
                    echo " - ". get_field('date_until');
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
    <?php endif; ?>
            </ul>
            <h4 class="">Upcoming</h4>
            <ul class="">
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
                                'value' => strtotime("now"),
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
    <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?>
    <?php echo '<time>';
                                    
            $locations = rwmb_meta( 'event_location');
            foreach($locations as $location){
                echo $location.'</br>'; //''
            }

            if(get_field('date_from')){
                the_field('date_from');
                if(get_field('date_until')){
                    echo " - ". get_field('date_until');
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
    <?php endif; ?>
            </ul>

            <h4 class="">Past</h4>

            <ul class="">
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
                                'value' => strtotime("now"),
                                'type' => 'NUMERIC',
                                'compare' => '<'
                            ),
                            array(
                                'key' => 'date_until',
                                'value' => strtotime("now"),
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
    <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?>
    <?php echo '<time>';
                                    
            $locations = rwmb_meta( 'event_location');
            foreach($locations as $location){
                echo $location.'</br>'; //''
            }

            if(get_field('date_from')){
                the_field('date_from');
                if(get_field('date_until')){
                    echo " - ". get_field('date_until');
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
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>

            </ul>
        </div>
        <section class="event-content">

<h2><?php the_title(); ?></h2>
<?php the_content(); ?>
  
        </section>
        <div class="event-list right">
            <h3 class="">Circulation</h3>

            <h4 class="">Current</h4>
            <ul class="">
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
                                'value' => strtotime("now"),
                                'type' => 'NUMERIC',
                                'compare' => '<='
                            ),
                            array(
                                'key' => 'date_until',
                                'value' => strtotime("now"),
                                'type' => 'NUMERIC',
                                'compare' => '>='
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
    <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?>
    <?php echo '<time>';
                                    
            $locations = rwmb_meta( 'event_location');
            foreach($locations as $location){
                echo $location.'</br>'; //''
            }

            if(get_field('date_from')){
                the_field('date_from');
                if(get_field('date_until')){
                    echo " - ". get_field('date_until');
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
    <?php endif; ?>
            </ul>
            <h4 class="">Upcoming</h4>
            <ul class="">
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
                            'relation' => 'OR',
                            array(
                                'key' => 'date_from',
                                'value' => strtotime("now"),
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
    <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?>
    <?php echo '<time>';
                                    
            $locations = rwmb_meta( 'event_location');
            foreach($locations as $location){
                echo $location.'</br>'; //''
            }

            if(get_field('date_from')){
                the_field('date_from');
                if(get_field('date_until')){
                    echo " - ". get_field('date_until');
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
    <?php endif; ?>
            </ul>

            <h4 class="">Past</h4>

            <ul class="">
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
                                'value' => strtotime("now"),
                                'type' => 'NUMERIC',
                                'compare' => '>'
                            ),
                            array(
                                'key' => 'date_until',
                                'value' => strtotime("now"),
                                'type' => 'NUMERIC',
                                'compare' => '>'
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
    <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?>
    <?php echo '<time>';
                                    
            $locations = rwmb_meta( 'event_location');
            foreach($locations as $location){
                echo $location.'</br>'; //''
            }

            if(get_field('date_from')){

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
    <?php endif; ?>
            </ul>
        </div>

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

<?php endwhile; ?>
<?php endif; ?>


<?php include('footer.php') ?>
