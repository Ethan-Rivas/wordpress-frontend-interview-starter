<?php
/*
Plugin Name: Newsletter - PR Underground
Plugin URI: https://github.com/Ethan-Rivas/wordpress-frontend-interview-starter
Description: Assessment plugin for PR Undeground Newsletter
Version: 1.0
Author: Ethan Rivas
Text Domain: prunderground.com
*/

define( 'NEWSLETTER_VERSION', '1.0' );
define( 'NEWSLETTER_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( NEWSLETTER_PLUGIN_DIR . 'modal.php' );

// Create the newsletter table
function create_newsletter_table(){
    global $wpdb;

    $newsletter_version = 1;

    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'newsletter';

    $sql = "CREATE TABLE $table_name (
		id int NOT NULL AUTO_INCREMENT,
		name text NOT NULL,
		email text NOT NULL UNIQUE,
        created_at datetime DEFAULT NOW() NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
    add_option( 'newsletter_db_version', $newsletter_version );
}
register_activation_hook( __FILE__, 'create_newsletter_table' );

// Delete the newsletter table on plugin uninstall
function delete_newsletter_table() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'newsletter';
    $sql = "DROP TABLE IF EXISTS $table_name";

    $wpdb->query($sql);
    delete_option( 'newsletter_db_version' );
}
register_uninstall_hook( __FILE__, 'delete_newsletter_table' );
