<?php

function learningWordPress_resources() {

	wp_enqueue_style('style', get_stylesheet_uri());

}

add_action('wp_enqueue_scripts', 'learningWordPress_resources');

// get top ancestor
function get_top_ancestor_id() {

		global $post;

	if ($post->post_parent) {
		$ancestors = array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];
	}
	return $post->ID;
}

// does page have children function
function has_children() {
	global $post;

	$pages = get_pages('child_of='. $post->ID);
	return count($pages);
	// if count returns zero, the child menu function if statement will be false and no child menu will be displayed, if it's a number -> true
}

// controlling the excerpt word count word length
function custom_excerpt_length() {
	return 75;
}

add_filter('excerpt_length','custom_excerpt_length');
// this adds on the custom filter

//contains all the setup functions, menus, feature images etc
function learningWordPress_setup() {

	// add featured image support
	add_theme_support('post-thumbnails');

	//create shortcut names for standard image sizes
	add_image_size('small-thumbnail',180,120,true);
	add_image_size('banner-image',920,210,array('left', 'top'));
	// adding the array allows you to control what parts of the images are cropped and which arent, find code snippets to regen thumbnail, leave in place only for development

	//navigation menus
	register_nav_menus(array(
		'primary' => __('Primary Menu'),
		'footer' => __('Footer Menu'),
	));

	// Add post format support, modules created are on dashboard under post
	add_theme_support('post-formats', array('aside', 'gallery', 'link'));

}

// remember to register the new function!! Twit..
add_action('after_setup_theme', 'learningWordPress_setup');


// add the widget locations
function ourWidgetsInit() {
	register_sidebar( array(
		'name' => 'Sidebar', //this is the name used in the admin, human friendly name
		'id' => 'sidebar1', //this is the computer friendly name
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		// before and after adds the html div so that it can be styled, and removes the bullet point on the title
		'before_title' => '<h4 class="my-special-class">',
		'after_title' => '</h4>'
		// styling the title
	));

	register_sidebar(array(
		'name' => 'Footer Area 1',
		'id' => 'footer1'
	));

	register_sidebar(array(
		'name' => 'Footer Area 2',
		'id' => 'footer2'
	));

	register_sidebar(array(
		'name' => 'Footer Area 3',
		'id' => 'footer3'
	));

	register_sidebar(array(
		'name' => 'Footer Area 4',
		'id' => 'footer4'
	));
// can put widgets anywhere, just create a location and add it with the register_sidebar function

}

// ensures the function fires at the right time
add_action('widgets_init', 'ourWidgetsInit');

?>
