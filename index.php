<?php

get_header();

if (have_posts()) :
	while (have_posts()) : the_post();

	get_template_part('content', get_post_format());
	// first parameter is the slug (name) of the file the function is loking for, the second parameter is an extension of that name e.g. get_template_part('content','home'); looks for the file content-home.php.
	// get_template_part('content', get_post_format()); - allows you to uniqly format each post, as the funciton looks for formatting based on the type of post. SUPER COOL
	// Also need to update search.php, single.php and, archive.php so that when people search, view an archive or an individual article the correct post formatting is used.

	endwhile;

	else :
		echo '<p>No content found</p>';

	endif;

get_footer();

?>
