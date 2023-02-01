<?php
/**
 * Plugin Name:       PLUGIN_NAME
 * Description:       PLUGIN_DESCRIPTION
 * Requires at least: 6.1
 * Requires PHP:      7.4
 * Version:           0.1.0
 * Author:            PLUGIN_AUTHOR_NAME
 * Author URI:        https://PLUGIN_AUTHOR_URI
 * Plugin URI:        https://PLUGIN_URI/
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       pm2-modern-plugin
 *
 */
use VendorNamespace\PluginNamespace\Settings;
use VendorNamespace\PluginNamespace\Plugin;
use VendorNamespace\PluginNamespace\SettingsPage;

/**
 * Shortcut constant to the path of this file.
 */
define( 'PM2_MODERN_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

/**
 * Version of the plugin.
 */
define( 'PM2_MODERN_VERSION', '1.0.0' );

/**
 * Main file of plugin
 */
define( 'PM2_MODERN_MAIN_FILE', __FILE__ );


 // include autoloader from composer
require_once __DIR__ . '/vendor/autoload.php';


// Register block built in build/block.js
add_action(
	'-init',
	function() {
		register_block_type( __DIR__ . '/build/block' );
	}
);

// Register script built in build/admin.js
add_action(
	'admin_enqueue_scripts',
	function() {
		$dependencies = [];
		$version      = PM2_MODERN_VERSION;

		// Use asset file if it exists
		if ( file_exists( __DIR__ . '/build/settings.asset.php' ) ) {
			$asset_file   = include __DIR__ . '/build/settings.asset.php';
			$dependencies = $asset_file['dependencies'];
			$version      = $asset_file['version'];

		}
		wp_register_script(
			SettingsPage::SCREEN,
			plugins_url( 'build/settings.js', __FILE__ ),
			$dependencies,
			$version,
		);
	}
);

//Register block built in build/block.js
add_action( 'init', function(){
	register_block_type( __DIR__ . '/build/block' );
} );


//Setup plugin
add_action(
	'ACTION_PREFIX',
	function ( Plugin $plugin ) {
		$plugin->init();
	}
);
/**
 * Start Plugin
 *
 * @since 1.0.0
 * @param Plugin $plugin
 */
do_action(
	'ACTION_PREFIX',
	new Plugin(
		new Settings(),
	)
);
