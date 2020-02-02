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
<!-- <div class="viewport">
 -->
    <section class="page--single">
        <section class="page__header"><h2 class="title"><?php post_type_archive_title(); ?></h2></section>
        <section class="page__body container">
          <?php
          $args = array(
          'name'        => 'productions-description',
          'post_type'   => 'page',
          'post_status' => 'publish',
          'numberposts' => 1
          );
          $description = get_posts($args);
          if( $description ) :
          // echo $description[0]->post_content;
          endif;
           ?>
<!--         <div class="sort">
            <p>
                Order:
               <button class="button" data-sort-by="date">chronologic</button> | <button class="button" data-sort-by="name">alphabetical</button>
            </p>
        </div> -->
        <?php
            $args = array(
                'post_type' => 'production',
                'post_state' => 'publish',
                // 'meta_key' => 'date_from',
                // 'orderby' => 'meta_value_num',
                // 'order' => 'ASC',
                'posts_per_page' => -1,
                'tax_query' =>
                    array(
                        array(
                            'taxonomy' => 'production_category',
                            'field'    => 'slug',
                            'terms' => 'ongoing-series',
                        ),
                    )
            );

            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
        ?>
        <h3 class="grid-12">Ongoing Series</h3>
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
                <p>
                <?php
                    $excerpt = get_the_excerpt();
                    $excerpt .= ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . "[&hellip;]" . '</a>';
                    echo wpautop( $excerpt);
                ?>
                <?php //the_excerpt(); ?>
                </p>
            </div>
        </li>

        <?php endwhile; ?>
        </ul>

        <?php
            endif;
            wp_reset_postdata();
        ?>
        <?php
            $args = array(
                'post_type' => 'production',
                'post_state' => 'publish',
                // 'meta_key' => 'date_from',
                // 'orderby' => 'meta_value_num',
                // 'order' => 'ASC',
                'posts_per_page' => -1,
                'tax_query' =>
                    array(
                        array(
                            'taxonomy' => 'production_category',
                            'field'    => 'slug',
                            'terms' => 'past-productions',
                        ),
                    )
            );

            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
        ?>
        <h3 class="grid-12">Past Productions</h3>
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
                <p>
                <?php
                    $excerpt = get_the_excerpt();
                    $excerpt .= ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . "[&hellip;]" . '</a>';
                    echo wpautop( $excerpt);
                ?>
                <?php //the_excerpt(); ?>
                </p>
            </div>
        </li>

        <?php endwhile; ?>
        </ul>

        <?php
            endif;
            wp_reset_postdata();
        ?>
<!--

        <ul class="view--list">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php //remove_filter('the_excerpt', 'wpautop'); ?>

        <li class="grid-12 parent grid-mobile-12 ">
            <div class="grid-5 align-left">
        <?php if (has_post_thumbnail()): ?>
                <a class="thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail("work-thumb"); ?></a>
        <?php endif; ?>
            </div>
            <div class="grid-7 align-left">
                <a href="<?php the_permalink(); ?>"><h2 class="name"><?php the_title(); ?></h2></a>
                <p>
                <?php
                    $excerpt = get_the_excerpt();
                    $excerpt .= ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . "[&hellip;]" . '</a>';
                    echo wpautop( $excerpt);
                ?>
                <?php //the_excerpt(); ?>
                </p>
            </div>
        </li>

<?php endwhile; ?>
<?php endif; ?>
        </ul> -->
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

<!-- </div>
 -->
<!-- <section class="main">
    <div class="wrap">
        <?php //the_content(); ?>
    </div>
</section> -->




<?php include('footer.php') ?>
