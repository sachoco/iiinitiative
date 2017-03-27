<?php include('header.php') ?>

    <section class="page--single">
        <section class="page__header"><h2 class="title"><?php post_type_archive_title(); ?></h2></section>
        <section class="page__body container">

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
                </p>
            </div>
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
    






<?php include('footer.php') ?>
