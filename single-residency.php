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
<!-- <div class="viewport"> -->

	<section class="page--single residency">
        <section class="page__header"><h2 class="title">Residency</h2></section>
        <section class="page__body container">
            <div class="wrapper">
                <h1 class="title"><?php the_title(); ?></h1>
                <div class="image">
                <?php the_post_thumbnail(""); ?>
                </div>
                <div class="text">
                <?php the_content(); ?>
                </div>
            </div>

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

<?php endwhile; ?>
<?php endif; ?>


<?php include('footer.php') ?>
