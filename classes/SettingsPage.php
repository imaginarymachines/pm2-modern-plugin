<?php
namespace VendorNamespace\PluginNamespace;

class SettingsPage {

        const SCREEN = 'pm2-modern-plugin-settings';


        /**
         * Main plugin class
         *
         * @since 0.0.1
         *
         * @var Plugin
         *
         */
        protected $plugin;

        public function __construct(Plugin $plugin)
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
                __( 'PLUGIN_NAME', 'pm2-modern-plugin' ),
                __( 'PLUGIN_NAME', 'pm2-modern-plugin' ),
                'manage_options',
                self::SCREEN,
                [
                    $this,
                    'renderPage',
                ]
            );

            // This adds a link in the plugins list table
            add_action(
                'plugin_action_links_' . plugin_basename( PM2_MODERN_MAIN_FILE ),
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
                esc_html__( 'Settings', 'pm2-modern-plugin' )
            );
            array_unshift( $links, $settings_link );


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
                'ACTION_PREFIX',
                [
                    'apiUrl'   => rest_url( 'pm2-modern-plugin/v1' ),
                    'settings' => $settings,

                ]
            );
            ?>
                <div class="pm2-modern-plugin-wrap">
                    <h1>
                        <?php esc_html_e( 'PLUGIN_NAME', 'pm2-modern-plugin' ); ?>
                    </h1>
                    <div id="<?php echo esc_attr(self::SCREEN); ?>"></div>
                </div>
            <?php
        }

    }

}
