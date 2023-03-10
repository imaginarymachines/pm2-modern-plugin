<?php
namespace VendorNamespace\PluginNamespace\Tests;

use VendorNamespace\PluginNamespace\Plugin;
use VendorNamespace\PluginNamespace\Settings;

abstract class TestCase extends \WP_UnitTestCase {

	/**
	 * Delete the settings after each test.
	 */
	protected function tearDown():void {
		delete_option('pm2-modern-plugin-settings');
		parent::tearDown();
	}

	/**
	 * Make a plugin instance.
	 * @param Settings $settings Optional settings to use.
	 * @return Plugin
	 */
	protected function makePlugin(Settings $settings = null){
		if( ! $settings ){
			$settings = new Settings();
		}
		return new Plugin($settings);
	}
}
