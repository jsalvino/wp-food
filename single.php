<?php //function to use featured image as background image
  add_action( 'wp_head', 'vr_set_featured_background', 99);
    function vr_set_featured_background() {
    $page_for_posts = get_option( 'page_for_posts' );
    $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($page_for_posts), full, false );
      if ($image_url[0]) {
         ?>
          <style>
            html,body {
                height:100%;
                margin:0!important;
              }
              body {
                background:url(<?php echo $image_url[0]; ?>) #fff center center repeat;
              }
              .wrapper {
                height: auto;
              }
          </style>
        <?php
      }  //end if statement
    } //end vr_set_featured_background() function
  // get_header();
?>
<?php get_header(); ?>

<div class="main">
  <div class="container container-blog clearfix">

    <div class="content post-content">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <section class="entry-img">
          <?php // if there is a featured image, show the image
          if ( has_post_thumbnail() ) { 
            the_post_thumbnail('original');
          } 
          ?>
        </section> <!-- /.entry-img -->

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h1 class="entry-title">&mdash;&nbsp;<?php the_title(); ?>&nbsp;&mdash;</h1>

          <div class="entry-meta">
            <?php hackeryou_posted_on(); ?>
          </div><!-- .entry-meta -->

          <div class="entry-content">
            <?php the_content(); ?>
            <?php wp_link_pages(array(
              'before' => '<div class="page-link"> Pages: ',
              'after' => '</div>'
            )); ?>
          </div><!-- .entry-content -->

          <div class="entry-utility">
            <?php hackeryou_posted_in(); ?><span class="divider">&nbsp;&nbsp;|&nbsp;&nbsp;</span><?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>
          </div><!-- .entry-utility -->
        </div><!-- #post-## -->

        <div id="nav-below" class="navigation">
          <p class="nav-previous"><?php previous_post_link('%link', '&larr; %title'); ?></p>
          <p class="nav-next"><?php next_post_link('%link', '%title &rarr;'); ?></p>
        </div><!-- #nav-below -->

        <?php comments_template( '', true ); ?>

      <?php endwhile; // end of the loop. ?>

    </div> <!-- /.content -->

    <?php get_sidebar(); ?>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>