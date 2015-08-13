<?php

/*
  Template Name: Home
*/

get_header();  ?>

<div class="main main-home">
  <div class="container">

    <?php // Start the loop ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

  <?php /* commenting out title
      <h2><?php the_title(); ?></h2>
  */ ?>

      <div><?php the_content(); ?></div>

    <?php endwhile; // end the loop?>
  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>