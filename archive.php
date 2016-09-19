<?php

get_header();

// new code for archive page, with logic for each type of archive
?>

<div class="site-content clearfix">

  <div class="main-column">

    <?php
      if (habe_posts()) : ?>

      <h2><?php

  if (is_category() ) {
    single_cat_title(); //outputs catagory title
  } elseif (is_tag () ) {
    single_tag_title(); //outputs tag title
  } elseif (is_author() ) {
    the_post(); //selects the first post
    echo 'Author Archives: ' . get_the_author();
    rewind_posts(); //undoes the first post selection
  } elseif (is_day() ) {
    echo 'Daily Archives: ' . get_the_date();
  } elseif (is_month() ) {
    echo 'Monthly Archives: ' . get_the_date('F Y');
  } elseif (is_year () ) {
    echo 'Yearly Archives: ' . get_the_date('Y');
  } else {
    echo 'Archives';
  }

  //to learn more about the F Y google php date

?></h2>

<?php

	while (have_posts()) : the_post();

	  get_template_part('content', get_post_format());

	endwhile;

	else :
		echo '<p>No content found</p>';

	endif; ?>

</div><!--main column-->

  <?php get_sidebar (); ?>

</div> <!--end of site content-->

<?php get_footer();

?>
