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
    <div class="content">

      <?php
      	/* Queue the first post, that way we know who
      	 * the author is when we try to get their name,
      	 * URL, description, avatar, etc.
      	 */
      	if ( have_posts() )
      		the_post();
      ?>

      <h1>Author Archives:
        <a class="name" href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>">
          <?php the_author(); ?>
        </a>
      </h1>

      <?php
      	// If a user has filled out their description, show a bio on their entries.
      	if ( get_the_author_meta('description') ) : ?>

          <h2>About <?php the_author(); ?> </h2>
      		<?php echo get_avatar( get_the_author_meta('user_email'), 60); ?>
      		<?php the_author_meta('description'); ?>

        <?php endif; ?>

      	<?php
      		rewind_posts();
      		get_template_part('loop', 'author');
      	?>
    </div> <!-- /.content -->

    <?php get_sidebar(); ?>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>