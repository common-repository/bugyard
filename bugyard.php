<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           bugyard
 *
 * @wordpress-plugin
 * Plugin Name:       Bugyard Wordpress Plugin
 * Plugin URI:        http://bitbucket.org
 * Description:       This plugins help you quickly deploy bugyard feedback widget in your wordpress website.
 * Version:           1.0.0
 * Author:            Bugyard
 * Author URI:        https://bugyard.io/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bugyard
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_bugyard() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bugyard-activator.php';
	bugyard_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_bugyard() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bugyard-deactivator.php';
	bugyard_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bugyard' );
register_deactivation_hook( __FILE__, 'deactivate_bugyard' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bugyard.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bugyard() {

	$plugin = new bugyard();
	$plugin->run();

}
run_bugyard();
