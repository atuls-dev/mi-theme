<?php

/*
 * Registering custom logo support in theme
 */
function mi_theme_custom_logo_setup() {
 $defaults = array(
 'height'      => 100,
 'width'       => 400,
 'flex-height' => true,
 'flex-width'  => true,
 'header-text' => array( 'site-title', 'site-description' ),
'unlink-homepage-logo' => true, 
 );
 add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'mi_theme_custom_logo_setup' );

/*
 * Registering Menu Theme Support 
 */
function wpb_custom_new_menu() {
  register_nav_menus(
    array(
      'primary' => __( 'Primary Menu' ),
      'secondary' => __( 'Secondary Menu' )
    )
  );
}
add_action( 'init', 'wpb_custom_new_menu' );

/*
 * Enqueing standard scripts
 */
function mi_theme_scripts() {
    wp_enqueue_style( 'mi-theme-style', get_template_directory_uri() . '/style.css', array());
}
add_action( 'wp_enqueue_scripts', 'mi_theme_scripts' );


/*
 * Registering widget
 */	
function mi_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'mi_theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar area.', 'mi_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'mi_widgets_init' );


// Theme Options Settings
require get_template_directory() . '/inc/theme-setting-functions.php';