<?php 
    require_once("include/Mobile_Detect.php");
    $detect = new Mobile_Detect;
    $is_mobile = false;
    if ( $detect->isMobile() && !$detect->isIpad() )  $is_mobile = ture;
?>  
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
    <div class="overlay"></div>
</section>
<div class="viewport">
<?php if(!$is_mobile): ?>
	<div class="overlay overlay--left"></div>
	<div class="overlay overlay--right"></div>
<?php endif; ?> 

	<section class="dummy">
<!--         <div class="intro">
            <svg x="0px" y="0px" width="120px" height="152px" viewBox="0 0 120 152">
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
iii is an artist run platform for the development of self-made media based in The Hague which supports idiosyncratic research trajectories that zigzag between disciplines and distribution channels.           </p>
        </div>   -->
	</section>
<?php if(!$is_mobile): ?>
	<div class="section-wrap">

        <section class="page home">
            <section class="page__header"><!-- <h2 class="title"><?php the_title(); ?></h2> --></section>
            <section class="page__body container">


            </section>
        </section>
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
            <section class="page__header"><!-- <h2 class="title"><?php the_title(); ?></h2> --></section>
            <section class="page__body container">
                <?php the_content(); ?>


            </section>
        </section>

<?php
		endwhile;
	endif;
    wp_reset_postdata();

?>

	</div>
<?php endif; ?>	
</div>

<section class="main">
    <div class="wrap">
        <?php the_content(); ?>        
    </div>

</section>

<?php endwhile; ?>
<?php endif; ?>


<?php include('footer.php') ?>
