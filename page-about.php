<?php

/*
  Template Name: About
*/
add_action( 'wp_head', 'vr_set_featured_background', 99);
  function vr_set_featured_background() {
  $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), full, false );
 if ($image_url[0]) {
   ?>
     <style>
     
       html,body {
       height:100%;
       margin:0!important;
       }
       body {
       background:url(<?php echo $image_url[0]; ?>) #000 left top repeat;
       /*background-size: 100% 100%; */
       }
       /* Uncomment if the image hangs low in a Genesis theme */
       /*.site-inner {
       padding-top:0!important;
       padding-bottom:0!important;
       }*/
     </style>
   <?php
 }  //end if statement
} //end vr_set_featured_background() function
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