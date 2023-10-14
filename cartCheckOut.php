<?php
/*

  Template Name: Cart Custom CheckOut

  Template Name: Full-width

  Template Post Type: post, page, product

*/

get_header();
?>

<div class="superContainerCheckOut">

  <h1 class="entry-title"><?php the_title(); ?></h1>

  <div class="containerCheckOut">
    <div class="subContainerCheckOut">
      <?php the_content(); ?>
    </div>
  </div>

</div>

<?php get_footer();
