<?php
/**
 * Plugin Name:     Magiiic Updater
 * Plugin URI:      https://magiiic.com
 * Description:     Deliver updates for plugins provided by https://magiiic.com
 * Author:          Magiiic
 * Author URI:      https://magiiic.com
 * Text Domain:     magiiic-updater
 * Domain Path:     /languages
 * Version:         0.1.1
 *
 * @package         Magiiic_Updater
 */

// Your code starts here.
require plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

if ( file_exists( __DIR__ . '/lib/package-updater.php' ) ) {
	$wppul_server = 'https://magiiic.com';
	include_once __DIR__ . '/lib/package-updater.php';
}

$wppul_server = 'https://magiiic.com';

$managed_plugins = array(
	'advanced-ads-pro/advanced-ads-pro.php',
	'band-tools/band-tools.php',
	'boeuf/boeuf.php',
	'casting-director-tools/casting-director-tools.php',
	'dummy-plugin/dummy-plugin.php',
	'lodgify-link/lodgify-link.php',
	'magiiic-addictions/magiiic-addictions.php',
	'multipass/multipass.php',
	'no-no-title/no-no-title.php',
	'project-donations-wc/project-donations-wc.php',
	'publishpress-pro/publishpress-pro.php',
	'social-warfare-pro/social-warfare-pro.php',
	'talents/talents.php',
	'w4os/w4os.php',
	'woocommerce-bookings/woocommerce-bookings.php',
	'woocommerce-brands/woocommerce-brands.php',
	'woocommerce-domain-names/woocommerce-domain-names.php',
	'woocommerce-memberships-mailchimp/woocommerce-memberships-mailchimp.php',
	'woocommerce-memberships/woocommerce-memberships.php',
	'woocommerce-name-your-price/woocommerce-name-your-price.php',
	'woocommerce-product-addons/woocommerce-product-addons.php',
	'woocommerce-product-table/woocommerce-product-table.php',
	'woocommerce-request-a-quote/class-addify-request-for-quote.php',
	'woocommerce-social-login/woocommerce-social-login.php',
	'woocommerce-subscriptions/woocommerce-subscriptions.php',
	'woocommerce-virtual-lessfields/woocommerce-virtual-lessfields.php',
	'woopus/woopus.php',
);

$installed_plugins = get_plugins();
$installed_files   = array_keys( $installed_plugins );

$managed_installed = array_intersect( $managed_plugins, $installed_files );
error_log( print_r( $managed_installed, true ) );

foreach ( $managed_plugins as $plugin ) {
	$plugin_path = WP_PLUGIN_DIR . '/' . $plugin;
	if ( file_exists( $plugin_path ) ) {
		new WP_Package_Updater(
			$wppul_server,
			wp_normalize_path( WP_PLUGIN_DIR . '/' . $plugin ),
			wp_normalize_path( WP_PLUGIN_DIR . '/' . plugin_dir_path( $plugin ) ),
			// isset( $wppul_licence_required ) ? $wppul_licence_required : false
		);
	}
}
