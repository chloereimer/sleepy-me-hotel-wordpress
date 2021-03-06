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

// customize copyright text
add_filter( 'genesis_footer_creds_text', 'sp_footer_creds_text' );
function sp_footer_creds_text() {
  echo '<div class="name">Sleepy-Me Hotel ' . date('Y') . '</div>';
  echo '<div class="address">237 Redrum Road, Jacktown, CO &middot; Tel: 1 (555) 555-5555 &middot; Fax: 1 (555) 555-5555</div>';
  echo '<div class="email"><a href="mailto:test@example.com">reservation@sleepymehotel.com</a></div>';
}

// remove edit link from pages
add_filter ( 'genesis_edit_post_link' , '__return_false' );

add_action( 'genesis_after_sidebar_widget_area', 'sleepy_me_admin_login' );
function sleepy_me_admin_login(){
  echo '<div class="admin-widget">';
  echo '<h1>Admin</h1>';
  if ( is_user_logged_in() ){
    global $current_user;
    get_currentuserinfo();
    echo 'Logged in as ' . $current_user->user_login;
    echo ' &middot; ';
    echo '<a href="' . wp_logout_url( home_url() ) . '">Logout</a>';
  } else {
    echo '<a href="' . admin_url() . '">Login</a>';
  }
  echo '</div>';
}
