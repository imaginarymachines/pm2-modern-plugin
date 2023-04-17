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
		$this->settingsPage = new SettingsPage(
			$plugin, 'pm2-modern-plugin-settings', 'Plugin Settings','settings'
		);
	}

	/**
	 * Register all hooks
	 */
	public function addHooks() {
		add_action( 'plugins_loaded', [$this->plugin, 'pluginLoaded']);
		add_action( 'admin_menu', [$this->settingsPage, 'addPage' ]);
		add_action( 'rest_api_init', [$this->plugin->getRestApi(), 'registerRoutes']);
		add_action( 'admin_enqueue_scripts', [$this->settingsPage, 'registerAssets']);
	}

	/**
	 * Remove Hooks
	 */
	public function removeHooks() {
		remove_action( 'plugins_loaded', [$this->plugin, 'pluginLoaded']);
		remove_action( 'admin_menu', [$this->settingsPage, 'addPage' ]);
		remove_action( 'rest_api_init', [$this->plugin->getRestApi(), 'registerRoutes']);
		remove_action( 'admin_enqueue_scripts', [$this->settingsPage, 'registerAssets']	);
	}

}
