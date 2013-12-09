<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='//fonts.googleapis.com/css?family=Bitter:400,400italic|Open+Sans:400italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div id="masthead-inner" class="uk-container uk-container-center uk-clearfix">
			<h1 class="site-title uk-float-left"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<div id="site-search" class="uk-float-right uk-hidden-small"><?php get_search_form(); ?></div>
		</div>
	</header>

	<nav class="pri-nav uk-hidden-small" role="navigation">
		<div class="inner">
			<a class="skip-link screen-reader-text uk-hidden" href="#content"><?php _e( 'Skip to content', 'conquest' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => false, 'menu_class' => 'uk-container uk-container-center uk-clearfix' ) ); ?>
		</div>
	</nav><!-- #site-navigation -->

	<nav id="mobile-nav" class="uk-visible-small">
		<ul class="menu">
			<li><a href="#">Menu</a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => false, 'menu_class' => '' ) ); ?>
			</li>
		</ul>
	</nav>

	<div id="section-head">
		<div class="uk-container uk-container-center uk-clearfix">
			<h1 id="section-name" class="uk-float-left uk-hidden-small">News</h1>
			<div class="ad-block uk-float-right">
				<img src="http://www.dummyimage.com/660x66/1B1E25/fff">
			</div>
		</div>
	</div>

	<div id="content" class="uk-container uk-container-center">
		<div id="content-inner">

