<?php

get_header(); ?>

// display posts if have any
<div class="site-content clearfix">
	<div class="main-column">

<?php if (have_posts()) :
	while (have_posts()) : the_post();

	get_template_part('content','page');

 endwhile;

	else :
		echo '<p>No content found</p>';

	endif; ?>

	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer();

?>
