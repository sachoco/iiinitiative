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
        <ul class="view--grid isotope">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <li class="grid-3 grid-mobile-12 grid-sm-6 grid-md-4 grid-lg-3 grid-xl-2">
        <?php if (has_post_thumbnail()): ?>
            <a class="thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail("artist-thumb"); ?></a>
        <?php endif; ?>
            <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
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
    
</div>

<!-- <section class="main">
    <div class="wrap">
        <?php //the_content(); ?>        
    </div>
</section> -->




<?php include('footer.php') ?>
