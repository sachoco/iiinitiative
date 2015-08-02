<?php include('header.php') ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<section class="background">
    <ul class="rslides">
<?php 
    $slides = get_field("slideshow");
    if($slides){
        foreach($slides as $slide){
            echo '<li><img src="'. $slide['url'] .'" alt=""></li>';

        }
    }
?>
    </ul>
</section>
<div class="viewport">
	<div class="overlay--left"></div>
	<div class="overlay--right"></div>

	<section class="home">
        <div class="intro">
           <!--  <svg x="0px" y="0px" width="120px" height="152px" viewBox="0 0 120 152">
                <g>
                    <ellipse fill="#FFFFFF" cx="18.235" cy="14.702" rx="10.875" ry="8.891"/>
                    <ellipse fill="#FFFFFF" cx="59.235" cy="14.702" rx="10.875" ry="8.891"/>
                    <ellipse fill="#FFFFFF" cx="100.235" cy="14.702" rx="10.875" ry="8.891"/>
                    <polygon fill="#FFFFFF" points="9,56 9,144 27,144 27,51 21,51   "/>
                    <polygon fill="#FFFFFF" points="50,56 50,144 68,144 68,51 62,51     "/>
                    <polygon fill="#FFFFFF" points="92,56 92,144 110,144 110,51 104,51  "/>
                </g>
            </svg>
            <p class="h3">image, sound, space and the body</p>
            <p>
iii is an artist run platform for the development of self-made media based in The Hague which supports idiosyncratic research trajectories that zigzag between disciplines and distribution channels.           </p> -->
        </div>  
	</section>

	<div class="section-wrap">

<?php
    $args = array(
      'post_type' => 'page',
      'post_status' => 'publish',
      'post_parent' => 65,
      'orderby' => 'menu_order',
      'order'   => 'ASC',
      'posts_per_page' => -1
    );
    $the_query = new WP_Query( $args );
    $col_count = 1;
    
    if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post();
        $dateformatstring = "D d F, Y";
?>
        <section class="page">
            <section class="page__header"><h2 class="title"><?php the_title(); ?></h2></section>
            <section class="page__body container">
                <?php the_content(); ?>
<!--                 <div class="col grid-5">
                    <article>
                        <h3>iii @ Awesome Festival</h3>
                        <img class="featured_image" src="<?php echo bloginfo('template_url'); ?>/images/small/Cinechine_01.jpg" alt="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, soluta non minus possimus expedita voluptatibus, voluptate qui tempore. Reiciendis nostrum vel eaque ipsam culpa laboriosam labore ab necessitatibus nobis expedita.</p>
                        <img class="featured_image" src="<?php echo bloginfo('template_url'); ?>/images/small/Echo_Moire_FE_01.jpg" alt="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, soluta non minus possimus expedita voluptatibus, voluptate qui tempore. Reiciendis nostrum vel eaque ipsam culpa laboriosam labore ab necessitatibus nobis expedita.</p>                      
                    </article>
                </div>
                <div class="col grid-7">
                    <article>
                        <h3>iii @ Awesome Festival</h3>
                        <img class="align-left" style="max-width: 400px" src="<?php echo bloginfo('template_url'); ?>/images/small/Cinechine_01.jpg" alt="">
                        <p>
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta eos dolorum culpa aliquam impedit aut quo sed? Doloribus doloremque sed quas eius, laborum ab a earum. Enim fuga, illum a?</span>
                            <span>Sapiente, tenetur! Earum doloribus, sed fugiat et laborum pariatur! Ducimus unde, pariatur provident, necessitatibus fugiat, molestias illo officiis cumque quod repellat aperiam deserunt a, officia sequi voluptatibus temporibus omnis error!</span>
                            <span>Sed quis culpa provident, accusamus deserunt. Vel dignissimos deleniti ipsam quo eveniet doloribus maiores esse neque adipisci, dolores eius eaque illum nemo excepturi est libero! Voluptatum id accusamus, culpa commodi.</span>
                            <span>Ducimus, dolorum, officia. Non velit, laborum numquam molestiae debitis, rerum magni quas saepe illo consequatur modi ipsum, voluptatem, adipisci ipsa. Unde labore fugiat numquam, assumenda magni eaque officia repellat laborum.</span>
                            <span>Exercitationem dolore veniam voluptates sed dolorum commodi iure totam placeat eos odio similique quam consectetur laborum ab sit culpa magnam, quo accusantium labore quidem debitis ad necessitatibus cupiditate. Corporis, quaerat?</span>
                            <span>Laudantium optio quae dolorem sed sapiente blanditiis quas quidem? Et possimus harum ipsam, quis tenetur dolorem esse dolores dolor laborum. Unde vitae, atque provident ratione, suscipit temporibus sit nulla voluptate.</span>
                            <span>Dolorum blanditiis ratione, dolorem. Quasi repellendus aspernatur debitis, omnis quis quaerat rerum tempore ratione ullam modi eum. Asperiores accusantium maxime harum quibusdam itaque, similique nam porro nihil, ipsam tempora veniam!</span>
                        </p>
                    </article>
                    <article>
                        <h3>iii @ Awesome Festival</h3>
                        <img class="featured_image" src="<?php echo bloginfo('template_url'); ?>/images/small/CitySondolsToronto_airport.jpg" alt="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, soluta non minus possimus expedita voluptatibus, voluptate qui tempore. Reiciendis nostrum vel eaque ipsam culpa laboriosam labore ab necessitatibus nobis expedita.</p>
                    </article>
                </div> -->

            </section>
        </section>

<?php
		endwhile;
	endif;
    wp_reset_postdata();

?>

	</div>
	
</div>

<section class="main">
    <div class="wrap">
        <?php the_content(); ?>        
    </div>

</section>

<?php endwhile; ?>
<?php endif; ?>


<?php include('footer.php') ?>
