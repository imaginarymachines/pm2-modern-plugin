<?php
namespace ImaginaryMachines\UfoAi\Tests;

/**
 * Tests that cover the plugin's setup
 *
 * Hooks, constants, etc.
 */
class SetupTest extends TestCase {

	/**
	 * Check that the constants are defined.
	 */
	public function test_constant_defined() {

		$this->assertTrue( defined( 'UFO_AI_WPPLUGIN_DIR' ) );
		$this->assertTrue( defined( 'UFO_AI_WPMAIN_FILE' ) );
		$this->assertTrue( defined( 'UFO_AI_WPVERSION' ) );
	}

	/**
	 * Check that the files were included.
	 */
	public function test_classes_exist() {

		$this->assertTrue( class_exists( \ImaginaryMachines\UfoAi\UfoAi::class ) );
	}

	/**
	 * Test adding hooks.
	 */
	public function test_add_hooks() {
		$plugin = $this->makePlugin();
		$plugin->init();
		$this->assertGreaterThan(
			0,
			has_action(
				'plugins_loaded',
				[$plugin,'load_textdomain']
			)
		);

		$this->assertGreaterThan(
			0,
			has_action(
				'rest_api_init',
				[$plugin,'rest_api_init']
			)
		);

	}

	/**
	 * Test adding admin hooks.
	 */
	public function test_add_admin_hooks() {
		$plugin = $this->makePlugin();
		$plugin->init();

		$this->assertGreaterThan(
			0,
			has_action(
				'admin_init',
				[$plugin->getSettings(),'registerSettings']
			)
		);

	}

}
