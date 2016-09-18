<?php

get_header();

if (have_posts()) :
	while (have_posts()) : the_post(); ?>

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
		<!-- the post text -->
		<?php if ($post->post_excerpt) { ?>
			<p>
				<?php echo get_the_excerpt();?>
				<a href="<?php the_permalink();?>"></a>
			</p>
			<!-- excerpts can be customised in the wordpress dashboard -->
			<!--put this in php tags to generate the content with a read more tag the_content('Continue reading &raquo;'); -->
			<!-- the_excerpt(); is a function to display the excerpt with the wordpress formatting, get_the_excerpt(); has no associated html so you have greater control -->
		<?php } else {
			the_content('Continue reading &raquo;');
		}
		?>
		<!-- If there is a manually entered excerpt display it, if not then display the full content with the read more link if it was set up on the dashboard -->


	</article>

	<?php endwhile;

	else :
		echo '<p>No content found</p>';

	endif;

get_footer();

?>
