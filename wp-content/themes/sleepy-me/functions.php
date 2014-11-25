<?php

// init genesis
include_once( get_template_directory() . '/lib/init.php' );

// configure child theme
define( 'CHILD_THEME_NAME', 'Sleepy-Me Hotel' );
define( 'CHILD_THEME_URL', 'http://www.mohawkcollege.ca/' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

// add google fonts
add_action( 'wp_enqueue_scripts', 'sleepy_me_google_fonts' );
function sleepy_me_google_fonts() {
  wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Merriweather:400,400italic,700,700italic,300,300italic,900,900italic', array(), CHILD_THEME_VERSION );
}

// support html5
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

// add responsive viewport tag
add_theme_support( 'genesis-responsive-viewport' );

// support 3 column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );
