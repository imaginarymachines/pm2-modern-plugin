<?php

namespace VendorNamespace\PluginNamespace;

use VendorNamespace\PluginNamespace\Register;
use VendorNamespace\PluginNamespace\Rest\Api;

class Hooks {

	/**
	 * @var Plugin
	 */
	protected $plugin;

	/**
	 * @
	 * @var SettingsPage
	 */
	protected $settingsPage;

	public function __construct( Plugin $plugin ) {
		$this->plugin = $plugin;
		$this->settingsPage = new SettingsPage($plugin);
	}

	/**
	 * Register all hooks
	 */
	public function addHooks() {
		add_action( 'plugins_loaded', [$this->plugin, 'load_textdomain']);
		add_action( 'admin_menu', [$this->settingsPage, 'addPage' ]);
		add_action('rest_api_init', [$this->plugin, 'registerRoutes']);

	}

	/**
	 * Remove Hooks
	 */
	public function removeHooks() {
		remove_action( 'plugins_loaded', [$this->plugin, 'load_textdomain']);
		remove_action( 'admin_menu', [$this->settingsPage, 'addPage' ]);
		remove_action('rest_api_init', [$this->plugin, 'registerRoutes']);

	}

}
