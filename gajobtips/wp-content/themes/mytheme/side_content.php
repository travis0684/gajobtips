<div class="jumbotron" style="padding:10px;;">
<h2>News Feed</h2>
<div class="page-header">
<?php if (have_posts()) : ?>

  <?php if (($wp_query->post_count) > 1) : ?>
     <?php while (have_posts()) : the_post(); ?>
       <!-- Do your post header stuff here for excerpts-->
          <?php the_excerpt() ?>
       <!-- Do your post footer stuff here for excerpts-->
     <?php endwhile; ?>

  <?php else : ?>

     <?php while (have_posts()) : the_post(); ?>
       <!-- Do your post header stuff here for single post-->
          <?php the_content() ?>
       <!-- Do your post footer stuff here for single post-->
     <?php endwhile; ?>

  <?php endif; ?>

<?php else : ?>
     <!-- Stuff to do if there are no posts-->

<?php endif; ?>

<h4>Example page header <small>Subtext for header</small></h4>
<hr>
</div><!-- /page-header -->
</div><!-- /well -->