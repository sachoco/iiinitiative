<?php include('header.php') ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="viewport">
	<div class="overlay--left"></div>
	<div class="overlay--right"></div>

	<section class="page--single work">
        <section class="page__header"><h2 class="title">Work</h2></section>
        <section class="page__body container">
        <div class="wrapper">
            <h1 class="title"><?php the_title(); ?></h1>
<!--             <div class="image">
                <?php the_post_thumbnail(""); ?>
            </div> -->
            <div class="details">
            


                <p>
                        
                        
                    <?php // related artists
                                        
                                $id=get_the_ID();
                                //echo $id.' ';
                                //$related_artist_pages_ids = array();
                                unset($related_artist_pages_ids);
                                $related_artist_pages_ids = rpt_get_object_relation($id, 'artist');
                                //echo print_r($related_artist_pages_ids).' ';
                                //echo count($related_artist_pages_ids).' ';
                                if ( count($related_artist_pages_ids) >= 1 ) {
                                    $related_artist_pages = query_posts( array(
                                        'post_type' => 'artist',
                                        'post_status' => 'publish',
                                        'posts_per_page' => -1,
                                        'post__in' => $related_artist_pages_ids,
                                        'orderby' => 'post_date',
                                        'order' => 'DESC'
                                    ) );
                                   //echo print_r($related_artist_pages).' ';
                                   foreach ( $related_artist_pages as $artist_post ) {
                                       //echo get_the_title($artist_post).'<br />';
                                       echo '<a href="'.get_permalink($artist_post).'">'.get_the_title($artist_post).'</a><br />';
                                   } 
                                //unset($related_artist_pages_ids);
                                //$related_artist_pages_ids = array();
                                //echo count($related_artist_pages_ids);
                                wp_reset_query();
                                }                        
                            ?>  
                        
                        
                </p>
                
                
                
                <?php
                    //$args='';
                    $artists = rwmb_meta( 'work_artists');
                    foreach($artists as $artist){
                        echo "<p>".$artist."</p>";
                     }  
                 ?>   
                    
                
                <?php   
                $date=get_post_meta(get_the_ID(), '_date', TRUE);
                if( ! empty( $date ) ) {    
                                echo $date.'<br />';
                    }
                ?>
                </p>
                
            </div>
            <div class="text">
                <?php the_content(); ?>
            </div>
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
