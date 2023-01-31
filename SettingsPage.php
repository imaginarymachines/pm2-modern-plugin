<?php
namespace ImaginaryMachines\UfoAi;

class SettingsPage {

	const SCREEN = 'ufo-ai-settings';


	/**
	 * @var UfoAi
	 *
	 */
	protected $plugin;

	public function __construct(UfoAi $plugin)
	{
		$this->plugin = $plugin;
	}
	/**
	 * Adds the settings page to the Settings menu.
	 *
	 * @since 0.0.1
	 *
	 * @return string
	 */
	public function addPage() {

		// Add the page
		$suffix = add_options_page(
			__( 'Upcycled Found Objects', 'ufo-ai-wp' ),
			__( 'Upcycled Found Objects', 'ufo-ai-wp' ),
			'manage_options',
			self::SCREEN,
			[
				$this,
				'renderPage',
			]
		);

		// This adds a link in the plugins list table
		add_action(
			'plugin_action_links_' . plugin_basename( UFO_AI_WPMAIN_FILE ),
			[
				$this,
				'addLinks',
			]
		);

		return $suffix;
	}

	/**
	 * Adds a link to the setting page to the plugin's entry in the plugins list table.
	 *
	 * @since 1.0.0
	 *
	 * @param array $links List of plugin action links HTML.
	 * @return array Modified list of plugin action links HTML.
	 */
	public function addLinks( $links ) {
		// Add link as the first plugin action link.
		$settings_link = sprintf(
			'<a href="%s">%s</a>',
			esc_url( add_query_arg( 'page', self::SCREEN, admin_url( 'options-general.php' ) ) ),
			esc_html__( 'Settings', 'ufo-ai-wp' )
		);
		array_unshift( $links, $settings_link );
		$appLinks = array(
			'https://upcycledfoundobjects.com/login'    => __( 'Login', 'ufo-ai-wp' ),
			'https://upcycledfoundobjects.com/register' => __( 'Register', 'ufo-ai-wp' ),

		);
		foreach ( $appLinks as $url => $label ) {
			$links[] = sprintf(
				'<a href="%s" target="_blank">%s</a>',
				esc_url(
					add_query_arg(
						array(
							'utm_source'   => 'wordpress',
							'utm_medium'   => 'plugin-screen',
							'utm_campaign' => 'ufo-ai-wp',
						),
						$url
					)
				),
				esc_html( $label )
			);
		}

		return $links;
	}

	/**
	 * Renders the settings page.
	 *
	 * @since 0.0.1
	 */
	public  function renderPage() {
		wp_enqueue_script( self::SCREEN );
		$settings = $this
			->plugin
			->getSettings()
			->getAll();
		wp_localize_script(
			self::SCREEN,
			'CONTENT_MACHINE',
			[
				'apiUrl'   => rest_url( 'ufo-ai/v1/settings' ),
				'settings' => $settings,

			]
		);
		?>
			<div class="ufo-ai-wp-wrap">
				<h1>
					<?php esc_html_e( 'Upcycled Found Objects', 'ufo-ai-wp' ); ?>
				</h1>
				<div id="ufo-ai-settings"></div>
			</div>
		<?php
	}

}
