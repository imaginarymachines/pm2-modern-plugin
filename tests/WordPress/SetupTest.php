<?php
namespace VendorNamespace\PluginNamespace\Tests;

use VendorNamespace\PluginNamespace\Plugin;

/**
 * Tests that cover the plugin's setup
 *
 * Hooks, constants, etc.
 */
class SetupTest extends TestCase {

	/**
	 * Check that the constants are defined.
	 *
	 * @group setup
	 */
	public function test_constant_defined() {

		$this->assertTrue( defined( 'PM2_MODERN_PLUGIN_DIR' ) );
		$this->assertTrue( defined( 'PM2_MODERN_VERSION' ) );
		$this->assertTrue( defined( 'PM2_MODERN_MAIN_FILE' ) );
	}

	/**
	 * Classes loaded?
	 * 	- autoloader works
	 *  - files exist
	 *
	 * @group setup
	 */
	public function test_classes_exist() {

		$this->assertTrue( class_exists( Plugin::class ) );
	}

	/**
	 * Test adding hooks.
	 *
	 * @group setup
	 * @group hooks
	 */
	public function test_add_hooks() {
		$plugin = $this->makePlugin();
		$plugin->init();
		$this->assertGreaterThan(
			0,
			has_action(
				'plugins_loaded',
				[$plugin,'pluginLoaded']
			)
		);

		$this->assertGreaterThan(
			0,
			has_action(
				'rest_api_init',
				[$plugin->getRestApi(),'registerRoutes']
			)
		);

	}
}
