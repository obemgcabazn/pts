<?php get_header(); ?>
<div class="col-md-9">
  <main>
    <?php 
      if (have_posts()):
        while (have_posts()) : the_post();
          the_content();
        endwhile;
      endif;
    ?>
  </main>
</div>
<?php get_footer(); ?>
