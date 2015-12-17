<?php if (!defined('ABSPATH')) die(); ?><!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php wp_title( '&laquo;', true, 'right' ); ?> <?php bloginfo( 'name' ); ?></title>
    <meta name="description" content="<?php bloginfo( 'description' ) ?>">
    <meta name="author" content="<?php bloginfo( 'name' ); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="<?php bloginfo( "template_directory" ) ?>/img/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php bloginfo( "template_directory" ) ?>/img/apple-touch-icon.png" type="image/png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo( "template_directory" ) ?>/img/apple-touch-icon-72x72.png" type="image/png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo( "template_directory" ) ?>/img/apple-touch-icon-114x114.png" type="image/png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo( "template_directory" ) ?>/img/apple-touch-icon-144x144.png" type="image/png">

    <meta property="og:description" content="<?php OpenGraph::description() ?>">
    <meta property="og:locale" content="<?php OpenGraph::locale() ?>">
    <meta property="og:site_name" content="<?php OpenGraph::site_name() ?>">
    <meta property="og:title" content="<?php OpenGraph::title() ?>">
    <meta property="og:type" content="<?php OpenGraph::type() ?>">
    <meta property="og:image" content="<?php OpenGraph::image() ?>">
    <meta property="og:image:width" content="<?php OpenGraph::image_width() ?>">
    <meta property="og:image:height" content="<?php OpenGraph::image_height() ?>">
    <meta property="og:url" content="<?php OpenGraph::url() ?>">
    <meta property="fb:admins" content=""> <?php //todo: changeme, use graph.facebook.com/username or /userid  ?>

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a
    different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a>
    to experience this site.</p><![endif]-->

<div id="container">
    <header role="banner">
        <a href="<?php bloginfo( 'url' ) ?>" rel="home">
            <h1><?php bloginfo( 'name' ) ?></h1>
            <h2><?php bloginfo( 'description' ) ?></h2>
        </a>

    </header>

    <?php get_search_form() ?>

    <?php wp_nav_menu( array( 'container' => 'nav', 'theme_location' => 'header' ) ) ?>
