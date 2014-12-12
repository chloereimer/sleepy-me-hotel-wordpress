<?php defined('ABSPATH') or die("No direct access.");

/**
 * Plugin Name: Search Query Logger
 * Version: 1.0.0
 * Author: Chloe Reimer
 */

// activation/deactivation hooks
register_activation_hook( __FILE__, 'logger_install' );
register_deactivation_hook( __FILE__, 'logger_uninstall' );

// operational hooks
add_action( 'pre_get_posts', 'logger_log_query' );

// activation procedure
function logger_install() {

  global $wpdb;
  $table_name = $wpdb->prefix . "search_query_logs";

  // drop the table in the event it exists
  $wpdb->query("DROP TABLE IF EXISTS $table_name");

  // create the table
  $charset_collate = $wpdb->get_charset_collate();
  $sql = "CREATE TABLE $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    search_term varchar(256) DEFAULT '' NOT NULL,
    time_stamp datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
    ip_address varchar(15) DEFAULT '' NOT NULL,
    UNIQUE KEY id (id)
  ) $charset_collate;";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

  dbDelta( $sql );
  
}

// deactivation procedure
function logger_uninstall(){

  global $wpdb;
  $table_name = $wpdb->prefix . "search_query_logs"; 
  $wpdb->query("DROP TABLE IF EXISTS $table_name");

}

// log search terms
function logger_log_query($query){

  if ($query->is_search) {

    global $wpdb;

    $table_name = $wpdb->prefix . "search_query_logs"; 
    $ip_address = $_SERVER["REMOTE_ADDR"] ;
    $search_terms = get_search_query();
    $search_terms = explode( " ", $search_terms );

    foreach ($search_terms as $search_term) {
      $wpdb->insert( 
        $table_name, 
        array( 
          'search_term' => $search_term,
          'time_stamp' => current_time( 'mysql' ), 
          'ip_address' => $ip_address
        ) 
      );
    }

  }

}
