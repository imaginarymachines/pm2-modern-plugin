<?php
namespace ImaginaryMachines\UfoAi\Tests;

use ImaginaryMachines\UfoAi\Settings;
class SettingsTest extends TestCase {
	//Test get and save a setting that is allowed
	/**
	 * @group now
	 */
	public function test_get_save_allowed_setting() {
		$setting = Settings::KEY;
		$value = 'value';
		$settings = new Settings();
		$settings->set($setting, $value);
		$this->assertEquals(
			$value,
			$settings->get($setting),
		);
	}

	//Test throws for invalid key
	public function test_throws_for_get_invalid_key() {
		$this->expectException(\Exception::class);
		$settings = new Settings();
		$settings->get('invalid_key');
	}

	//Test get all settings
	public function test_get_all_settings() {
		$settings = new Settings();
		$settings->deleteAll();
		$current = $settings->getAll();
		$this->assertEquals(
			$settings->getDefaults(),
			$current,
		);
	}
}
