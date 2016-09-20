<!--can combine static and dynamic content. So you can have a static landing page or jumbotron then a dynamic section below adding content dynamically  -->
<!-- currently wp uses the url as the query in the loop, e.g. on the author page the authors posts are looped through-->
<?php

get_header(); ?>

<!--display posts if have any-->
<div class="site-content clearfix">

	<h3>Non dynamic content</h3>

<?php if (have_posts()) :
	while (have_posts()) : the_post();

	the_content();
	// can easily add in content from the dashboard

 endwhile;

	else :
		echo '<p>No content found</p>';

	endif; ?>

	<h4>more non dynamic content</h4>


<!--put a clearfix named div here, encaps the posts with wp_query in a same named div, paddilg on the right will apply to all divs except the last, use last selector to remove it  -->
<div class="frontpage-container clearfix">

<?php
	//demo query posts loop
$demoPosts = new WP_Query('cat=4&posts_per_page=2');
	// the cat id is in the wordpress dashboard in the url in the relevant section
	//posts per page is in chronological orser so the newest are shown
	//&orderby=title, reverse alphabetical
	//use &order=ascending to have in alphabetical order
	//&orderby=rand, pulls in random posts

	if ($demoPosts->have_posts ()) :
		while ($demoPosts->have_posts()) : $demoPosts->the_post(); ?>
			<div class="frontpage-article">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php the_excerpt(); ?>
			</div>
		<?php endwhile;
	else:
		echo '<h3>No content found</h3>';
	endif;
	wp_reset_postdata();
	//prevents this loop from disrupting the url based queries
?>
</div>
</div><!--site content-->

<?php get_footer();

?>
