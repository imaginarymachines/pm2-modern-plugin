<?php
namespace ImaginaryMachines\UfoAi\Tests;
use ImaginaryMachines\UfoAi\Settings;
use ImaginaryMachines\UfoAi\UfoAi;

abstract class TestCase extends \WP_UnitTestCase {

	/**
	 * Make a plugin instance.
	 * @param string $apiKey
	 * @return UfoAi
	 */
	protected function makePlugin(string $apiKey = 'test'){
		$settings = new Settings();
		$settings->set(Settings::KEY, $apiKey);
		return new UfoAi($settings);
	}
}
