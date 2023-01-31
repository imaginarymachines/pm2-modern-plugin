<?php
namespace VendorNamespace\PluginNamespace\Rest\Controllers;

use VendorNamespace\PluginNamespace\Plugin;

/**
 * Base class for REST API endpoints
 */
abstract class Controller {



	/**
	 * Plugin instance
	 *
	 * @var Plugin
	 */
	protected $plugin;

	/**
	 * Constructor
	 *
	 * @param Plugin $plugin
     * @param string $namespace
	 */
	public function __construct( Plugin $plugin ) {
		$this->plugin = $plugin;
	}

	/**
	 * Default permission_callback
	 *
	 * @param \WP_REST_Request $request
	 * @return bool
	 */
	public function authorize( $request ) {
		$capability = is_multisite() ? 'delete_sites' : 'manage_options';
		/**
		 * Filter the capability required to access the endpoint.
		 *
		 * @param string $capability
		 * @param Controller $this
		 * @param \WP_REST_Request $request
		 */
		$capability = apply_filters( 'ACTION_PREFIX_rest_authorize_capability', $capability, $this, $request );
		return current_user_can( $capability );
	}

}
