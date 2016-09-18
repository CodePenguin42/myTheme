<?php

/*Template Name: Special Layout*/
/*the above code registers the template page with wordpress*/
get_header();

if (have_posts()) :
	while (have_posts()) : the_post(); ?>

	<article class="post page clearfix">
		<h2><?php the_title(); ?></h2>

		<div class="info-box">
			<h4>Disclaimer Title</h4>
			<p>Lorem lollypops I make no excuses for the spelling mistakes.</p>
		</div>

		<?php the_content(); ?>
	</article>

	<?php endwhile;

	else :
		echo '<p>No content found</p>';

	endif;

get_footer();

?>
