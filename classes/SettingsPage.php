<?php

namespace VendorNamespace\PluginNamespace;

class SettingsPage
{

    /**
     * Main plugin class
     *
     * @since 0.0.1
     *
     * @var Plugin
     *
     */
    protected $plugin;

    /**
     * Screen ID
     *
     * @var string
     *
     * @since 0.0.1
     */
    protected $screen;

    /**
     * Screen title
     *
     * @var string
     *
     * @since 0.0.1
     */
    protected $title;

    /**
     * Script handle
     *
     * @var string
     *
     * @since 0.0.1
     */
    protected $scriptHandle;

    /**
     * Capability to access the page
     *
     * @var string
     *
     * @since 0.0.1
     */
    protected $capability;

    /**
     * SettingsPage constructor.
     *
     * @since 0.0.1
     *
     * @param Plugin $plugin
     * @param string $screen
     * @param string $title
     * @param string $scriptHandle
     * @param string $capability
     */
    public function __construct(Plugin $plugin, string $screen, string $title, string $scriptHandle = 'settings', string $capability = 'manage_options')
    {
        $this->plugin = $plugin;
        $this->screen = $screen;
        $this->title = $title;
        $this->scriptHandle = $scriptHandle;
        $this->capability = $capability;
    }

    /**
     * Register assets
     *
     * @since 0.0.1
     *
     * @uses "admin_enqueue_scripts" action
     */
    public function registerAssets()
    {
        $dependencies = [];
        $version      = $this->plugin->getVersion();
        $handle = $this->scriptHandle;

        // Use asset file if it exists
        if (file_exists($this->plugin->getPluginDir() . "build/{$handle}.asset.php")) {
            $asset_file   = include $this->plugin->getPluginDir() . "build/{$handle}.asset.php";
            $dependencies = $asset_file['dependencies'];
            $version      = $asset_file['version'];
        }

        wp_register_script(
            $this->screen,
            plugins_url("build/{$handle}.js", $this->plugin->getMainFile()),
            $dependencies,
            $version,
        );
    }
    /**
     * Adds the settings page to the Settings menu.
     *
     * @since 0.0.1
     *
     * @return string
     */
    public function addPage()
    {

        // Add the page
        $suffix = add_options_page(
            __($this->title, 'pm2-modern-plugin'),
            __($this->title, 'pm2-modern-plugin'),
            $this->capability,
            $this->screen,
            [
                $this,
                'renderPage',
            ]
        );

        // This adds a link in the plugins list table
        add_action(
            'plugin_action_links_' . plugin_basename($this->plugin->getMainFile()),
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
    public function addLinks($links)
    {
        // Add link as the first plugin action link.
        $settings_link = sprintf(
            '<a href="%s">%s</a>',
            esc_url(add_query_arg('page', $this->screen, admin_url('options-general.php'))),
            esc_html__('Settings', 'pm2-modern-plugin')
        );
        array_unshift($links, $settings_link);


        return $links;
    }

    /**
     * Returns the data passed to the settings page.
     *
     * @since 0.0.1
     *
     * @return array
     */
    public function data()
    {
        $settings = $this
            ->plugin
            ->getSettings()
            ->getAll();
        $data = [
            'apiUrl'   => rest_url('pm2-modern-plugin/v1'),
            'settings' => $settings,
        ];
        /**
         * Filters the data passed to the settings page.
         *
         * @since 0.0.1
         *
         * @param array $data
         */
        return apply_filters('ACTION_PREFIX_settings_page_data', $data, $this->plugin);
    }

    /**
     * The name of the data object passed to the settings page.
     *
     * @since 0.0.1
     *
     * @return string
     */
    public function dataName()
    {
        return apply_filters('ACTION_PREFIX_settings_page_data_name', 'ACTION_PREFIX', $this->plugin);
    }

    /**
     * Renders the settings page.
     *
     * @since 0.0.1
     */
    public  function renderPage()
    {
        wp_enqueue_script($this->screen);
        $data = $this->data();
        if (!empty($data)) {
            wp_localize_script(
                $this->screen,
                $this->dataName() ? $this->dataName() : 'ACTION_PREFIX',
                $data
            );
        }

?>
        <div class="pm2-modern-plugin-wrap">
            <h1>
                <?php esc_html_e($this->title, 'pm2-modern-plugin'); ?>
            </h1>
            <div id="<?php echo esc_attr($this->screen); ?>"></div>
        </div>
<?php
    }
}
