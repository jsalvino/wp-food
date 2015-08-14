<?php

/*
	Template Name: Menu
*/

get_header();  ?>

<div class="main main-food-menu">
  <div class="container">

    <?php // Start the loop ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<?php /* commenting out title
      <h2><?php the_title(); ?></h2>
	*/ ?>

      <?php get_sidebar( 'food-menu1' ); ?>

      <?php get_sidebar( 'food-menu2' ); ?>

      <?php get_sidebar( 'food-menu3' ); ?>

      <?php the_content(); ?>

    <?php endwhile; // end the loop?>
  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>