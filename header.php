<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width">
		<title><?php bloginfo('name'); ?></title>
		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>

	<div class="container">

		<!-- site-header -->
		<header class="site-header">

			<div class="hd-search">
				<?php get_search_form();?>
			</div>

			<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			<h5><?php bloginfo('description'); ?><?php if (is_page(11)) { ?> - Get in touch soon!<?php }?></h5>

		<!--conditional content for a given page above in the h5 or could use (is_page('contact-us')) use conditional logic for suble changes not complete rebuilds-->



      <?php
        $args = array (
        'theme_location' => 'primary'
        );
      ?>

      <nav class="site-nav">
        <?php wp_nav_menu($args); ?>

      </nav>

		</header><!-- /site-header -->
