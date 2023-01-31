<?php
namespace VendorNamespace\PluginNamespace\Rest;

use VendorNamespace\PluginNamespace\Plugin;

/**
 * Register all routes for REST API
 */
class Api {

    /**
     * API namespace
     *
     * @since 1.0.0
     *
     * @var string
     */
    protected $namespace  = 'pm2-modern-plugin/v1';

    /**
     * Plugin class
     *
     * @since 1.0.0
     *
     * @var Plugin
     */
    protected $plugin;


    /**
     * Constructor
     *
     * @since 1.0.0
     *
     * @param Plugin $plugin
     */
    public function __construct( Plugin $plugin ) {
        $this->plugin = $plugin;
    }

    /**
     * Register all routes
     *
     * @since 1.0.0
     *
     * @uses "rest_api_init" action
     * @see https://developer.wordpress.org/rest-api/extending-the-rest-api/adding-custom-endpoints/
     * @return void
     */
    public function registerRoutes() {
        // Register the routes here
    }

}
