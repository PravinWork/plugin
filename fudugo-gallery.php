<?php defined( 'ABSPATH' ) or die( 'Direct Access is not allowed !' );
/*
Plugin Name: Fudugo Gallery 
Plugin URI:  https://developer.wordpress.org/plugins/fudugo-gallery/
Description: A gallery plugin from Fudugo Solutions.
Version:     1.0.1
Author:      fudugo.com
Author URI:  http://www.fudugo.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wporg
Domain Path: /languages

Fudugo Gallery is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Fudugo Gallery is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Fudugo Gallery. If not, see {License URI}.
*/

define('FUDUGO_PLUGIN_VERSION', '1.0.1');
define('FUDUGO_MINIMUM_WP_VERSION', '3.7');
define('FUDUGO_PLUGIN_DIR', plugin_dir_path( __FILE__ ));
define('FUDUGO_PLUGIN_URL', plugin_dir_url( __FILE__ ));

//plugin manager
//for Installation of the plugin over riding from installation LifeCycle .
register_activation_hook( __FILE__, 'installDatabaseTables' );
register_uninstall_hook(__FILE__, 'unInstallDatabaseTables');
require_once 'includes/plugin_manager.php';

add_action( 'wp_enqueue_scripts', 'fudugo_enqueued_assets' );

function fudugo_enqueued_assets() { 
	//Register Css
	wp_register_style('fudugo-css', FUDUGO_PLUGIN_URL.'css/fudugo_styles.css'); 
	wp_register_style('fudugo-admin-css', FUDUGO_PLUGIN_URL.'css/fudugo_admin_styles.css'); 
	//Register JS 
	wp_register_script('fudugo-jquery-min', FUDUGO_PLUGIN_URL.'js/jquery-3.2.1.min.js');
	wp_register_script('fudugo-script-min', FUDUGO_PLUGIN_URL.'js/fudugo_isotope.min.js');
	wp_register_script('fudugo-script', FUDUGO_PLUGIN_URL.'js/fudugo_isotope.js', array('jquery'), FUDUGO_PLUGIN_VERSION, true );
	wp_register_script('fudugo-prefix-script',FUDUGO_PLUGIN_URL.'/js/myscript.js', array('jquery'), '0.1',true );
}

require_once(FUDUGO_PLUGIN_DIR.'includes/shortcode.php');

// Adding plugin's admin actions
require_once "includes/actions.php";


