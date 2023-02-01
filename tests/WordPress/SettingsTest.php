<?php
namespace VendorNamespace\PluginNamespace\Tests;

use VendorNamespace\PluginNamespace\Settings;

class SettingsTest extends TestCase {


	/**
	 * Ensure can get settings
	 *
	 * @group settings
	 */
	public function test_get_saved_settings() {
		$settings = new Settings();

		$value = 'value';
		$settings->save(
			['apiKey' => $value]
		);
		$this->assertEquals(
			['apiKey' => $value],
			get_option('pm2-modern-plugin-settings')
		);
	}


	/**
	 * Can we get the default settings?
	 *  @group settings
	 */
	public function test_get_all_settings() {
		$settings = new Settings();

		$current = $settings->getAll();
		$this->assertEquals(
			$settings->getDefaults(),
			$current,
		);
		$value = 'changed';
		$settings->save(
			['apiKey' => $value]
		);
		$this->assertEquals(
			['apiKey' => $value],
			$settings->getAll()
		);
	}
}
