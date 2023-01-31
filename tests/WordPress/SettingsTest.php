<?php
namespace ImaginaryMachines\UfoAi\Tests;

use VendorNamespace\PluginNamespace\Settings;

class SettingsTest extends TestCase {
	//Test get and save a setting that is allowed

	protected function tearDown() {
		delete_option(Settings::OPTION_NAME);
		parent::tearDown();
	}
	/**
	 * @group now
	 */
	public function test_get_save_allowed_setting() {
		$value = 'value';
		$settings = new Settings();
		$settings->save(
			['apiKey' => $value]
		);
		$this->assertEquals(
			$value,
			$settings->getAll()['apiKey'],
		);
	}



	//Test get all settings
	public function test_get_all_settings() {
		$settings = new Settings();

		$current = $settings->getAll();
		$this->assertEquals(
			$settings->getDefaults(),
			$current,
		);
	}
}
