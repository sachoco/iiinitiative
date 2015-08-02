<?php include('header.php') ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<section class="background">
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
</section>
<div class="viewport">
	<div class="overlay--left"></div>
	<div class="overlay--right"></div>

	<section class="page--single">
        <section class="page__header"><h2 class="title"><?php the_title(); ?></h2></section>
        <section class="page__body container">
            <?php the_content(); ?>

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
