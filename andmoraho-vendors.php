<?php
/*
Plugin Name: Vendors
Description: Vendors.
Version: 1.0.0
Author: Andres Morales (andmoraho)
Author URI: https://github.com/andmoraho/
Text Domain: vendors
*/

// don't load directly
if (! defined('ABSPATH')) {
    die('Invalid request.');
}

/**
 * Currently plugin version.
 */
define('ANDMORAHO_VENDORS_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-andmoraho-vendors-activator.php
 */
function activate_andmoraho_vendors()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-andmoraho-vendors-activator.php';
    Andmoraho_Vendors_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-andmoraho-vendors-deactivator.php
 */
function deactivate_andmoraho_vendors()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-andmoraho-vendors-deactivator.php';
    Andmoraho_Vendors_Deactivator::deactivate();
}
 
register_activation_hook(__FILE__, 'activate_andmoraho_vendors');
register_deactivation_hook(__FILE__, 'deactivate_andmoraho_vendors');


/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-andmoraho-vendors.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_andmoraho_vendors()
{
    $andmoraho_vendors = new Andmoraho_Vendors();
    $andmoraho_vendors->run();
}
run_andmoraho_vendors();
