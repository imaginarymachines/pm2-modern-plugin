<?php
namespace VendorNamespace\PluginNamespace;
use VendorNamespace\PluginNamespace\Rest\Api;

class Plugin {

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
     * Constructor
     *
     * @since 0.0.1
     * @param Settings $settings
     */
    public function __construct( Settings $settings ) {
        $this->settings = $settings;
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
    public function init(){
        if( ! isset($this->api) ){
            $this->api = new Api( $this );
        }
        $this->hooks = new Hooks( $this );
        $this->hooks->addHooks();
    }


	/**
	 * When the plugin is loaded:
     *  - Load the plugin's text domain.
	 *
	 * @uses "plugins_loaded" action
	 *
	 */
    public function pluginLoaded(){
		load_plugin_textdomain( 'pm2-modern-plugin' );
    }

    /**
     * Get Settings
     *
     * @since 0.0.1
     *
     * @return Settings
     */
    public function getSettings() {
        return $this->settings;
    }

    /**
     * Get API
     *
     * @since 0.0.1
     *
     * @return Api
     */
    public function getRestApi() {
        return $this->api;
    }
}
