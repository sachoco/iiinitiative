<?php include('header.php') ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
	<div class="overlay--left"></div>
	<div class="overlay--right"></div>

	<section class="page--single">
        <section class="page__header"><h2 class="title"><?php the_title(); ?></h2></section>
        <section class="page__body container">
            <?php the_content(); ?>

            <div class="details details--artist">
            
                <p>
                    <?php 
                        $url=get_post_meta(get_the_ID(), '_url', TRUE);
                        if( ! empty( $url ) ) { 
                            echo '<a href="http://'.$url.'" target="_blank">'.$url.'</a><br />';
                        }
                        $email=get_post_meta(get_the_ID(), '_email', TRUE);
                        if( ! empty( $email ) ) {   
                            echo '<a href="mailto:'.$email.'">'.$email.'</a>';
                        } 
                    ?>
                </p>
            </div>

        <?php       ///////// Find related works ///////////
            
            $post_id=get_the_ID();
            unset($related_works_ids);
            //echo gettype($related_works_ids).' ';
            //  print_r($related_works_ids);
            $related_works_ids = rpt_get_object_relation($post_id, 'work');
            /*echo '<pre>';
            print_r($related_works_ids);
            echo '</pre>';
            */
            //echo gettype($related_works_ids);         
             //echo ($related_pages_ids);
            if ( is_array($related_works_ids) ) :
                $related_works = get_posts( array(
                    'post_type' => 'work',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'post__in' => $related_works_ids,
                    'orderby' => 'title',
                    'order' => 'ASC'
                ) );
            ?>
            
            <div class="worksby">
                
                <div class="details">
                    <h2>Works by <?php the_title(); ?></h2>
                </div>
                <ul class="view--grid vc_row wpb_row vc_row-fluid">
                <?php foreach ( $related_works as $post ) : ?>
                    <li class="wpb_column vc_column_container vc_col-sm-4">
                    <a class="thumbnail" href="<?php echo get_permalink($post); ?>"><?php //echo get_the_title($post);?>
    
                    <?php
                        if ( '' != get_the_post_thumbnail($post->ID)) { // check if the post has a Post Thumbnail assigned to it.
                            echo get_the_post_thumbnail($post->ID, 'work-thumb');
                            //echo "has thumb";
                        } else {
                            //echo "has no thumb";
                        }       
                    ?>
    
                    <div class="teaser__details__wrapper">
                        <div class="teaser__details">
                            <div class="teaser__details__content">
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
                                        }                        
                                     ?>
                                 
                                     <?php // other artists
                        
                                        $artists = rwmb_meta( 'work_artists');
                                        // foreach($artists as $artist){
                                        //     echo $artist."<br />";
                                        // }   
                                    ?>   
                        
                                </p>
                         
<!--                                 <p class="teaser__year">
                                    <?php $date=get_post_meta($post->ID, '_date', TRUE);
                                        if( ! empty( $date ) ) {    
                                            echo $date;
                                        } 
                                    ?>
                                </p> -->
                            </div>
                        </div>
                    </div>
            
                    </a>
                    </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
    <?php 

        endif; 
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

<?php endwhile; ?>
<?php endif; ?>


<?php include('footer.php') ?>
