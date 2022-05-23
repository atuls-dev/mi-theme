<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title(); ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <?php wp_head(); ?>
    </head>
   <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page">
        <header class="site-header">
            <div class="header-top">
                <?php if ( has_custom_logo() ) : ?>
                	<div class="site-logo"><?php the_custom_logo(); ?></div>
                <?php endif; ?>
                <div class="header-search">
                    <?php get_search_form(); ?>
                    
                </div>
            </div>
            <div class="header-bottom">
                <div class='site-nav'>
                    <?php
                    wp_nav_menu( array( 
                        'theme_location' => 'primary', 
                        'container_class' => 'primary-nav-menu' ) ); 
                    ?>
                </div>
            </div>
        </header>
        <div id="content" class="site-content">
       