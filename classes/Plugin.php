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
    public function __construct( Settings $settings, Api $api ) {
        $this->settings = $settings;
        $this->api = $api;
    }

    public function init(){
        $this->hooks = new Hooks( $this );
        $this->hooks->addHooks();
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

    public function getRestApi() {
        return $this->api;
    }
}
