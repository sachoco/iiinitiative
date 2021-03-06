<?php include('header.php') ?>

<!-- <div class="viewport"> -->
<!-- 	<div class="overlay--left"></div>
	<div class="overlay--right"></div> -->

	<section class="page--single">
        <section class="page__header"><h2 class="title">News</h2></section>
        <section class="page__body container">
        <div class="press-list hide-on-mobile">
            <h3 class="">News Archive</h3>
            <ul class="iii-readmore">
          <?php
            $args = array(
                'post_type' => 'post',
                'post_state' => 'publish',
                'posts_per_page' => -1,
                'category_name' => 'uncategorized'
            );

            $the_query = new WP_Query( $args );
        ?>
<?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>

            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <?php echo '<time>';
            the_date();

            echo '</time>';
    ?>
            </li>
<?php endwhile; ?>
<?php endif; ?>
            </ul>
        </div>

        <section class="press-content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<h2><?php the_title(); ?></h2>
<div class="text">
<?php the_content(); ?>
</div>

<?php endwhile; ?>
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

<!-- </div> -->

<!-- <section class="main">
    <div class="wrap">
        <?php //the_content(); ?>
    </div>
</section> -->




<?php include('footer.php') ?>
