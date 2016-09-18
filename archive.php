<?php

get_header();

// new code for archive page, with logic for each type of archive
?>

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

if (have_posts()) :
	while (have_posts()) : the_post(); ?>

	<article class="post">
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


		<?php the_excerpt(); ?> <!--can just display the excerpt with the function the_excerpt();, or the content with the_content(); -->
	</article>

	<?php endwhile;

	else :
		echo '<p>No content found</p>';

	endif;

get_footer();

?>
