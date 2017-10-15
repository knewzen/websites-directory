<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://digital-manager.io
 * @since             1.0.0
 * @package           Web_Directory
 *
 * @wordpress-plugin
 * Plugin Name:       Websites directory
 * Plugin URI:        https://digital-manager.io
 * Description:       List websites
 * Version:           1.0.0
 * Author:            david fieffe
 * Author URI:        https://digital-manager.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       web-directory
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-web-directory-activator.php
 */
function activate_web_directory() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-web-directory-activator.php';
	Web_Directory_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-web-directory-deactivator.php
 */
function deactivate_web_directory() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-web-directory-deactivator.php';
	Web_Directory_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_web_directory' );
register_deactivation_hook( __FILE__, 'deactivate_web_directory' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-web-directory.php';


function get_meta_to_response( $object, $field_name, $request ) {
	return get_post_meta( $object[ 'id' ], $field_name, true );
}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_web_directory() {

	$plugin = new Web_Directory();
	$plugin->run();

}
run_web_directory();
