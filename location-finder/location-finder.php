<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.ibsofts.com/
 * @since             1.0.0
 * @package           Location_Finder
 *
 * @wordpress-plugin
 * Plugin Name:       Location Finder
 * Plugin URI:        https://www.ibsofts.com/plugins/location-finder
 * Description:       Just a location finder plugin used for locate the stores.
 * Version:           1.0.0
 * Author:            iB Softs
 * Author URI:        https://www.ibsofts.com//
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       location-finder
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'LOCATION_FINDER_VERSION', '1.0.0' );

function enqueue_datatables_assets() {
    wp_enqueue_script('jquery');
    
    // Enqueue DataTables CSS and JS
    wp_enqueue_style('datatables-css', 'https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css');
    wp_enqueue_script('datatables-js', 'https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js', array('jquery'), null, true);
       // Enqueue custom script to initialize DataTables and handle deletion
       wp_enqueue_script('custom-datatables-js', get_template_directory_uri() . '/js/location-finder-admin.js', array('datatables-js'), null, true);
       // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), '4.3.1');

    // Enqueue Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery'), '4.3.1', true);
    // Localize script to pass ajax URL and nonce
    wp_localize_script('custom-datatables-js', 'datatableParams', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('delete_category_nonce')
    ));
}
add_action('admin_enqueue_scripts', 'enqueue_datatables_assets');

add_action('admin_menu', 'location_finder');

// Function to add an admin menu item
function location_finder() {
    add_menu_page(
        'Location Finder',    // Page title
        'Location Finder',          // Menu title
        'manage_options',   // Capability
        'location-finder',    // Menu slug
        'location_finder_call', // Function to display the page content
        'dashicons-location-alt', // Icon URL or dashicons class
        
    );
    add_submenu_page(
        'location-finder',    // Parent slug
        'New Store',  // Page title
        'New Store',       // Submenu title
        'manage_options',   // Capability
        'new-store',       // Menu slug
        'new_store_call'   // Function to display the submenu page content
    );
    add_submenu_page(
        'location-finder',    // Parent slug
        'Store Categories',  // Page title
        'Store Categories',       // Submenu title
        'manage_options',   // Capability
        'store-categories',       // Menu slug
        'store_categories_call'   // Function to display the submenu page content
    );
    add_submenu_page(
        'location-finder',    // Parent slug
        'Settings',  // Page title
        'Settings',       // Submenu title
        'manage_options',   // Capability
        'settings',       // Menu slug
        'settings_call'   // Function to display the submenu page content
    );
}
function location_finder_call(){
	?>
	 <div class="wrap">
        <h1><?php esc_html_e('Location Finder'); ?></h1>
        <a href="#" class="button button-primary"><?php esc_html_e('New Store', 'location-finder'); ?></a>

       
    </div>
	<?php
}
function new_store_call(){
    //echo("New Store");
    require_once 'new-store.php';
}
function store_categories_call(){
    //echo("Store Categories");
    require_once 'store-category.php';
}
function settings_call(){
    echo("Settings");
}
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-location-finder-activator.php
 */
function activate_location_finder() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-location-finder-activator.php';
	Location_Finder_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-location-finder-deactivator.php
 */
function deactivate_location_finder() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-location-finder-deactivator.php';
	Location_Finder_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_location_finder' );
register_deactivation_hook( __FILE__, 'deactivate_location_finder' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-location-finder.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_location_finder() {

	$plugin = new Location_Finder();
	$plugin->run();

}
run_location_finder();
