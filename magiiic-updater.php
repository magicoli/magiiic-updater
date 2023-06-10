<?php
/**
 * Plugin Name:     Magiiic Updater
 * Plugin URI:      https://magiiic.com
 * Description:     Deliver updates for plugins provided by https://magiiic.com
 * Author:          Magiiic
 * Author URI:      https://magiiic.com
 * Text Domain:     magiiic-updater
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Magiiic_Updater
 */

// Your code starts here.
require plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

if ( file_exists( __DIR__ . '/lib/package-updater.php' ) ) {
	$wppul_server = 'https://magiiic.com';
	include_once __DIR__ . '/lib/package-updater.php';
}
