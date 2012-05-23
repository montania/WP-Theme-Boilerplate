<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"<?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"<?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"<?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"<?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description') ?>">
	<meta name="author" content="Montania System AB">

	<meta name="viewport" content="width=device-width">

	<link rel="shortcut icon" href="<?php bloginfo("template_directory") ?>/images/favicon.png" type="image/x-icon">
	<link rel="apple-touch-icon" href="<?php bloginfo("template_directory") ?>/images/apple-touch-icon.png" type="image/png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo("template_directory") ?>/images/apple-touch-icon-72x72.png" type="image/png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo("template_directory") ?>/images/apple-touch-icon-114x114.png" type="image/png">

	<meta property="og:description" content="<?php bloginfo("description") ?>">
	<meta property="og:locale" content="<?php echo str_replace("-", "_", get_bloginfo('language') ) ?>">
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
	<meta property="og:title" content="<?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?>">
	<meta property="og:type" content="<?php echo is_home() || is_front_page() ? "website" : "article" ?>">
	<meta property="og:image" content="<?php bloginfo("template_directory") ?>/images/apple-touch-icon-114x114.png">
	<meta property="og:image:width" content="114">
	<meta property="og:image:height" content="114">
	<meta property="og:url" content="http<?php if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") echo 's' ?>://<?php echo $_SERVER["SERVER_NAME"] . $_SERVER['REQUEST_URI'] ?>">
	<meta property="fb:admins" content=""> <?php //todo: changeme, use graph.facebook.com/username or /userid  ?>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

<div id="container">
	<header role="banner">
		<hgroup>
			<h1><?php bloginfo('name') ?></h1>
			<h2><?php bloginfo('description') ?></h2>
		</hgroup>
	</header>