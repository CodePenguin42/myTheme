<article class="post <?php if (has_post_thumbnail()) { ?> has-thumbnail <?php } ?>">

  <div class="post-thumbnail">
  <!--Feature image  -->
  <a href="<?php the_permalink (); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
  </div>

  <!--outputs the title  -->
  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

  <!-- outputs the author etc (meta information) google php date formatting or date strings for different ways to display the date-->
  <p class="post-info"><?php the_time('F jS,Y')?> | by <a href="<?php get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> | posted in
    <!--this clever bit outputs the catagories the post is tagegd with/part of.  -->
    <?php
      $categories = get_the_category();
      $separator = ",";
      $output = '';

      if ($categories) {
        foreach($categories as $category) {
          // .= allows you to append instead of overwrite $catagory is similar to this
          $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;
        }
        echo trim($output, $separator);
      }

    ?>
  </p>

<!--logic for refinements/differences between each page  -->
<?php if (is_search() OR is_archive()) { ?>
  <p>
    <?php echo get_the_excerpt(); ?>
    <a href="<?php the_permalink(); ?>">Read more &raquo;</a>
  </p>
<?php } else {
  if ($post->post_excerpt) { ?>
  <p>
    <?php echo get_the_excerpt(); ?>
    <a href="<?php the_permalink(); ?>">Read more &raquo;</a>
  </p>
  <?php } else {
    the_content();
  }
} ?>

</article>

<!--see index.php for more use on get content function, there are 9 types of posts: aside, gallery, link, image, quote, status, video, audio, and chat.  -->
