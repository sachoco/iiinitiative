<?php include('header.php') ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


	<section class="page--single work">
        <section class="page__header"><h2 class="title">Commission</h2></section>
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





                <?php
                    //$args='';
                    $artists = rwmb_meta( 'commission_artists');
                    foreach($artists as $artist){
                        echo $artist."<br />";
                     }
                 ?>
               </p>
                <p>
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

        <?php       ///////// Find related commissions ///////////

            if( count($related_artist_pages_ids)>0 ):
                $related_commissions_ids = array();
                foreach($related_artist_pages_ids as $post_id):
                    $related_commissions_ids = array_merge($related_commissions_ids, rpt_get_object_relation($post_id, 'commission'));
                endforeach;
            endif;
                    // $related_commissions_ids = rpt_get_object_relation($post_id, 'commission');
            if(($key = array_search($id, $related_commissions_ids)) !== false) {
                unset($related_commissions_ids[$key]);
            }
            // var_dump($id);

            if ( count($related_commissions_ids)>0 ) :
                $related_commissions = get_posts( array(
                    'post_type' => 'commission',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'post__in' => $related_commissions_ids,
                    'orderby' => 'title',
                    'order' => 'ASC'
                ) );
            ?>

            <div class="worksby">

                <div class="details">
                    <h2>Other commissions by
                    <?php
                        $i = 0;
                        foreach ( $related_artist_pages as $artist_post ) {
                           //echo get_the_title($artist_post).'<br />';
                            if($i>0) echo ", ";
                           echo '<a href="'.get_permalink($artist_post).'">'.get_the_title($artist_post).'</a>';
                           $i++;
                       }
                    ?>
                    </h2>
                </div>
                <ul class="view--grid">
                <?php foreach ( $related_commissions as $post ) : ?>
                    <li class="grid-4 grid-mobile-12 grid-sm-6 grid-md-4 grid-xl-3">
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

                             <?php  //////////// Find related artists of related commission //////////////

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

                                $artists = rwmb_meta( 'commission_artists');
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
    <?php

        endif;
    ?>

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
