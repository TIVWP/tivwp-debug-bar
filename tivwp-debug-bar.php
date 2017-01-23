<?php
/**
 * Plugin Name: TIVWP Debug Bar
 * Plugin URI: https://github.com/TIVWP/tivwp-debug-bar
 * Description: A WordPress `Debug Bar` plugin extension used by the TIVWP projects.
 * Text Domain: tivwp-debug-bar
 * Domain Path: /languages/
 * Version: 0.0.2
 * Author: tivnet
 * Author URI: http://www.tiv.net/
 * License: GPL-3.0
 * License URI: http://www.gnu.org/licenses/gpl.txt
 */

if ( defined( 'WP_DEBUG' ) && WP_DEBUG && ! defined( 'DOING_AJAX' ) ) {
	define( 'TIVWP_DEBUG_BAR_VERSION', '0.0.2' );
	require_once __DIR__ . '/includes/class-tivwp-debug-bar.php';
	TIVWP_Debug_Bar::construct();
}
