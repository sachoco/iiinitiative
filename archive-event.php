<?php include('header.php') ?>

<div class="viewport">

	<section class="page--single">
        <section class="page__header"><h2 class="title">Agenda</h2></section>
        <section class="page__body container">
        <div class="event-list">
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
    <?php if ($the_query->have_posts()) :  ?>
            <h4 class="">Current</h4>
            <ul class="">
    <?php while ($the_query->have_posts()) : $the_query->the_post(); if(!$display_item) $display_item = get_the_ID(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <?php echo '<time>';
            $locations = get_field('location');                      
            if($locations) {
                foreach($locations as $location){
                    echo $location[location].'</br>'; //''
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
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <?php echo '<time>';
                                    
            $locations = get_field('location');                      
            if($locations) {
                foreach($locations as $location){
                    echo $location[location].'</br>'; //''
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
            <ul class="">
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <?php echo '<time>';
                                    
            $locations = get_field('location');                      
            if($locations) {
                foreach($locations as $location){
                    echo $location[location].'</br>'; //''
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
        </div>

        <div class="event-list right">
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
            <h4 class="">Current</h4>
            <ul class="">
    <?php while ($the_query->have_posts()) : $the_query->the_post(); if(!$display_item) $display_item = get_the_ID(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <?php echo '<time>';
                                    
            $locations = get_field('location');                      
            if($locations) {
                foreach($locations as $location){
                    echo $location[location].'</br>'; //''
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
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <?php echo '<time>';
                                    
            $locations = get_field('location');                      
            if($locations) {
                foreach($locations as $location){
                    echo $location[location].'</br>'; //''
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
            <ul class="">
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <?php echo '<time>';
                                    
            $locations = get_field('location');                      
            if($locations) {
                foreach($locations as $location){
                    echo $location[location].'</br>'; //''
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
        </div>



        <section class="event-content">
<?php
  if(!$display_item):
    $args = array(
        'post_type' => 'event',
        'post_state' => 'publish',
        'meta_key' => 'date_from',
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'posts_per_page' => 1,
        'meta_query' => array(
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
<h2><?php the_title(); ?></h2>
<?php the_content(); ?>

<?php endwhile; ?>
<?php endif; ?>      
<?php else: ?>      

<?php
    $post = get_post($display_item);
    echo "<h2>". $post->post_title ."</h2>";
    echo apply_filters('the_content', $post->post_content);;
?>

<?php endif; ?>      

        </section>



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
