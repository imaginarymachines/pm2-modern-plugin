<?php

namespace VendorNamespace\PluginNamespace;

use VendorNamespace\PluginNamespace\Rest\Api;

class Plugin
{

    /**
     * Settings instance
     *
     * @since 0.0.1
     *
     * @var Settings
     */
    protected $settings;

    /**
     * API instance
     *
     * @since 0.0.1
     *
     * @var Api
     */
    protected $api;

    /**
     * Hooks
     *
     * @since 0.0.1
     *
     * @var Hooks
     *
     */
    protected $hooks;

    /**
     * Plugin version
     *
     * @since 0.0.1
     *
     * @var string
     */
    protected $version;

    /**
     * Plugin main file path
     *
     * @since 0.0.1
     *
     * @var string
     */
    protected $mainFile;

    /**
     * Plugin directory path
     *
     * @since 0.0.1
     *
     * @var string
     */
    protected $pluginDir;

    /**
     * Constructor
     *
     * @since 0.0.1
     * @param Settings $settings
     * @param string $version Plugin version.
     * @param string $mainFile Plugin main file path
     * @param string $pluginDir Plugin directory path
     */
    public function __construct(Settings $settings,string $version, string $mainFile, string $pluginDir)
    {
        $this->settings = $settings;
        $this->version = $version;
        $this->mainFile = $mainFile;
        $this->pluginDir = $pluginDir;
    }

    /**
     * Initialize the plugin
     *
     * @since 0.0.1
     *
     * @uses "ACTION_PREFIX_init" action
     *
     * @return void
     */
    public function init()
    {
        if (!isset($this->api)) {
            $this->api = new Api($this);
        }
        $this->hooks = new Hooks($this);
        $this->hooks->addHooks();
    }


    /**
     * When the plugin is loaded:
     *  - Load the plugin's text domain.
     *
     * @uses "plugins_loaded" action
     *
     */
    public function pluginLoaded()
    {
        load_plugin_textdomain('pm2-modern-plugin');
    }

    /**
     * Get Settings
     *
     * @since 0.0.1
     *
     * @return Settings
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * Get API
     *
     * @since 0.0.1
     *
     * @return Api
     */
    public function getRestApi()
    {
        return $this->api;
    }
    /**
     * Get plugin version
     *
     * @since 0.0.1
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Get plugin main file path
     *
     * @since 0.0.1
     *
     * @return string
     */
    public function getMainFile()
    {
        return $this->mainFile;
    }

    /**
     * Get plugin directory path
     *
     * @since 0.0.1
     *
     * @return string
     */
    public function getPluginDir()
    {
        return $this->pluginDir;
    }
}
